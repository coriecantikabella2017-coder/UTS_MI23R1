<x-app-admin>

<h3>Data Customer</h3>

<a href="{{ route('customers.create') }}"
class="btn btn-primary mb-3">
Tambah
</a>

<table class="table table-bordered">

<tr>
<th>Kode</th>
<th>Nama</th>
<th>Telepon</th>
<th>Email</th>
<th>Aksi</th>
</tr>

@foreach($customers as $item)

<tr>

<td>{{ $item->kode }}</td>
<td>{{ $item->nama }}</td>
<td>{{ $item->telepon }}</td>
<td>{{ $item->email }}</td>

<td>

<a href="{{ route('customers.edit',$item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form
action="{{ route('customers.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</table>

</x-app-admin>