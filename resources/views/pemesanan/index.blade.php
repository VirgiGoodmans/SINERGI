@extends('layout.app')

@section('title', 'Pemesanan')

@section('content')
<div class="container mt-5">
    <h1>Pemesanan Tempat</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Pemesanan -->
    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="spot_id" class="form-label">Pilih Spot</label>
            <select name="spot_id[]" class="form-control" multiple>
                @foreach($spots as $spot)
                    <option value="{{ $spot->id }}">{{ $spot->nama_spot }} ({{ $spot->tipe }})</option>
                @endforeach
            </select>
            <small>Pilih lebih dari satu spot dengan menahan tombol Ctrl atau Cmd</small>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>
@endsection
