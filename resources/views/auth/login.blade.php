@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1650&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .login-card {
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        color: #fff;
    }
    .btn-coffee {
        background-color: #8B4513;
        border: none;
        color: white;
    }
    .btn-coffee:hover {
        background-color: #A0522D;
    }
    .form-control {
        background-color: #333;
        color: #fff;
        border: 1px solid #555;
    }
    .form-control::placeholder {
        color: #aaa;
    }
</style>

<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-5">
        <div class="card login-card shadow-lg p-5">
            <h3 class="text-center mb-4" style="color: #D2B48C;">Login ke Noir Coffee</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-coffee w-100 py-2 mt-3">Login</button>

                <div class="mt-4 text-center">
                    <a href="#" class="text-light text-decoration-none">Lupa Password?</a> |
                    <a href="{{ url('/register') }}" class="text-warning text-decoration-none">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection