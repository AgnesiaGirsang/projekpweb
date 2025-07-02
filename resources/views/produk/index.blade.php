@extends('layouts.app')

@section('content')
<style>
    body {
        background: url('/images/background-coklat.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        z-index: 0;
        color: #f5deb3;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(44, 33, 20, 0.75);
        z-index: -1;
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

    .btn-outline-light.active {
        background-color: #deb887;
        color: #3e2723;
    }
</style>

<div class="container py-4">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mt-1 mb-3">
        <h2 class="fw-bold">Menu Produk</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-success rounded-pill px-4 py-1 btn-sm">+ Tambah Produk</a>
    </div>

    {{-- Filter Kategori --}}
    @php
        $currentKategori = request()->kategori;
    @endphp
    <div class="mb-4 d-flex gap-2">
        <a href="{{ route('produk.index') }}" class="btn btn-outline-light btn-sm {{ !$currentKategori ? 'active' : '' }}">Semua Produk</a>
        <a href="{{ route('produk.index', ['kategori' => 'Coffee']) }}" class="btn btn-outline-light btn-sm {{ $currentKategori == 'Coffee' ? 'active' : '' }}">Coffee</a>
        <a href="{{ route('produk.index', ['kategori' => 'Non-Coffee']) }}" class="btn btn-outline-light btn-sm {{ $currentKategori == 'Non-Coffee' ? 'active' : '' }}">Non-Coffee</a>
        <a href="{{ route('produk.index', ['kategori' => 'Roti']) }}" class="btn btn-outline-light btn-sm {{ $currentKategori == 'Roti' ? 'active' : '' }}">Roti</a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Produk --}}
    @if($produks->isEmpty())
        <div class="alert alert-warning">Belum ada produk.</div>
    @else
        <div id="produk-list" class="row row-cols-2 row-cols-md-4 g-3">
            @foreach ($produks as $produk)
                @php
                    $kategori = strtolower(trim($produk->kategori));
                    $nama = strtolower(trim($produk->nama_produk));
                    $image = 'images/Kopiekspresso.jpg';
                    if ($produk->gambar) $image = 'uploads/' . $produk->gambar;
                    elseif ($nama == 'latte') $image = 'uploads/latte.jpg';
                    elseif (in_array($nama, ['cappucino', 'cappuccino'])) $image = 'uploads/cappucino.jpg';
                    elseif ($nama == 'americano') $image = 'uploads/americano.jpg';
                    elseif ($nama == 'mocha') $image = 'uploads/mocha.jpg';
                    elseif ($nama == 'green tea latte') $image = 'uploads/greentea.jpg';
                    elseif ($nama == 'vanilla latte') $image = 'uploads/vanila.jpg';
                    elseif ($nama == 'caramel macchiato') $image = 'uploads/caramel macchiato.jpg';
                    elseif ($nama == 'hazelnut latte') $image = 'uploads/hazelnut.jpg';
                    elseif ($nama == 'croissant') $image = 'uploads/croissant.jpg';
                    elseif ($nama == 'chocolate croissant') $image = 'uploads/chocolattecroissant.jpg';
                    elseif ($nama == 'cinammon roll cokelat') $image = 'uploads/cinammon roll cokelat.jpg';
                    elseif ($nama == 'pizza burger') $image = 'uploads/pizzaburger.jpg';
                    elseif ($nama == 'chocolatte cake') $image = 'uploads/chocolatte cake.jpg';
                    elseif ($nama == 'teh manis dingin') $image = 'uploads/teh.jpg';
                    elseif ($nama == 'lemon tea') $image = 'uploads/lemontea.jpg';
                    elseif ($nama == 'oreo smothies') $image = 'uploads/oreo.jpg';
                    elseif ($nama == 'bluberry ice cream') $image = 'uploads/bluberry.jpg';
                    elseif ($nama == 'donat') $image = 'uploads/donat.jpg';
                    elseif ($nama == 'sandwich') $image = 'uploads/sandwich.jpg';
                    elseif ($nama == 'waffle') $image = 'uploads/waffle.jpg';
                    elseif ($nama == 'garlic bread') $image = 'uploads/garlic.jpg';
                    elseif ($nama == 'pancake') $image = 'uploads/pancake.jpg';
                    elseif ($nama == 'coffee bun') $image = 'uploads/coffebun.jpg';
                @endphp

                <div class="col produk-item" data-kategori="{{ $kategori }}">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 150px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <div class="card-body p-2">
                            <h6 class="card-title mb-1">{{ $produk->nama_produk }}</h6>
                            <p class="card-text mb-1">{{ $produk->deskripsi }}</p>
                            <p class="fw-semibold mb-2">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between px-2 pb-2">
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-outline-success btn-sm rounded-pill px-2">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded-pill px-2">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection