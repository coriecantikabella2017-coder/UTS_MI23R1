<x-app-admin>

<h4>Invoice :
{{ $sale->kode }}</h4>

<h5>
Customer :
{{ $sale->customer->nama }}
</h5>

<table class="table table-bordered">

<tr>
<th>Barang</th>
<th>Qty</th>
<th>Harga</th>
<th>Subtotal</th>
</tr>

@foreach($sale->items as $item)

<tr>

<td>
{{ $item->product->nama_barang }}
</td>

<td>
{{ $item->qty }}
</td>

<td>
{{ number_format($item->price) }}
</td>

<td>
{{ number_format($item->subtotal) }}
</td>

</tr>

@endforeach

</table>

<h4>
Total :
Rp {{ number_format($sale->total_amount) }}
</h4>

</x-app-admin>