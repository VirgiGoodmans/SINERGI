@extends('layout.app')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-4">Struktur Organisasi BUM Desa Sinergi Sidowayah</h1>

    <!-- Foto Struktur Organisasi -->
    <div class="text-center mb-5">
        <img src="{{ asset('images/Struktur.png') }}" alt="Struktur Organisasi BUMDES" class="img-fluid">
    </div>

    <!-- Visi dan Misi -->
    <div class="visi-misi">
        <!-- Visi -->
        <h3><strong>Visi</strong></h3>
        <p><strong>Visi BUM Desa Sinergi Sidowayah</strong></p>
        <p>Menjadi Badan Usaha yang dimiliki Desa dengan kebermanfaatan bagi semua elemen masyarakat untuk menjadi Desa yang berdaya, mandiri, sejahtera, dan berkelanjutan.</p>

        <!-- Misi -->
        <h3><strong>Misi</strong></h3>
        <p><strong>Misi BUM Desa Sinergi Sidowayah ialah:</strong></p>
        <ul>
            <li>Peningkatkan Pemanfaatan sumberdaya alam di Desa;</li>
            <li>Peningkatkan Pemanfaatan sumberdaya manusia di Desa;</li>
            <li>Peningkatan Perekonomian Desa;</li>
            <li>Optimalisasi asset Desa untuk kesejahteraan Desa;</li>
            <li>Peningkatan usaha masyarakat Desa dalam pengelolaan potensi ekonomi Desa;</li>
            <li>Pengembangan rencana Kerjasama usaha Desa dengan pihak ketiga;</li>
            <li>Upaya menciptakan peluang dan jaringan pasar yang mendukung kebutuhan layanan umum masyarakat Desa;</li>
            <li>Penciptakan lapangan kerja bagi masyarakat Desa;</li>
            <li>Membangkitkan kembali wisata tematik di tingkat RT;</li>
            <li>Peningkatan pendapatan masyarakat Desa dan Pendapatan Asli Desa;</li>
        </ul>
    </div>
</div>
@endsection
