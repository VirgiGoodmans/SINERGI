@extends('layout.app')

@section('title', 'Pemesanan Kampung Dolanan')

@section('content')
    <h1>Pemesanan di Kampung Dolanan</h1>
    <form action="{{ route('pemesanan.kampung-dolanan') }}" method="POST">
        @csrf
        <label>Pilih Paket</label>
        <select name="paket_id" required>
            @foreach($paketKegiatan as $paket)
                <option value="{{ $paket->id }}">{{ $paket->nama_paket }} - Rp {{ $paket->harga }}</option>
            @endforeach
        </select>

        <label>Jumlah Peserta</label>
        <input type="number" name="jumlah_peserta" min="30" required>

        <button type="submit">Pesan</button>
    </form>
@endsection
