<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query search jika ada
        $query = Book::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('pengarang', 'like', "%{$search}%");
        }

        // Gunakan paginate agar bisa pakai appends
        $bukus = $query->paginate(10)->appends($request->all());

        $categories = Category::all();

        return view('admin.buku.index', compact('categories', 'bukus'));
    }


    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'kode_buku'    => 'required|string|max:50|unique:books,kode_buku',
            'category'     => 'nullable|string|max:255', // sesuai model
            'judul'        => 'required|string|max:255',
            'status'       => 'nullable|string|max:50',
            'pengarang'    => 'required|string|max:100',
            'penerbit'     => 'required|string|max:100',
            'tahun_terbit' => 'required|digits:4|integer',
            'isbn'         => 'nullable|string|max:20',
            'jumlah_stok'  => 'required|integer|min:0',
            'lokasi_rak'   => 'required|string|max:50',
            'deskripsi'    => 'nullable|string',
            'cover'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload cover jika ada
        if ($request->hasFile('cover')) {
            $coverName = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('uploads/cover'), $coverName);
            $validated['cover'] = $coverName;
        }

        // Simpan data buku
        Book::create($validated);

        Alert::success('Success', 'Data buku berhasil ditambahkan');
        return back();
    }


    public function edit($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role;
        $categories = Category::all();
        // Ambil data buku berdasarkan ID
        $bukus = Book::find($id);

        // Validasi apakah data ditemukan
        if (!$bukus) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit
        return view('admin.buku.edit', compact('bukus', 'user', 'roles', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Validasi data yang masuk
        $validated = $request->validate([
            'kode_buku'    => 'required|string|max:50|unique:books,kode_buku,' . $id,
            'category'     => 'nullable|string|max:255',
            'judul'        => 'required|string|max:255',
            'status'       => 'nullable|string|max:50',
            'pengarang'    => 'required|string|max:100',
            'penerbit'     => 'required|string|max:100',
            'tahun_terbit' => 'required|digits:4|integer',
            'isbn'         => 'nullable|string|max:20',
            'jumlah_stok'  => 'required|integer|min:0',
            'lokasi_rak'   => 'required|string|max:50',
            'deskripsi'    => 'nullable|string',
            'cover'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload cover baru jika ada
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover && file_exists(public_path('uploads/cover/' . $book->cover))) {
                unlink(public_path('uploads/cover/' . $book->cover));
            }

            $coverName = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('uploads/cover'), $coverName);
            $validated['cover'] = $coverName;
        }

        // Update data buku
        $book->update($validated);

        Alert::success('Success', 'Data buku berhasil diperbarui');
        return redirect()->route('buku.index');
    }

    public function show($id)
    {
        $bukus = Book::findOrFail($id);
        return view('admin.buku.show', compact('bukus'));
    }


    public function destroy($id)
    {
        // Cari buku
        $bukus = Book::findOrFail($id);

        // Hapus cover jika ada
        if ($bukus->cover && file_exists(public_path('uploads/cover/' . $bukus->cover))) {
            unlink(public_path('uploads/cover/' . $bukus->cover));
        }

        // Hapus buku, relasi pivot akan otomatis terhapus karena onDelete('cascade')
        $bukus->delete();

        Alert::success('Success', 'Data buku beserta relasi kategori berhasil dihapus');
        return redirect()->route('buku.index');
    }
}
