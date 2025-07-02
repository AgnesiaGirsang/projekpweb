@extends('layouts.app')

<style>
    body {
        background: url('/images/background-coklat.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
        color: #f5deb3;
        font-family: 'Lora', serif;
        }

    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(44, 33, 20, 0.75);
        z-index: -1;
    }

    h1 {
        color: #fce8c3; /* warna terang tapi tetap lembut */
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8); /* bayangan lebih tebal */
    }

    h2 {
        color: #deb887;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 4px #4b3b2b;
    }

    .card {
        background-color: rgba(75, 59, 43, 0.85);
        border: none;
        color: #f5deb3;
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 12px;
        box-shadow: 0 0 10px #5a4220;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(90, 66, 32, 0.8);
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #ffdead;
    }

    .card-text {
        font-size: 0.95rem;
        color: #ffe4b5;
    }

    .btn-success {
        background-color: #8b5e3c;
        border: none;
        color: white;
        font-weight: bold;
        box-shadow: 0 4px 6px #5a4220;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #a6754f;
        box-shadow: 0 6px 10px #7a5230;
    }

    .btn-primary {
        background-color: #deb887;
        border: none;
        color: #3e2723;
        font-weight: bold;
        display: block;
        width: 200px;
        margin: 0 auto;
        text-align: center;
        margin-top: 40px;
        box-shadow: 0 4px 6px #5a4220;
    }

    .btn-primary:hover {
        background-color: #cdaa7d;
        box-shadow: 0 6px 10px #7a5230;
    }

    .poster-img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(90, 66, 32, 0.7);
        margin-bottom: 20px;
    }
</style>

@section('content')
<div class="container">
    <h1 class="mb-4">Promo Bulan Ini</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <img src="{{ asset('images/poster1.jpg') }}" alt="Promo 1" class="poster-img">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('images/poster2.jpg') }}" alt="Promo 2" class="poster-img">
        </div>
        <div class="col-md-4 mb-4">
            <img src="{{ asset('images/poster3.jpg') }}" alt="Promo 3" class="poster-img">
        </div>
        <div class="col-md-6 mb-4">
            <img src="{{ asset('images/poster4.jpg') }}" alt="Promo 4" class="poster-img">
        </div>
        <div class="col-md-6 mb-4">
            <img src="{{ asset('images/poster5.jpg') }}" alt="Promo 5" class="poster-img">
        </div>
    </div>
</div>
@endsection