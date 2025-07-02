@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h2 class="card-title mb-4">Tambah Produk Baru</h2>

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="coffee">Coffee Series</option>
                    <option value="non-coffee">Non-Coffee Series</option>
                    <option value="roti">Roti Series</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="text" id="harga" name="harga" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" name="stok" class="form-control" min="0" value="0" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Fungsi formatting angka ribuan
    function formatRupiah(angka) {
        return angka.replace(/\D/g, '') // hapus semua non-digit
                    .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const hargaInput = document.querySelector('input[name="harga"]');

        hargaInput.addEventListener('input', function () {
            this.value = formatRupiah(this.value);
        });
    });
</script>
@endpush