@extends('layout.app')

@section('title', 'Pemesanan Siblarak')

@section('content')
    <h1>Pemesanan di Siblarak</h1>
    <form action="{{ route('pemesanan.siblarak') }}" method="POST">
        @csrf
        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Pilih Spot</label>
        <select name="spots[]" multiple>
            @foreach($spots as $spot)
                <option value="{{ $spot->id }}">{{ $spot->nama_spot }} - Rp {{ $spot->harga }}</option>
            @endforeach
        </select>

        <button type="submit">Pesan</button>
    </form>
@endsection
