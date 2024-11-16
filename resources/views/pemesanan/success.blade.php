@extends('layout.app')

@section('title', 'Pemesanan Berhasil')

@section('content')
    <div class="container mt-5 text-center">
        <h1>Pemesanan Berhasil!</h1>
        <p>Terima kasih, pesanan Anda telah berhasil dibuat. Berikut detail pesanan Anda:</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Spot</th>
                    <th>Tanggal</th>
                    <th>Sesi</th>
                    <th>Fasilitas Tambahan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemesanan->spots as $spot)
                <tr>
                    <td>{{ $spot->nama_spot }}</td>
                    <td>{{ $pemesanan->tanggal }}</td>
                    <td>{{ $pemesanan->jam }}</td>
                    <td>
                        @if($pemesanan->sound_system)
                            Sound System<br>
                        @endif
                        @if($pemesanan->tikar)
                            Tikar
                        @endif
                    </td>
                    <td>Rp {{ number_format($pemesanan->total_harga) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
@endsection
