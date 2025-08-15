<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $roles = Roles::all();

        // Ambil input pencarian dan jumlah item per halaman
        $name = $request->input('name');
        $paginate = $request->input('itemsPerPage', 5); // default 5

        // Query awal pengguna
        $query = User::query();

        // Filter pencarian berdasarkan nama jika tersedia
        if (!empty($name)) {
            $query->where(function ($q) use ($name) {
                $q->where('name', 'LIKE', '%' . $name . '%')
                    ->orWhere('id', 'LIKE', '%' . $name . '%');
            });
        }


        // Eksekusi query dengan paginasi
        $users = $query->paginate($paginate)->withQueryString();

        return view('admin.user.index', compact('roles', 'user', 'users'));
    }

    public function store(Request $request)
    {

        // Validasi data dengan pesan kustom
        $validated = $request->validate([
            'name' => 'required|string|max:255|different:username|different:email',
            'username' => 'required|string|max:255|unique:users,username|different:email|different:name',
            'contact' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255|unique:users,email|different:name|different:username',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'kelas' => 'nullable|string|max:50',  // sesuai model
            'nisn' => 'nullable|string|max:20',   // sesuai model
        ]);

        // Simpan data ke database
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['role_id'],
            'contact' => $validated['contact'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'kelas' => $validated['kelas'] ?? null,
            'nisn' => $validated['nisn'] ?? null,
        ]);

        // Redirect atau beri respon sukses
        Alert::success('Success', 'Data User berhasil ditambahkan');
        return back();
    }


    public function edit($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role; // Mengambil role pengguna
        $users = User::find($id); // Mengambil data lokasi surfing berdasarkan ID
        // Ambil semua roles
        $roles = Roles::all();
        // Validasi apakah data ditemukan
        if (!$users) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.user.edit', compact('users', 'user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username,' . $id,
            'email'         => 'required|email|max:255|unique:users,email,' . $id,
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'contact'       => 'nullable|string|max:20',
            'role_id'       => 'required|exists:roles,id',
            'kelas'         => 'nullable|string|max:50',
            'nisn'          => 'nullable|string|max:20',
            'password'      => 'nullable|string|min:8', // optional jika ingin ganti password
        ]);

        // Hash password jika diisi
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); // jangan update password jika kosong
        }

        // Perbarui data di database
        $user->update($validatedData);

        // Redirect kembali dengan pesan sukses
        Alert::success('Success', 'Data berhasil diperbarui');
        return redirect()->route('user.index');
    }


    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.show', compact('users'));
    }

    public function destroy($id)
    {

        $users = User::where('id', $id)->first();
        $users->delete();

        Alert::success('Success', 'Data berhasil di Hapus');
        return redirect()->route('user.index');
    }

    public function anggota(Request $request)
    {
        $user = Auth::user();

        // Ambil input pencarian dan jumlah item per halaman
        $name = $request->input('name');
        $paginate = $request->input('itemsPerPage', 5); // default 5

        // Query awal anggota: hanya role_id 2
        $query = User::where('role_id', 3);

        // Filter pencarian berdasarkan nama atau NISN jika tersedia
        if (!empty($name)) {
            $query->where(function ($q) use ($name) {
                $q->where('name', 'LIKE', '%' . $name . '%')
                    ->orWhere('nisn', 'LIKE', '%' . $name . '%');
            });
        }

        // Eksekusi query dengan paginasi
        $users = $query->paginate($paginate)->withQueryString();

        return view('admin.anggota.index', compact('user', 'users'));
    }
}
