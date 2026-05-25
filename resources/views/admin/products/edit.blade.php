@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Edit Produk</h1>

    <form action="{{ route('products.update', 1) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" value="BRG001">
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="Laptop">
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" value="Unit">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="7000000">
        </div>

        <button type="submit" class="btn btn-warning">
            Update
        </button>

        <a href="/products" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection