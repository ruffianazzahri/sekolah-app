@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('contents')
<div class="text-center">
    <h1 class="mb-0">Edit Siswa - {{ $students->name }}</h1>
</div>

<hr />
<div class="pb-4">
    <form id="edit-student-form" action="{{ route('admin/students/update', $students->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3 class="lead" style="font-size: 30px">Data yang telah diisi siswa</h3>

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
                <option value="XI MIPA 1" {{ $students->class == 'XI MIPA 1' ? 'selected' : '' }}>XI MIPA 1</option>
                <option value="XI MIPA 2" {{ $students->class == 'XI MIPA 2' ? 'selected' : '' }}>XI MIPA 2</option>
                <option value="XI MIPA 3" {{ $students->class == 'XI MIPA 3' ? 'selected' : '' }}>XI MIPA 3</option>
                <option value="XI MIPS 1" {{ $students->class == 'XI MIPS 1' ? 'selected' : '' }}>XI MIPS 1</option>
                <option value="XI MIPS 2" {{ $students->class == 'XI MIPS 2' ? 'selected' : '' }}>XI MIPS 2</option>
                <option value="XI MIPS 3" {{ $students->class == 'XI MIPS 3' ? 'selected' : '' }}>XI MIPS 3</option>
                <option value="XII MIPA 1" {{ $students->class == 'XII MIPA 1' ? 'selected' : '' }}>XII MIPA 1</option>
                <option value="XII MIPA 2" {{ $students->class == 'XII MIPA 2' ? 'selected' : '' }}>XII MIPA 2</option>
                <option value="XII MIPA 3" {{ $students->class == 'XII MIPA 3' ? 'selected' : '' }}>XII MIPA 3</option>
                <option value="XII MIPS 1" {{ $students->class == 'XII MIPS 1' ? 'selected' : '' }}>XII MIPS 1</option>
                <option value="XII MIPS 2" {{ $students->class == 'XII MIPS 2' ? 'selected' : '' }}>XII MIPS 2</option>
                <option value="XII MIPS 3" {{ $students->class == 'XII MIPS 3' ? 'selected' : '' }}>XII MIPS 3</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input id="age" name="age" type="number" value="{{ $students->age }}" class="form-control"
                placeholder="Masukkan usia siswa" disabled readonly>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Alasan mengikuti ekskul</label>
            <input id="description" name="description" type="text" value="{{ $students->description }}"
                class="form-control" placeholder="Alasan" disabled readonly>
        </div>
        <h3 class="lead mt-3" style="font-size: 30px">Data yang harus diisi admin</h3>
        <div class="alert alert-danger" role="alert">
            <h6 style="color: red; font-weight:bold"><i class="fa fa-warning"></i> PERINGATAN KERAS! </h6>
            <p><span style="color: black; font-weight:normal">Pastikan status dan deskripsi/alasan
                    pertimbangan sesuai hasil keputusan dari ketua ekskul. Jika tidak, admin akan mempertanggungjawabkan
                    data yang diisi.</span></p>
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
            <label for="reason" class="form-label">Deskripsi/Alasan pertimbangan</label>
            <textarea name="reason" id="reason" rows="3" class="form-control"
                placeholder="Masukkan Deskripsi/Alasan pertimbangan (Sesuai hasil keputusan ketua ekskul)"></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-check"></i> Ubah Data</button>
    </form>

</div>
@endsection
