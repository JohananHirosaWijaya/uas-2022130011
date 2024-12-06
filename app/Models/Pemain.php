<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemain',
        'id_tim',
        'posisi',
        'umur',
        'kebangsaan'
    ];

    // Relasi ke Tim
    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    // Relasi ke Transfer
    public function transfer()
    {
        return $this->hasMany(Transfer::class, 'id_pemain');
    }
}
