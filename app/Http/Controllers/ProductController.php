<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        Product::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'satuan' => $request->satuan,
        'harga' => $request->harga,
    ]);

        return redirect('/products');
    }
    public function edit($id)
    {
        return view('products.edit');
    }
    public function update(Request $request, $id)
    {
        return redirect('/products');
    }
    public function destroy($id)
    {
        return redirect('/products');
    }
}