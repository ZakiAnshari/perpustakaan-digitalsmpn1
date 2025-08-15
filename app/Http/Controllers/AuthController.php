<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerprocess(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|email|max:255|unique:users,email',
            'password'      => 'required|string|min:6|confirmed',
            'contact'       => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'kelas'         => 'nullable|string|max:100',
            'nisn'          => 'nullable|string|max:20',
        ]);

        // Hash password di sini
        $validated['password'] = Hash::make($validated['password']);

        // Tambahkan role_id default
        $validated['role_id'] = 3;

        // Simpan ke database
        User::create($validated);

        alert()->success('Registrasi Berhasil', 'Silakan login untuk melanjutkan');
        return redirect()->route('login');
    }





    public function login()
    {
        return view('login');
    }


    // LOGIN
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'username.required' => 'Username harus diisi!',
            'username.username' => 'Format username harus benar',
            'password.required' => 'Password harus diisi!',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            toast('Username tidak ditemukan', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            toast('Password salah', 'error')->position('top-end')->autoClose(3000)->width('fit-content');
            return back()->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        alert()->success('Berhasil Login', 'Selamat datang di Sistem Informasi Perpustakaan');

        // Arahkan sesuai role_id
        if ($user->role_id == 3) {
            return redirect()->intended('dashboardpinjam');
        }

        return redirect()->intended('dashboard');
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
