@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="/products" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection