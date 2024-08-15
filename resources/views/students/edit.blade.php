@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('contents')
<h1 class="mb-0">Edit Siswa</h1>
<hr />
<div class="pb-4">
    <form action="{{ route('admin/students/update', $students->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" value="{{ $students->name }}" class="form-control"
                placeholder="Masukkan nama siswa" disabled readonly>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <select id="class" name="class" class="form-select" disabled readonly>
                <option value="X MIPA 1" {{ $students->class == 'X MIPA 1' ? 'selected' : '' }}>X MIPA 1</option>
                <option value="X MIPA 2" {{ $students->class == 'X MIPA 2' ? 'selected' : '' }}>X MIPA 2</option>
                <option value="X MIPA 3" {{ $students->class == 'X MIPA 3' ? 'selected' : '' }}>X MIPA 3</option>
                <option value="X MIPS 1" {{ $students->class == 'X MIPS 1' ? 'selected' : '' }}>X MIPS 1</option>
                <option value="X MIPS 2" {{ $students->class == 'X MIPS 2' ? 'selected' : '' }}>X MIPS 2</option>
                <option value="X MIPS 3" {{ $students->class == 'X MIPS 3' ? 'selected' : '' }}>X MIPS 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input id="age" name="age" type="number" value="{{ $students->age }}" class="form-control"
                placeholder="Masukkan usia siswa" disabled readonly>
        </div>


        <div class="mb-3">
            <label for="status" class="form-label">Status pertimbangan</label>
            <select id="status" name="status" class="form-select">
                <option value="pending" {{ $students->status == 'pending' ? 'selected' : '' }}>Sedang Dipertimbangkan
                </option>
                <option value="accepted" {{ $students->status == 'accepted' ? 'selected' : '' }}>Diterima</option>
                <option value="rejected" {{ $students->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi alasan pertimbangan</label>
            <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="Masukkan deskripsi siswa">{{ $students->description }}</textarea>
        </div>


        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>

</div>
@endsection