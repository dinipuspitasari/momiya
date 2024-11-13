<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade'); // Relasi ke users (pasien)
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade'); // Relasi ke dokters
            $table->foreignId('poli_id')->constrained('polikliniks')->onDelete('cascade'); // Relasi ke polikliniks
            $table->string('nama_anak');
            $table->string('nik_anak', 16);
            $table->string('no_kk_anak', 16);
            $table->date('tanggal_kedatangan');
            $table->time('jam_reservasi');
            $table->enum('status', ['menunggu', 'disetujui', 'sudah datang'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
