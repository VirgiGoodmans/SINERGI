@extends('layout.app')

@section('title', 'Pemesanan Kemanten')

@section('content')
    <h1>Pemesanan di Umbul Kemanten</h1>
    <form action="{{ route('pemesanan.kemanten') }}" method="POST">
        @csrf
        <label>Tanggal</label>
        <input type="date" name="tanggal" required>

        <label>Jam</label>
        <select name="jam">
            <option value="8AM-12.30PM">Sesi 1: 8AM - 12.30PM</option>
            <option value="1PM-4PM">Sesi 2: 1PM - 4PM</option>
        </select>

        <label>Pilih Spot</label>
        <select name="spot_id">
            @foreach($spots as $spot)
                <option value="{{ $spot->id }}">{{ $spot->nama_spot }}</option>
            @endforeach
        </select>

        <label>Fasilitas Tambahan</label>
        <input type="checkbox" name="sound_system"> Sound System (+50k)
        <input type="checkbox" name="tikar"> Tikar (+50k)

        <label>DP (Minimal 200k)</label>
        <input type="number" name="dp" min="200000" required>

        <button type="submit">Pesan</button>
    </form>
@endsection
