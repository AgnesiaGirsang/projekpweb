<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function destroy($index)
{
    if (request()->method() !== 'DELETE') {
        abort(405, 'Metode tidak diizinkan.');
    }

    $keranjang = session()->get('keranjang', []);

    if (isset($keranjang[$index])) {
        unset($keranjang[$index]);
        session()->put('keranjang', $keranjang);
    }

    return redirect()->route('checkout')->with('success', 'Produk berhasil dihapus dari keranjang.');
}
public function update(Request $request, $id)
{
    $request->validate([
        'jumlah' => 'required|integer|min:1'
    ]);

    $item = Keranjang::findOrFail($id);
    $item->jumlah = $request->jumlah;
    $item->save();

    return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui.');
}


}