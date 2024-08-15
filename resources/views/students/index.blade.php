// resources/views/students/index.blade.php
@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('contents')
<div>
    <div class="d-flex justify-content-between">
        <h1 class="fw-bold fs-2 ms-3">Daftar Siswa</h1>
        <a href="{{ route('admin/students/create') }}" class="btn btn-primary float-end mb-2 me-2">Tambah Siswa</a>
    </div>

    <hr />
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Usia</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection