<x-app-admin>

<form action="{{ route('customers.update',$customer->id) }}"
method="POST">

@csrf
@method('PUT')

<input
name="kode"
value="{{ $customer->kode }}"
class="form-control mb-2">

<input
name="nama"
value="{{ $customer->nama }}"
class="form-control mb-2">

<textarea
name="alamat"
class="form-control mb-2">{{ $customer->alamat }}</textarea>

<input
name="telepon"
value="{{ $customer->telepon }}"
class="form-control mb-2">

<input
name="email"
value="{{ $customer->email }}"
class="form-control mb-2">

<button class="btn btn-primary">
Update
</button>

</form>

</x-app-admin>