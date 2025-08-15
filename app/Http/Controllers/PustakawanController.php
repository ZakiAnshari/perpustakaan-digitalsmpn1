<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use App\Models\Pustakawan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PustakawanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query search jika ada
        $query = Pustakawan::query(); // misal model untuk pustakawan adalah User

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        // Gunakan paginate agar bisa pakai appends
        $pustakawans = $query->paginate(10)->appends($request->all());

        // Jika ada data tambahan seperti kategori atau role, bisa diambil juga
        $roles = Roles::all(); // contoh, jika pakai tabel role

        return view('admin.Pustakawan.index', compact('pustakawans', 'roles'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|max:255|unique:pustakawans,email',
            'phone'   => 'nullable|string|max:20',
            'nip'  => 'required|string|max:20',
        ]);

        // Simpan data pustakawan
        Pustakawan::create($validated);

        Alert::success('Success', 'Data pustakawan berhasil ditambahkan');
        return back();
    }

    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $pustakawans = Pustakawan::find($id);

        // Validasi apakah data ditemukan
        if (!$pustakawans) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Tampilkan view edit
        return view('admin.Pustakawan.edit', compact('pustakawans'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data pustakawan berdasarkan ID
        $pustakawan = Pustakawan::findOrFail($id);

        // Validasi data yang masuk
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pustakawans,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'nip'   => 'nullable|string|max:50',
        ]);

        // Update data pustakawan
        $pustakawan->update($validated);

        Alert::success('Success', 'Data pustakawan berhasil diperbarui');
        return redirect()->route('pustakawan.index');
    }

    public function destroy($id)
    {

        $pustakawans = Pustakawan::where('id', $id)->first();
        $pustakawans->delete();

        Alert::success('Success', 'Data berhasil di Hapus');
        return redirect()->route('pustakawan.index');
    }
























 
    public function peminjaman()
    {
        return view('admin.peminjaman.index');
    }
    public function cetak()
    {
        return view('admin.cetak.index');
    }




}
