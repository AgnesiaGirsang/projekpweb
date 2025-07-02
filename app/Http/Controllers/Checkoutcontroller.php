<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CheckoutController extends Controller
{
    public function review()
    {
        $produks = Produk::all();
        return view('checkout.review', compact('produks'));
    }

    public function checkout(Request $request)
    {
        $items = $request->input('produk', []);
        $total = 0;
        $detail = [];

        foreach ($items as $id => $qty) {
            if ($qty > 0) {
                $produk = Produk::find($id);
                $subtotal = $produk->harga * $qty;
                $total += $subtotal;
                $detail[] = [
                    'produk' => $produk,
                    'qty' => $qty,
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('checkout.kasir', compact('detail', 'total'));
    }
    public function struk($id)
{
    $transaksi = Transaksi::with('detailTransaksis.produk')->find($id);
    return view('checkout.struk', compact('transaksi'));
}
}