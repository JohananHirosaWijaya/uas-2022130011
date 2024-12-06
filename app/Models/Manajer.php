<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manajer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_tim',
        'umur',
        'pengalaman'
    ];

    // Relasi ke Tim
    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }
}
