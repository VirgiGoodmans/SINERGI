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
    public function formSiblarak()
    {
        $spots = Spot::where('lokasi', 'Siblarak')->get();
        return view('pemesanan.siblarak', compact('spots'));
    }

    public function storeSiblarak(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'spots' => 'required|array',
            'spots.*' => 'exists:spots,id',
        ]);

        foreach ($validated['spots'] as $spotId) {
            Pemesanan::create([
                'user_id' => Auth::id(),
                'spot_id' => $spotId,
                'tanggal' => $validated['tanggal'],
                'total_harga' => Spot::findOrFail($spotId)->harga,
            ]);
        }

        return redirect()->route('pemesanan.success');
    }

// Umbul Kemanten
    public function formKemanten()
    {
        $spots = Spot::where('lokasi', 'Kemanten')->get();
        return view('pemesanan.kemanten', compact('spots'));
    }

    public function storeKemanten(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'spot_id' => 'required|exists:spots,id',
            'dp' => 'required|integer|min:200000',
            'sound_system' => 'boolean',
            'tikar' => 'boolean',
        ]);

        $totalHarga = $validated['dp'];
        if ($request->sound_system) $totalHarga += 50000;
        if ($request->tikar) $totalHarga += 50000;

        Pemesanan::create([
            'user_id' => Auth::id(),
            'spot_id' => $validated['spot_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('pemesanan.success');
    }

// Kampung Dolanan
    public function formKampungDolanan()
    {
        $paketKegiatan = PaketKegiatan::all();
        return view('pemesanan.kampung-dolanan', compact('paketKegiatan'));
    }

    public function storeKampungDolanan(Request $request)
    {
        $validated = $request->validate([
            'paket_id' => 'required|exists:paket_kegiatan,id',
            'jumlah_peserta' => 'required|integer|min:30',
        ]);

        $paket = PaketKegiatan::findOrFail($validated['paket_id']);
        $totalHarga = $validated['jumlah_peserta'] * $paket->harga;

        Pemesanan::create([
            'user_id' => Auth::id(),
            'paket_id' => $validated['paket_id'],
            'jumlah_peserta' => $validated['jumlah_peserta'],
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('pemesanan.success');
    }


    // Menampilkan halaman sukses pemesanan
    public function success()
    {
        return view('pemesanan.success');
    }
}
