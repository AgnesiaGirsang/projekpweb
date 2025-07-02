@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Detail Checkout</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
            <tr>
                <td>{{ $item['produk']->nama_produk }}</td>
                <td>Rp{{ number_format($item['produk']->harga, 0, ',', '.') }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Total: Rp{{ number_format($total, 0, ',', '.') }}</h4>
</div>
@endsection