@extends('layouts.app')

@section('content')
    <h2>Edit Produk</h2>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ $produk->harga }}" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@push('scripts')
<script>
    // Fungsi formatting angka ribuan (saat input)
    function formatRupiah(angka) {
        return angka.replace(/\D/g, '')
                    .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const hargaInput = document.querySelector('input[name="harga"]');
        const form = hargaInput.closest('form');

        // Format saat mengetik
        hargaInput.addEventListener('input', function () {
            this.value = formatRupiah(this.value);
        });

        // Hapus titik sebelum submit
        form.addEventListener('submit', function () {
            hargaInput.value = hargaInput.value.replace(/\./g, '');
        });
    });
</script>
@endpush