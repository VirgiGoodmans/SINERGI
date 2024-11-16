<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Spot;
use App\Models\PaketKegiatan;
use App\Models\PaketTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    // Menampilkan form pemesanan
    public function index()
    {
        $spots = Spot::all();
        $paketKegiatan = PaketKegiatan::all();
        $paketTambahan = PaketTambahan::all();
        return view('pemesanan.index', compact('spots', 'paketKegiatan', 'paketTambahan'));
    }

    // Menyimpan pemesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'spot_id' => 'required|exists:spots,id',
            'paket_id' => 'nullable|exists:paket_kegiatan,id',
            'jumlah_peserta' => 'nullable|integer|min:30',
            'dp' => 'nullable|integer|min:200000',
            'sound_system' => 'boolean',
            'tikar' => 'boolean',
            'paket_tambahan' => 'array',
        ]);

        $totalBiaya = $validated['dp'] ?? 0;

        // Tambahkan biaya berdasarkan paket kegiatan
        if (!empty($validated['paket_id']) && !empty($validated['jumlah_peserta'])) {
            $paketKegiatan = PaketKegiatan::findOrFail($validated['paket_id']);
            $totalBiaya += $validated['jumlah_peserta'] * $paketKegiatan->harga;

            // Biaya tambahan untuk guru
            $biayaGuru = intdiv($validated['jumlah_peserta'], 10) * $paketKegiatan->harga;
            $totalBiaya += $biayaGuru;
        }

        // Tambahkan biaya fasilitas tambahan
        if (!empty($validated['paket_tambahan'])) {
            $hargaTambahan = PaketTambahan::whereIn('id', $validated['paket_tambahan'])->sum('harga');
            $totalBiaya += $hargaTambahan * ($validated['jumlah_peserta'] ?? 1);
        }

        // Tambahkan biaya untuk sound system dan tikar
        if ($request->sound_system) $totalBiaya += 50000;
        if ($request->tikar) $totalBiaya += 50000;

        // Simpan pemesanan
        $pemesanan = Pemesanan::create([
            'user_id' => Auth::id(),
            'spot_id' => $validated['spot_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'total_harga' => $totalBiaya,
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'dp' => $validated['dp'] ?? 0,
            'sound_system' => $request->sound_system ?? 0,
            'tikar' => $request->tikar ?? 0,
        ]);

        // Simpan paket tambahan
        if (!empty($validated['paket_tambahan'])) {
            $pemesanan->paketTambahan()->attach($validated['paket_tambahan']);
        }

        return redirect()->route('pemesanan.success');
    }

    // Menampilkan halaman sukses pemesanan
    public function success()
    {
        return view('pemesanan.success');
    }
}
