@extends('layouts.user')

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

<!-- Form Update Profile -->
<form method="POST" enctype="multipart/form-data" action="{{ route('/updatestudentprofile') }}">
    @csrf
    @method('PUT')
    <!-- Gunakan PUT untuk update -->

    <div class="mb-3">
        <label for="name" class="form-label">Name<span style="color:red">*</span></label>
        <input name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" id="name" disabled
            required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email<span style="color:red">*</span></label>
        <input name="email" type="email" value="{{ auth()->user()->email }}" class="form-control" id="email" disabled
            required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password"
            placeholder="Leave blank if not changing" disabled>
    </div>
    <h6 style="color:red">*<span style="color: black;"> Must be filled</span></h6>

    <!-- Tombol Save -->
    <div class="row mt-4" id="saveCancelButtons" style="display: none">
        <div class="col-6">
            <button type="submit" class="btn btn-primary w-100" onclick="save()"><i class="fa-solid fa-floppy-disk"></i>
                Save</button>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-secondary w-100" id="cancelButton" onclick="cancelEditButton()"><i
                    class="fa-solid fa-times"></i>
                Cancel</button>
        </div>


    </div>
</form>

<!-- Tombol Edit Profile -->
<div class="mt-4" id="editButton" style="display:block;">
    <button type="button" class="btn btn-warning w-100" onclick="edit()"><i class="fa-solid fa-pen"></i> Edit
        Profile</button>
</div>


@endsection