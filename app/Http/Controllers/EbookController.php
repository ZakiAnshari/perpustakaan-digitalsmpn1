<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Ebook;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EbookController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query search jika ada
        $query = Ebook::query(); // misal model untuk pustakawan adalah User

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Gunakan paginate agar bisa pakai appends
        $ebooks = $query->paginate(10)->appends($request->all());

        // Jika ada data tambahan seperti kategori atau role, bisa diambil juga
        $roles = Roles::all(); // contoh, jika pakai tabel role

        return view('admin.ebook.index', compact('ebooks', 'roles'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'judul_ebook'  => 'required|string|max:255',
            'penggarang'   => 'required|string|max:100',
            'penerbit'     => 'required|string|max:100',
            'tahun_terbit' => 'required|digits:4|integer',
            'cover'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_pdf'     => 'nullable|mimes:pdf|max:10240', // max 10MB
        ]);

        // Upload cover jika ada
        if ($request->hasFile('cover')) {
            $coverName = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('uploads/cover'), $coverName);
            $validated['cover'] = $coverName;
        }

        // Upload PDF jika ada
        if ($request->hasFile('file_pdf')) {
            $pdfName = time() . '_' . $request->file('file_pdf')->getClientOriginalName();
            $request->file('file_pdf')->move(public_path('uploads/pdf'), $pdfName);
            $validated['file_pdf'] = $pdfName;
        }

        // Simpan data ebook
        Ebook::create($validated);

        Alert::success('Success', 'Data ebook berhasil ditambahkan');
        return back();
    }


    public function edit($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role;
        // Ambil data buku berdasarkan ID
        $ebooks = Ebook::find($id);

        // Validasi apakah data ditemukan
        if (!$ebooks) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit
        return view('admin.ebook.edit', compact('ebooks', 'user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data ebook berdasarkan ID
        $ebook = Ebook::findOrFail($id);

        // Validasi data yang masuk
        $validated = $request->validate([
            'judul_ebook'  => 'required|string|max:255',
            'penggarang'   => 'required|string|max:100',
            'penerbit'     => 'required|string|max:100',
            'tahun_terbit' => 'required|digits:4|integer',
            'cover'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_pdf'     => 'nullable|mimes:pdf|max:10240', // max 10MB
        ]);

        // Upload cover baru jika ada
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($ebook->cover && file_exists(public_path('uploads/cover/' . $ebook->cover))) {
                unlink(public_path('uploads/cover/' . $ebook->cover));
            }

            $coverName = time() . '_' . $request->file('cover')->getClientOriginalName();
            $request->file('cover')->move(public_path('uploads/cover'), $coverName);
            $validated['cover'] = $coverName;
        }

        // Upload file PDF baru jika ada
        if ($request->hasFile('file_pdf')) {
            // Hapus pdf lama jika ada
            if ($ebook->file_pdf && file_exists(public_path('uploads/pdf/' . $ebook->file_pdf))) {
                unlink(public_path('uploads/pdf/' . $ebook->file_pdf));
            }

            $pdfName = time() . '_' . $request->file('file_pdf')->getClientOriginalName();
            $request->file('file_pdf')->move(public_path('uploads/pdf'), $pdfName);
            $validated['file_pdf'] = $pdfName;
        }

        // Update data ebook
        $ebook->update($validated);

        Alert::success('Success', 'Data ebook berhasil diperbarui');
        return redirect()->route('ebook.index');
    }

    public function show($id)
    {
        $ebooks = Ebook::findOrFail($id);
        return view('admin.ebook.show', compact('ebooks'));
    }

    public function destroy($id)
    {
        $ebooks = Ebook::findOrFail($id);
        $ebooks->delete();

        Alert::success('Success', 'Ebook berhasil dihapus');
        return redirect()->route('ebook.index');
    }
}
