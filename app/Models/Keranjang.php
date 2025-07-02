<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    // Jika nama tabel di database bukan 'keranjangs', ganti dengan nama tabel yang benar
    protected $table = 'keranjang'; // Contoh, sesuaikan dengan nama tabelmu

    protected $fillable = [
        'user_id',
        'produk_id',
        'jumlah',
    ];

    // Relasi ke model Produk (asumsi sudah ada model Produk)
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}