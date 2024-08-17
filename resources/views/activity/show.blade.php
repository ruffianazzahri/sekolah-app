@extends('layouts.app')

@section('title', 'Detail Aktivitas')

@section('contents')
<h1 class="fw-bold fs-2 ms-3">Detail Aktivitas - {{ $activity->description }}</h1>

<hr />
<div class="pb-4">
    <div class="mb-3">
        <label class="form-label fw-semibold">Hari</label>
        <div class="form-control-plaintext">
            {{ $activity->day }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Waktu Mulai</label>
        <div class="form-control-plaintext">
            {{ \Carbon\Carbon::parse($activity->time_start)->format('h:i A') }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Waktu Selesai</label>
        <div class="form-control-plaintext">
            {{ \Carbon\Carbon::parse($activity->time_end)->format('h:i A') }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Deskripsi Aktivitas</label>
        <div class="form-control-plaintext">
            {{ $activity->description }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Pembimbing</label>
        <div class="form-control-plaintext">
            {{ $activity->mentor }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Inputted ID</label>
        <div class="form-control-plaintext">
            {{ $activity->inputted_id }}
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Inputted Email</label>
        <div class="form-control-plaintext">
            {{ $activity->inputted_email }}
        </div>
    </div>
</div>
@endsection