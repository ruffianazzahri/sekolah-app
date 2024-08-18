@extends('layouts.user')

@section('title', 'Daftar Siswa')

@section('contents')
<div>

    <div class="text-center mt-3">
        <h3 class="fw-bold"><i class="fa fa-users" style="color: green;"></i> Daftar Siswa</h3>
    </div>

    <hr />

    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-check"></i> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="alert alert-primary" role="alert">
        <h3><i class="fa-solid fa-circle-info"></i> PERHATIAN</h3>
        <p>Silahkan lihat nama anda disini</p>
        <p>Jika anda <span class="badge bg-success"><i class="fas fa-check-circle"></i> Diterima</span>, mohon
            konfirmasi ke Admin melalui <a target="_blank" href="https://wa.link/u45czf" class="btn btn-success"><i
                    class="fa-solid fa-phone"></i> Whatsapp </a></p>
    </div>

    <table id="students-table" class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Usia</th>
                <th scope="col">Alasan ingin mengikuti ekskul</th>
                <th scope="col">Status Pertimbangan</th>
                <th scope="col">Deskripsi/Alasan Pertimbangan</th>
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
                <td>{{ $student->reason }}</td>
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