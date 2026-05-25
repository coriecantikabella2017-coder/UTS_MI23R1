<!DOCTYPE html>
<html>
<head>
    <title>Data Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1>Data Products</h1>

    <a href="{{ route('products.create') }}"
       class="btn btn-primary mb-3">

        Tambah Product

    </a>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        @foreach($products as $product)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $product->kode_barang }}</td>

            <td>{{ $product->nama_barang }}</td>

            <td>{{ $product->satuan }}</td>

            <td>{{ $product->harga }}</td>

            <td>

                <a href="{{ route('products.edit', $product->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('products.destroy', $product->id) }}"
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

    </table>

</div>

</body>
</html>