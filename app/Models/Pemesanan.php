<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id', 'spot_id', 'tanggal', 'jam', 'total_harga', 'jumlah_peserta', 'sound_system', 'tikar', 'resi_code', 'is_confirmed',
    ];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    public function paketTambahan()
    {
        return $this->belongsToMany(PaketTambahan::class, 'pemesanan_paket_tambahan');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
