<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_liga',
        'negara',
        'jumlah_tim'
    ];

    // Relasi ke Tim
    public function tims()
    {
        return $this->hasMany(Tim::class, 'id_liga');
    }
}
