<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KeranjangController; 



// Halaman Home-
Route::get('/', function () {
    return view('home');
});

// Produk (admin) - hanya bisa diakses kalau sudah login
Route::resource('produk', ProdukController::class)->middleware('auth');
  
// Kategori produk
Route::get('/produk/coffee', [ProdukController::class, 'coffee'])->name('produk.coffee');
Route::get('/produk/non-coffee', [ProdukController::class, 'nonCoffee'])->name('produk.non_coffee');
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'kategori'])->name('produk.kategori');

// Halaman statis
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni');

Route::get('/promo', function () {
    return view('promo');
})->name('promo');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// Halaman Menu untuk Customer (Pemesanan)
Route::get('/menu', [PemesananController::class, 'index'])->name('menu');

// Tambah ke Keranjang
Route::post('/keranjang/tambah', [PemesananController::class, 'tambahKeKeranjang'])->name('keranjang.tambah');

// Tampilkan halaman checkout
Route::get('/checkout', [PemesananController::class, 'checkout'])->name('checkout');

// Proses checkout
Route::post('/checkout', [PemesananController::class, 'prosesCheckout'])->name('checkout.proses');

// Halaman Review pesanan (sebelum checkout final)
Route::get('/review', [CheckoutController::class, 'review'])->name('checkout.review');

// Login & Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Transaksi (HANYA satu POST route)
Route::post('/transaksi/store', [TransaksiController::class, 'bayar'])->name('transaksi.store');
Route::get('/checkout/struk/{id}', [TransaksiController::class, 'struk'])->name('checkout.struk');

Route::get('/transaksi/store', function () {
    return redirect()->route('checkout')->with('error', 'Akses tidak diperbolehkan langsung.');
});
Route::delete('/keranjang/{index}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
Route::put('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::get('/riwayat', [TransaksiController::class, 'riwayat'])->name('riwayat');
Route::get('/keranjang/clear', function () {
    session()->forget('keranjang');
    return redirect('/menu')->with('success', 'Keranjang dikosongkan.');
});
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);