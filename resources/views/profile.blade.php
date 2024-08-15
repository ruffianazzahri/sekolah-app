@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('contents')
<div class="text-center  mt-3">
    <h3 class="fw-bold"><i class="fa fa-user" style="color: green"></i> User Management</h3>
</div>
<hr />
<!-- Tampilkan pesan sukses jika ada -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h3 class="lead">Change Information</h3>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin/update') }}">
    @csrf
    @method('PUT')
    <!-- Gunakan PUT untuk update -->

    <div class="mb-3">
        <label for="name" class="form-label">Name<span style="color:red">*</span></label>
        <input name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" id="name" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email<span style="color:red">*</span></label>
        <input name="email" type="email" value="{{ auth()->user()->email }}" class="form-control" id="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password"
            placeholder="Leave blank if not changing">
    </div>
    <h6 style="color:red">*<span style="color: black;"> Must be filled</span></h6>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i> Save</button>
    </div>
</form>


@endsection