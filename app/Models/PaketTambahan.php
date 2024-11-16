<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketTambahan extends Model
{
    protected $table = 'paket_tambahan'; // Nama tabel di database
    protected $fillable = ['nama', 'harga', 'deskripsi']; // Kolom yang dapat diisi

    // Relasi dengan pemesanan
    public function pemesanan()
    {
        return $this->belongsToMany(Pemesanan::class, 'pemesanan_paket_tambahan', 'paket_tambahan_id', 'pemesanan_id');
    }
}
