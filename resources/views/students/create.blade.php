@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('contents')
<h1 class="fw-bold fs-2 ms-3">Tambah Siswa</h1>
<hr />
<div class="pb-4">
    <form action="{{ route('admin/students/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama siswa">
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <input id="class" name="class" type="text" class="form-control" placeholder="Masukkan kelas siswa">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input id="age" name="age" type="number" class="form-control" placeholder="Masukkan usia siswa">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="Masukkan deskripsi siswa"></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="accepted">Diterima</option>
                <option value="rejected">Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection