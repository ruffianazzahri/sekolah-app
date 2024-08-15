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
            <select id="class" name="class" class="form-select">
                <option value="X MIPA 1">X MIPA 1</option>
                <option value="X MIPA 2">X MIPA 2</option>
                <option value="X MIPA 3">X MIPA 3</option>
                <option value="X MIPS 1">X MIPS 1</option>
                <option value="X MIPS 2">X MIPS 2</option>
                <option value="X MIPS 3">X MIPS 3</option>
                <option value="XI MIPA 1">XI MIPA 1</option>
                <option value="XI MIPA 2">XI MIPA 2</option>
                <option value="XI MIPA 3">XI MIPA 3</option>
                <option value="XI MIPS 1">XI MIPS 1</option>
                <option value="XI MIPS 2">XI MIPS 2</option>
                <option value="XI MIPS 3">XI MIPS 3</option>
                <option value="XII MIPA 1">XII MIPA 1</option>
                <option value="XII MIPA 2">XII MIPA 2</option>
                <option value="XII MIPA 3">XII MIPA 3</option>
                <option value="XII MIPS 1">XII MIPS 1</option>
                <option value="XII MIPS 2">XII MIPS 2</option>
                <option value="XII MIPS 3">XII MIPS 3</option>
            </select>
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
