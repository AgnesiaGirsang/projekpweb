<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        // Hilangkan titik ribuan sebelum validasi
        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
        ]);
    
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'stok' => 'required|numeric',
            'kategori' => 'required|in:coffee,non-coffee,roti',
            'gambar' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $request->merge(['gambar' => $filename]);
        }
    
        Produk::create($request->all());
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        // Hilangkan titik ribuan sebelum validasi
        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
        ]);
    
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'stok' => 'required|numeric',
            'kategori' => 'required|in:coffee,non-coffee,roti',
            'gambar' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $request->merge(['gambar' => $filename]);
        }
    
        $produk->update($request->all());
    
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }    

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function coffee()
    {
        $produks = Produk::where('kategori', 'coffee')->get();
        return view('produk.index', compact('produks'));
    }

    public function nonCoffee()
    {
        $produks = Produk::where('kategori', 'non-coffee')->get();
        return view('produk.index', compact('produks'));
    }

    public function kategori($kategori)
    {
        if (!in_array($kategori, ['coffee', 'non-coffee', 'roti'])) {
            abort(404);
        }

        $produks = Produk::where('kategori', $kategori)->get();
        return view('produk.index', compact('produks', 'kategori'));
    }

    // ✅ Tambahan method menu untuk halaman /menu
    public function menu()
    {
        $produks = Produk::all();
        return view('menu', compact('produks'));
    }
}