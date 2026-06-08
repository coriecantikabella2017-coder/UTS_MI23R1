<x-app-admin>

<form action="{{ route('categories.update',$category->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Nama</label>

<input type="text"
name="nama"
value="{{ $category->nama }}"
class="form-control">

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control">{{ $category->deskripsi }}</textarea>

</div>

<button class="btn btn-primary">
Update
</button>

</form>

</x-app-admin>