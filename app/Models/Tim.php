<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tim',
        'id_liga',
        'kota',
        'tahun_berdiri'
    ];

    // Relasi ke Liga
    public function liga()
    {
        return $this->belongsTo(Liga::class, 'id_liga');
    }

    // Relasi ke Manajer
    public function manajer()
    {
        return $this->hasOne(Manajer::class, 'id_tim');
    }

    // Relasi ke Pemain
    public function pemains()
    {
        return $this->hasMany(Pemain::class, 'id_tim');
    }

    // Relasi ke Transfer
    public function transferAsal()
    {
        return $this->hasMany(Transfer::class, 'id_tim_asal');
    }

    public function transferTujuan()
    {
        return $this->hasMany(Transfer::class, 'id_tim_tujuan');
    }
}
