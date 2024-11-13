<?php

namespace Database\Seeders;

use App\Models\Poliklinik;
use Illuminate\Database\Seeder;

class PoliklinikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poliklinik::create([
            'nama_poli' => 'Poliklinik Umum & Laktasi',
            'lokasi' => 'Lantai 1, Gedung A',
        ]);

        Poliklinik::create([
            'nama_poli' => 'Poliklinik Pediatrician',
            'lokasi' => 'Lantai 2, Gedung A',
        ]);

        Poliklinik::create([
            'nama_poli' => 'Poliklinik Obstetrics & Gynecology',
            'lokasi' => 'Lantai 3, Gedung B',
        ]);

        Poliklinik::create([
            'nama_poli' => 'Psikolog Klinis Anak & Remaja',
            'lokasi' => 'Lantai 3, Gedung B',
        ]);

        // Tambah data poliklinik lainnya sesuai kebutuhan
    }
}
