<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dokter extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'nik',
        'no_kk',
        'no_telp',
        'alamat',
        'spesialis',
        'poli_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function poliklinik() 
    {
        return $this->belongsTo(Poliklinik::class, 'poli_id', 'id');
    }
}
