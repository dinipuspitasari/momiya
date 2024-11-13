<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'nama_level' => 'Administrator',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_level' => 'Dokter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_level' => 'Pelanggan',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Menggunakan model Level untuk memasukkan data
        Level::insert($levels);
    }
}
