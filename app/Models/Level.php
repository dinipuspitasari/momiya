<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels'; // Pastikan nama tabel sesuai dengan nama tabel di database

    protected $fillable = [
        'name', // Tambahkan kolom yang ada di tabel levels
        // Tambahkan kolom lain yang diperlukan
    ];
}
