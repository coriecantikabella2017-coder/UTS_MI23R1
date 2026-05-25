@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Data Produk</h1>

    <a href="/products/create" class="btn btn-primary mb-3">
        + Tambah Produk
    </a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->harga }}</td>

                <td>

        <a href="/products/{{ $item->id }}/edit"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="/products/{{ $item->id }}"
              method="POST"
              style="display:inline;">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm">
                Hapus
            </button>

        </form>

    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection