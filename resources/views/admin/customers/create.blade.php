<x-app-admin>

<form action="{{ route('customers.store') }}"
method="POST">

@csrf

<input name="kode" class="form-control mb-2" placeholder="Kode">

<input name="nama" class="form-control mb-2" placeholder="Nama">

<textarea name="alamat"
class="form-control mb-2"></textarea>

<input name="telepon"
class="form-control mb-2"
placeholder="Telepon">

<input name="email"
class="form-control mb-2"
placeholder="Email">

<button class="btn btn-success">
Simpan
</button>

</form>

</x-app-admin>