<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamansiswaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'nama_anggota'      => 'required|string|max:255',
            'buku'              => 'required|string|max:255',
            'tangal_pinjam'     => 'required|date',
            'tangal_jatuhtempo' => 'required|date',
            'status'            => 'required|string|max:50',
        ]);

        // 🔒 Cek apakah anggota sudah punya pinjaman aktif
        $sudahPinjam = Peminjaman::where('nama_anggota', $validated['nama_anggota'])
            ->where('status', 'dipinjam')
            ->exists();

        if ($sudahPinjam) {
            Alert::error('Gagal', 'Anggota ini sudah meminjam buku dan belum mengembalikannya!');
            return back();
        }

        // Simpan data ke tabel peminjaman
        Peminjaman::create($validated);

        Alert::success('Success', 'Data peminjaman berhasil ditambahkan');
        return back();
    }
}
