<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'poli_id',
        'nama_anak',
        'nik_anak',
        'no_kk_anak',
        'tanggal_kedatangan',
        'jam_reservasi',
        'status',
    ];

    // Relasi dengan User (Pasien)
    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    // Relasi dengan User (Dokter)
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    // Relasi dengan Poliklinik
    public function poli()
    {
        return $this->belongsTo(Poliklinik::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
