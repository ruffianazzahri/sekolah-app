@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('contents')
<h1 class="fw-bold fs-2 ms-3">Detail Siswa - {{ $students->name }}</h1>

<hr />
<div class="pb-4">
    <div class="mb-3">
        <label class="form-label fw-semibold">Nama</label>
        <div class="form-control-plaintext">
            {{ $students->name }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Kelas</label>
        <div class="form-control-plaintext">
            {{ $students->class }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Usia</label>
        <div class="form-control-plaintext">
            {{ $students->age }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi</label>
        <div class="form-control-plaintext">
            {{ $students->description }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Status</label>
        <div class="form-control-plaintext">
            @if($students->status == 'accepted')
            <span class="badge bg-success">
                <i class="fas fa-check-circle"></i> Diterima
            </span>
            @elseif($students->status == 'rejected')
            <span class="badge bg-danger">
                <i class="fas fa-times-circle"></i> Ditolak
            </span>
            @elseif($students->status == 'pending')
            <span class="badge bg-warning text-dark">
                <i class="fas fa-hourglass-half"></i> Sedang Dipertimbangkan
            </span>
            @endif
        </div>
    </div>
</div>
@endsection