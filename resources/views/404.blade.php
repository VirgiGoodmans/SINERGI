@extends('layout.app')

@section('title', 'Fitur Belum Dibuat')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-1 text-danger">404</h1>
    <h2>Oops! Fitur Belum Dibuat</h2>
    <p>Maaf, fitur yang Anda cari belum dibuat. Programmernya sedang makan nasi belut.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
</div>
@endsection
