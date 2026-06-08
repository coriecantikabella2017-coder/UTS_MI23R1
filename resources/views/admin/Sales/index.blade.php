<x-app-admin>

<h3>Data Penjualan</h3>

<a href="{{ route('sales.create') }}"
class="btn btn-primary mb-3">

Tambah Transaksi

</a>

<table class="table table-bordered">

<tr>
<th>Invoice</th>
<th>Tanggal</th>
<th>Customer</th>
<th>Total</th>
<th>Aksi</th>
</tr>

@foreach($sales as $sale)

<tr>

<td>{{ $sale->kode }}</td>

<td>{{ $sale->sale_date }}</td>

<td>{{ $sale->customer->nama }}</td>

<td>{{ number_format($sale->total_amount) }}</td>

<td>

<a href="{{ route('sales.show',$sale->id) }}"
class="btn btn-info btn-sm">

Detail

</a>

<form
action="{{ route('sales.destroy',$sale->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm">

Hapus

</button>

</form>

</td>

</tr>

@endforeach

</table>

</x-app-admin>