@extends('layout.app')

@section('title', 'Kampung Dolanan Sidowayah')

@section('content')
<div class="container mt-5">
    <!-- Bagian Tengah: Gambar dan Judul -->
    <div class="text-center">
        <img src="{{ asset('images/ProfileKDS.png') }}" class="img-fluid" alt="Kampung Dolanan">
        <h2 style="font-family: Arial, sans-serif; font-weight: bold;">Kampung Dolanan Sidowayah</h2>
    </div>

    <!-- Bagian Sekilas Info: Kanan teks, kiri gambar -->
    <div class="row mt-4">
        <div class="col-md-6">
            <img src="{{ asset('images/KDSDetail1.png') }}" class="img-fluid" alt="Kampung Dolanan">
        </div>
        <div class="col-md-6">
            <p>
                Kampung Dolanan adalah wisata yang mengajarkan peserta tentang permainan tradisional, mini outbond, serta tour ke berbagai UMKM lokal. Peserta juga dapat tour ke komplek wisata Siblarak dengan menaiki andong untuk berenang.
            </p>
        </div>
    </div>

    <!-- Gambar Paket-Paket KDS -->
    <div class="mt-5">
        <h3>Paket Kegiatan yang Tersedia</h3>
        @if(isset($paket_kegiatan) && $paket_kegiatan->count() > 0)
            <ul class="list-group mb-4">
                @foreach($paket_kegiatan as $paket)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $paket->nama_paket }}
                        <span class="badge bg-primary rounded-pill">Harga: Rp {{ number_format($paket->harga) }}</span>
                        <a href="{{ route('pemesanan.create', $paket->id) }}" class="btn btn-success">Pesan Paket</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Tidak ada paket kegiatan yang tersedia saat ini.</p>
        @endif
    </div>

    <!-- Button untuk Outbond -->
    <div class="text-center mt-5">
        <a href="/pemesanan" class="btn btn-danger btn-lg">Tertarik untuk Outbond? Ayo daftar sekarang!</a>
    </div>

    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
</div>
@endsection
