@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Produk Non-Coffee</h2>

        @if ($produks->count() > 0)
            <div class="row">
                @foreach ($produks as $produk)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">{{ $produk->deskripsi }}</p>
                                <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($produk->harga) }}</p>
                                <p class="card-text"><strong>Stok:</strong> {{ $produk->stok }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Tidak ada produk non-coffee.</p>
        @endif
    </div>
@endsection