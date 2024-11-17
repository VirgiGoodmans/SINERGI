<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - BUMDES Sidowayah</title>
    <link rel="icon" href="{{ asset('images/BUMDES-Sidowayah.ico') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/BUMDES-Sidowayah.png') }}" alt="BUMDES Sidowayah" width="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="wisataDropdown" role="button" data-bs-toggle="dropdown">Tempat Wisata</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('wisata.siblarak') }}">Siblarak</a></li>
                            <li><a class="dropdown-item" href="{{ route('wisata.kemanten') }}">Umbul Kemanten</a></li>
                            <li><a class="dropdown-item" href="{{ route('wisata.kampung-dolanan') }}">Kampung Dolanan</a></li>
                            <li><a class="dropdown-item" href="{{ route('wisata.umkm-lokal') }}">UMKM Lokal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('struktur') }}">Profil Desa</a></li>
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profil Saya</a></li>
                                @if(Auth::user()->role == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('pemesanan.index') }}">Status Pemesanan</a></li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container text-center py-4">
            <h4>Temukan Kami di</h4>
            <div class="footer-social-icons">
                <a href="https://wa.me/6281234567890" target="_blank" class="text-white mx-3"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://instagram.com/bumdessidowayah" target="_blank" class="text-white mx-3"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://tiktok.com/@bumdessidowayah" target="_blank" class="text-white mx-3"><i class="fab fa-tiktok"></i> TikTok</a>
            </div>
            <p class="mt-3">&copy; 2024 BUMDES Sidowayah. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
