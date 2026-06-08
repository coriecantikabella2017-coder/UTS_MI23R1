<x-app-admin>

<h3>Data Category</h3>

<a href="{{ route('categories.create') }}"
class="btn btn-primary mb-3">
Tambah
</a>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>Deskripsi</th>
<th>Aksi</th>
</tr>

@foreach($categories as $item)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->nama }}</td>
<td>{{ $item->deskripsi }}</td>
<td>

<a href="{{ route('categories.edit',$item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('categories.destroy',$item->id) }}"
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