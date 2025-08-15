<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Pustakawan'],
            ['name' => 'Anggota']
        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }

        // Admin
        User::create([
            'name' => 'Admin Perpustakaan',
            'username' => 'admin',
            'contact' => '082202020202',
            'role_id' => 1,
            'email' => 'smpn1kubung.com',
            'jenis_kelamin' => 'Laki-Laki',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        // Pustakawan 1
        User::create([
            'name' => 'Muhammad Andi',
            'username' => 'andi',
            'contact' => '085501010101',
            'role_id' => 2,
            'email' => 'muhammadandi123.com',
            'jenis_kelamin' => 'Laki-Laki',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
