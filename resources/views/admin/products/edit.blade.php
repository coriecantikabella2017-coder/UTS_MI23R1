<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Kode Barang</label>

            <input type="text"
                   name="kode_barang"
                   value="{{ $product->kode_barang }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Barang</label>

            <input type="text"
                   name="nama_barang"
                   value="{{ $product->nama_barang }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Satuan</label>

            <input type="text"
                   name="satuan"
                   value="{{ $product->satuan }}"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Harga</label>

            <input type="number"
                   name="harga"
                   value="{{ $product->harga }}"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>
</html>