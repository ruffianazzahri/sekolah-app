@extends('layouts.app')

@section('title', 'Pengaturan Profil')

@section('contents')
<div class="text-center  mt-3">
    <h1><i class="fa fa-user" style="color: green"></i> User Management</h1>
</div>
<hr />
<h3 class="lead">Change Information</h3>
<form method="POST" enctype="multipart/form-data" action="">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name" type="text" value="{{ auth()->user()->name }}" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" value="{{ auth()->user()->email }}" class="form-control" id="email">
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i>
            Save</button>
    </div>
</form>

@endsection