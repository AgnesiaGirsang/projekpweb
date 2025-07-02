@extends('layouts.struk')

@section('content')
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1650&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .register-card {
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


@section('content')
<div class="container">
    <h2>Struk Pembayaran</h2>
    <p>Tanggal: {{ $transaksi->created_at->format('d M Y H:i') }}</p>
    <p>Nama: {{ auth()->user()->name }}</p>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($transaksi->detailTransaksis as $detail)
    <tr>
        <td>{{ $detail->produk->nama_produk ?? 'Produk tidak ditemukan' }}</td>
        <td>{{ $detail->jumlah }}</td>
        <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
        <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
    </tr>
@endforeach

        </tbody>
    </table>

    <h4>Total: Rp{{ number_format($transaksi->total) }}</h4>

    <button onclick="window.print()" class="btn btn-primary mt-3">Cetak Struk</button>
</div>
@endsection