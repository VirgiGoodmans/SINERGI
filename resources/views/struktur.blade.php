@extends('layout.app')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-4">Struktur Organisasi BUM Desa Sinergi Sidowayah</h1>

    <!-- Foto Struktur Organisasi -->
    <div class="text-center mb-5">
        <img src="{{ asset('images/Struktur.png') }}" alt="Struktur Organisasi BUMDES" class="img-fluid" id="struktur-img">
    </div>

    <!-- Visi dan Misi -->
    <div class="visi-misi">
        <!-- Visi -->
        <h3><strong>Visi</strong></h3>
        <p><strong>Visi BUM Desa Sinergi Sidowayah:</strong></p>
        <p>Menjadi Badan Usaha yang dimiliki Desa dengan kebermanfaatan bagi semua elemen masyarakat untuk menjadi Desa yang berdaya, mandiri, sejahtera, dan berkelanjutan.</p>

        <!-- Misi -->
        <h3><strong>Misi</strong></h3>
        <p><strong>Misi BUM Desa Sinergi Sidowayah ialah:</strong></p>
        <ul>
            @foreach([
                'Peningkatkan Pemanfaatan sumberdaya alam di Desa',
                'Peningkatkan Pemanfaatan sumberdaya manusia di Desa',
                'Peningkatan Perekonomian Desa',
                'Optimalisasi asset Desa untuk kesejahteraan Desa',
                'Peningkatan usaha masyarakat Desa dalam pengelolaan potensi ekonomi Desa',
                'Pengembangan rencana Kerjasama usaha Desa dengan pihak ketiga',
                'Upaya menciptakan peluang dan jaringan pasar yang mendukung kebutuhan layanan umum masyarakat Desa',
                'Penciptakan lapangan kerja bagi masyarakat Desa',
                'Membangkitkan kembali wisata tematik di tingkat RT',
                'Peningkatan pendapatan masyarakat Desa dan Pendapatan Asli Desa'
            ] as $misi)
                <li>{{ $misi }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
