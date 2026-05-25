<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // TAMPILKAN DATA
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.products.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        Product::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil dihapus');
    }
}