<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;

class TransaksiController extends Controller
{
    public function bayar(Request $request)
    {
        $keranjang = session('keranjang', []);

        if (empty($keranjang)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($keranjang as $item) {
            $total += $item['harga'] * $item['jumlah'];
        }

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'total' => $total,
        ]);
        foreach ($keranjang as $item) {
            if (!isset($item['id'])) {
                continue; // atau bisa throw new \Exception("Produk ID tidak ditemukan");
            }
        
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $item['id'],
                'jumlah' => $item['jumlah'],
                'harga' => $item['harga'],
                'subtotal' => $item['harga'] * $item['jumlah'],
            ]);
        }
        

        // Kosongkan keranjang setelah transaksi
        session()->forget('keranjang');

        return redirect()->route('checkout.struk', $transaksi->id);
    }

    public function struk($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);
        return view('checkout.struk', compact('transaksi'));
    }
    public function riwayat()
    {
        $transaksis = Transaksi::with('detailTransaksis.produk')
                    ->where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('riwayat.index', compact('transaksis'));
}

}