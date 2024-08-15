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
                <th scope="col">Nomor</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Usia</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($students->count() > 0)
            @foreach($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->description }}</td>
                <td>
                    @if($student->status == 'accepted')
                    <span class="badge bg-success">
                        <i class="fas fa-check-circle"></i> Diterima
                    </span>
                    @elseif($student->status == 'rejected')
                    <span class="badge bg-danger">
                        <i class="fas fa-times-circle"></i> Ditolak
                    </span>
                    @elseif($student->status == 'pending')
                    <span class="badge bg-warning text-dark">
                        <i class="fas fa-hourglass-half"></i> Sedang Dipertimbangkan
                    </span>
                    @endif
                </td>
                <td class="w-25">
                    <a href="{{ route('admin/students/show', $student->id) }}" class="text-primary">Detail</a>
                    <a href="{{ route('admin/students/edit', $student->id) }}" class="text-success">Edit</a>
                    <form action="{{ route('admin/students/destroy', $student->id) }}" method="POST"
                        onsubmit="return confirm('Hapus siswa ini?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0 m-0">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="7">Siswa tidak ditemukan</td>
            </tr>
            @endif
        </tbody>
    </table>

</div>


@endsection