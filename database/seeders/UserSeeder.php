<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'nik' => '1234567890123456',
            'no_kk' => '1234567890123456',
            'no_telp' => '081234567890',
            'alamat' => 'Alamat Admin',
            'email' => 'admin@klinik.com',
            'password' => Hash::make('password'),
            'level_id' => 1, // Admin
        ]);

        User::create([
            'name' => 'Dokter A',
            'nik' => '1234567890123457',
            'no_kk' => '1234567890123457',
            'no_telp' => '081234567891',
            'alamat' => 'Alamat Dokter A',
            'email' => 'dokterA@klinik.com',
            'password' => Hash::make('password'),
            'level_id' => 2, // Dokter
        ]);

        User::create([
            'name' => 'Dokter b',
            'nik' => '1234567890157864',
            'no_kk' => '12345678901278',
            'no_telp' => '081234567891',
            'alamat' => 'Alamat Dokter B',
            'email' => 'dokterB@klinik.com',
            'password' => Hash::make('password'),
            'level_id' => 2, // Dokter
        ]);


        User::create([
            'name' => 'Pasien B',
            'nik' => '1234567890123458',
            'no_kk' => '1234567890123458',
            'no_telp' => '081234567892',
            'alamat' => 'Alamat Pasien B',
            'email' => 'pasienB@klinik.com',
            'password' => Hash::make('password'),
            'level_id' => 3, // Pasien
        ]);

        
    }
}
