@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil User</h1>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Halo, {{ Auth::user()->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p class="card-text"><strong>Terdaftar Sejak:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
            <a href="{{ route('logout') }}" class="btn btn-danger"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
