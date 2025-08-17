<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Ebook;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query dari model Peminjaman (ganti sesuai nama modelmu)
        $query = Peminjaman::query();

        // Jika ada pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_peminjam', 'like', "%{$search}%")
                ->orWhere('judul_ebook', 'like', "%{$search}%")
                ->orWhere('tanggal_pinjam', 'like', "%{$search}%");
        }

        // Gunakan paginate agar bisa pakai appends
        $peminjaman = $query->paginate(10)->appends($request->all());

        // Kalau ada data tambahan seperti user atau ebook, bisa ikut diambil
        $ebooks = Ebook::all();
        $users = User::where('role_id', 3)->get(); // hanya ambil user dengan role_id = 3
        $bukus = Book::all();

        return view('admin.peminjaman.index', compact(
            'peminjaman',
            'ebooks',
            'users',
            'bukus'
        ));
    }

    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $peminjaman = Peminjaman::find($id);
        $users = User::where('role_id', 3)->get(); // hanya ambil user dengan role_id = 3
        $bukus = Book::all();
        // Validasi apakah data ditemukan
        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit
        return view('admin.peminjaman.edit', compact('peminjaman', 'users', 'bukus'));
    }

    public function store(Request $request)
    {
        // Validasi data sesuai field model
        $validated = $request->validate([
            'nama_anggota'        => 'required|string|max:255',
            'buku'                => 'required|string|max:255',
            'tangal_pinjam'       => 'required|date',
            'tangal_jatuhtempo'   => 'required|date',
            'status'              => 'required|string|max:50',
        ]);

        // Simpan data ke tabel peminjaman
        Peminjaman::create($validated);

        Alert::success('Success', 'Data peminjaman berhasil ditambahkan');
        return back();
    }



    public function update(Request $request, $id)
    {
        // Cari data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Validasi data sesuai field model
        $validated = $request->validate([
            'tangal_dikembalikan' => 'nullable|date',
            'status'              => 'required|string|max:50',
        ]);

        // Update data
        $peminjaman->update($validated);

        Alert::success('Success', 'Data peminjaman berhasil diperbarui');
        return redirect()->route('peminjaman.index');
    }

    public function destroy($id)
    {

        $peminjaman = Peminjaman::where('id', $id)->first();
        $peminjaman->delete();

        Alert::success('Success', 'Data berhasil di Hapus');
        return redirect()->route('peminjaman.index');
    }

    public function cetak()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.cetak.index',compact('peminjaman'));
    }
}
