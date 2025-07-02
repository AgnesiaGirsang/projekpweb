<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class PemesananController extends Controller
{
    // Tampilkan halaman menu
    public function index()
    {
        // Ambil semua data produk dari database
        $produks = Produk::all();

        // Kirim ke view 'menu' dengan variabel $produks
        return view('menu', compact('produks'));
    }

    // Tambah produk ke keranjang
    public function tambahKeKeranjang(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $keranjang = session()->get('keranjang', []);
    
        if (isset($keranjang[$produk->id])) {
            $keranjang[$produk->id]['jumlah']++;
        } else {
            $keranjang[$produk->id] = [
                'id' => $produk->id, // 🟢 Tambahkan ini!
                'nama' => $produk->nama_produk,
                'harga' => $produk->harga,
                'jumlah' => 1
            ];
        }
    
        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }
    

    // Tampilkan halaman checkout
    public function checkout()
    {
        $keranjang = session()->get('keranjang', []);
        return view('checkout.checkout', compact('keranjang'));
    }

    // Proses checkout
    public function prosesCheckout(Request $request)
    {
        session()->forget('keranjang');
        return redirect('/menu')->with('success', 'Pesanan berhasil diproses!');
    }
}