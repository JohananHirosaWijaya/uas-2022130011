<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pemain',
        'id_tim_asal',
        'id_tim_tujuan',
        'tanggal_transfer',
        'biaya_transfer'
    ];

    // Relasi ke Pemain
    public function pemain()
    {
        return $this->belongsTo(Pemain::class, 'id_pemain');
    }

    // Relasi ke Tim Asal
    public function timAsal()
    {
        return $this->belongsTo(Tim::class, 'id_tim_asal');
    }

    // Relasi ke Tim Tujuan
    public function timTujuan()
    {
        return $this->belongsTo(Tim::class, 'id_tim_tujuan');
    }
}
