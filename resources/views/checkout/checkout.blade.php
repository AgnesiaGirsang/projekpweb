@extends('layouts.app')

@section('content')
<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #d2b48c;
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
        background-color: rgba(44, 33, 20, 0.75);
        z-index: -1;
    }

    h2 {
        color: #deb887;
        margin-bottom: 30px;
        text-align: center;
        font-weight: 700;
        text-shadow: 1px 1px 4px #4b3b2b;
    }

    .table {
        background-color: rgba(75, 59, 43, 0.85);
        border-radius: 10px;
        box-shadow: 0 0 10px #5a4220;
        color: #f5deb3;
        overflow: hidden;
    }

    .table th, .table td {
        vertical-align: middle;
        border-color: #5a4220;
    }

    .table th {
        background-color: rgba(75, 59, 43, 0.9);
        font-weight: 600;
        text-align: center;
    }

    .table tbody tr:hover {
        background-color: rgba(85, 60, 31, 0.7);
        cursor: default;
    }

    .btn-success {
        background-color: #8b5e3c;
        border-color: #8b5e3c;
        font-weight: 600;
        box-shadow: 0 4px 6px #5a4220;
        width: 100%;
        padding: 12px;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #a6754f;
        border-color: #a6754f;
        box-shadow: 0 6px 10px #7a5230;
    }

    .btn-danger {
        font-size: 14px;
        padding: 5px 10px;
    }

    p {
        text-align: center;
        font-size: 20px;
        color: #d2b48c;
        margin-top: 40px;
        text-shadow: 0 0 5px #331f0e;
    }

    form {
        max-width: 500px;
        margin: 30px auto 0 auto;
    }
</style>

<h2>Checkout</h2>

@if (empty($keranjang) || count($keranjang) == 0)
    <p>Keranjang kosong.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($keranjang as $index => $item)
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td class="text-center">{{ $item['jumlah'] }}</td>
                    <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.destroy', $index) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                    @php $grandTotal += $item['harga'] * $item['jumlah']; @endphp
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end"><strong>Total Bayar</strong></td>
                <td><strong>Rp{{ number_format($grandTotal, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf
        <select name="metode" class="form-control" required>
            <option value="">-- Pilih Metode --</option>
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
        </select>
        <button type="submit" class="btn btn-success mt-3">Konfirmasi & Bayar</button>
    </form>
    
@endif

@endsection