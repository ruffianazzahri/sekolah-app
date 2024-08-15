@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('contents')
<div>

    <div class="d-flex justify-content-between">
        <h1 class="fw-bold fs-2 ms-3"><i class="fa fa-users" style="color: green;"></i> Daftar Siswa</h1>
        <a href="{{ route('admin/students/create') }}" class="btn btn-primary float-end mb-2 me-2"><i
                class="fa fa-plus"></i> Tambah Siswa</a>
    </div>

    <hr />
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-check"></i> {{ Session::get('success') }}
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
                <th scope="col">Alasan ingin mengikuti ekskul</th>
                <th scope="col">Status Pertimbangan</th>
                <th scope="col">Deskripsi/Alasan Pertimbangan</th>

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
                <td>{{ $student->reason}}</td>
                <td>

                    <a href="{{ route('admin/students/show', $student->id) }}" class="btn btn-primary btn-sm"
                        title="Detail">
                        <i class="fa fa-eye"></i>
                    </a>


                    <a href="{{ route('admin/students/edit', $student->id) }}" class="btn btn-success btn-sm"
                        title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="{{ route('admin/students/destroy', $student->id) }}" class="btn btn-danger btn-sm"
                        title="Hapus" onclick="event.preventDefault();
            if(confirm('Hapus siswa ini?')) {
                document.getElementById('delete-form-{{ $student->id }}').submit();
            }">
                        <i class="fa fa-trash"></i>
                    </a>


                    <form id="delete-form-{{ $student->id }}"
                        action="{{ route('admin/students/destroy', $student->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
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
