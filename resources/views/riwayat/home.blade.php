@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Lora', serif;
        color: #f5f5dc;
    }

    body {
        background: url('/images/background-coklat.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(44, 33, 20, 0.75); /* Sama seperti checkout */
        z-index: -1;
    }

    h1, h2, h3, h4, h5, h6 {
        color: #deb887;
        text-shadow: 1px 1px 4px #4b3b2b;
    }

    .content-section {
        background-color: rgba(75, 59, 43, 0.85);
        padding: 30px;
        border-radius: 10px;
        margin: 40px auto;
        width: 80%;
        box-shadow: 0 0 10px #5a4220;
    }

    p {
        color: #f5deb3;
        font-size: 18px;
        line-height: 1.6;
        text-shadow: 0 0 3px #2a1a0e;
    }

    .btn-primary {
        background-color: #8b5e3c;
        border: none;
        padding: 10px 20px;
        color: white;
        font-weight: bold;
        border-radius: 6px;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 6px #5a4220;
    }

    .btn-primary:hover {
        background-color: #a6754f;
        box-shadow: 0 6px 10px #7a5230;
    }
</style>
<div class="row align-items-center dashboard-section">
    <div class="col-md-6 p-5">
        <h5 class="mb-3">Tentang <strong>Noìr Coffee</strong></h5>
        <h1 class="display-4 fw-bold">Our Story</h1>
        <p class="lead mt-4" style="line-height: 1.8;">
            Di Noìr Coffee, kami percaya bahwa setiap cangkir kopi memiliki cerita. 
            Dari biji kopi terbaik di Nusantara, kami menyajikan cita rasa yang otentik dan penuh semangat.
            Kami hadir untuk memberikan pengalaman kopi yang menyegarkan dan berkelanjutan bagi semua.
        </p>
        <a href="{{ route('produk.index') }}" class="btn btn-menu rounded-pill px-4 py-2 mt-3 shadow-sm">
            Lihat Menu
        </a>
    </div>
    <div class="col-md-6 p-4 text-center">
        <img src="{{ asset('images/store-interior.jpg') }}" alt="Kopi Noir" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px; object-fit: cover;">
    </div>
</div>
@endsection