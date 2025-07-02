<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fore Coffee Shop - Manajemen Produk</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <style>
        body {
            padding-bottom: 50px;
            background-color: #fef5f0; /* Cream */
            font-family: 'Poppins', sans-serif;
            color: #3e1f0d; /* Coklat tua */
        }

        .navbar {
            background: linear-gradient(to right, #3e1f0d, #70412e); /* Coklat tua gradasi */
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #fff !important;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .form-control {
            border-radius: 30px;
            padding-left: 15px;
        }

        .btn-light {
            background-color: #eaddcf; /* Latte */
            color: #3e1f0d;
            border: none;
            border-radius: 30px;
            padding: 6px 12px;
        }

        .card {
            background-color: #fffaf4;
            border: 1px solid #e0d3c0;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .card-title {
            color: #3e1f0d;
        }

        .card-text {
            color: #5c3a21;
        }

        .btn-success {
            background-color: #70412e;
            border: none;
        }

        .btn-success:hover {
            background-color: #3e1f0d;
        }

        footer {
            background-color: #3e1f0d;
            color: #fff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo & Brand -->
        <a class="navbar-brand" href="{{ route('produk.index') }}">
            NOÌR COFFEE
        </a>

        <!-- Toggle for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarMain">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('produk.index') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('testimoni') }}">Testimoni</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('promo') }}">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="{{ route('blog') }}">Blog</a>
                </li>
            </ul>
        </div>

        <!-- Search bar -->
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search Your Coffee" aria-label="Search">
            <button class="btn btn-light" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <!-- Auth buttons -->
        <div class="ms-3 d-flex align-items-center">
            @auth
                <span class="text-white me-2">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button class="btn btn-sm btn-outline-light" type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm btn-light">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="container mt-5 pt-4">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-white text-center py-3 mt-5">
    <small>&copy; {{ date('Y') }} Fore Coffee Shop. All rights reserved.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>