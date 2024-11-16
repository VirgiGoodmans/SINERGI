<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    // Mengisi kolom-kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'nama_spot', 'wisata_id', 'kapasitas', // Menggunakan nama kolom yang sesuai
    ];

    // Relasi ke model Wisata
    public function wisata()
    {
        return $this->belongsTo(Wisata::class); // Menambahkan relasi ke model Wisata
    }
}
