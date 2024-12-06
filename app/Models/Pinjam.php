<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjams';

    protected $fillable = [
        'id_pemain',
        'id_tim_asal',
        'id_tim_tujuan',
        'tanggal_pinjam',
        'durasi_pinjam',
        'biaya_pinjam',
    ];

    public function pemain()
    {
        return $this->belongsTo(Pemain::class, 'id_pemain');
    }

    public function timAsal()
    {
        return $this->belongsTo(Tim::class, 'id_tim_asal');
    }

    public function timTujuan()
    {
        return $this->belongsTo(Tim::class, 'id_tim_tujuan');
    }
}
