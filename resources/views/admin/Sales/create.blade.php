<x-app-admin>

<form action="{{ route('sales.store') }}"
method="POST">

@csrf

<input
type="date"
name="sale_date"
class="form-control mb-2">

<select
name="customer_id"
class="form-control mb-3">

@foreach($customers as $c)

<option value="{{ $c->id }}">
{{ $c->nama }}
</option>

@endforeach

</select>

<h5>Item Barang</h5>

@foreach($products as $product)

<div class="row mb-2">

<div class="col-md-6">

<input
type="checkbox"
name="product_id[]"
value="{{ $product->id }}">

{{ $product->nama_barang }}

(Stok : {{ $product->stok }})

</div>

<div class="col-md-3">

<input
type="number"
name="qty[]"
class="form-control"
placeholder="Qty">

</div>

</div>

@endforeach

<button
class="btn btn-success">

Simpan

</button>

</form>

</x-app-admin>