@extends('layouts.app')

@section('title', 'Edit Aktivitas')

@section('contents')
<div class="text-center">
    <h1 class="mb-0">Edit Aktivitas - {{ $activity->description }}</h1>
</div>

<hr />
<div class="pb-4">
    <form id="edit-activity-form" action="{{ route('admin/activity/update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <select name="day" id="day" class="form-select">
                <option value="" disabled>Pilih hari</option>
                <option value="Senin" {{ $activity->day == 'Senin' ? 'selected' : '' }}>Senin</option>
                <option value="Selasa" {{ $activity->day == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                <option value="Rabu" {{ $activity->day == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                <option value="Kamis" {{ $activity->day == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                <option value="Jumat" {{ $activity->day == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                <option value="Sabtu" {{ $activity->day == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                <option value="Minggu" {{ $activity->day == 'Minggu' ? 'selected' : '' }}>Minggu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="time_start" class="form-label">Waktu Mulai</label>
            <input type="time" name="time_start" id="time_start" class="form-control"
                value="{{ $activity->time_start }}">
        </div>

        <div class="mb-3">
            <label for="time_end" class="form-label">Waktu Selesai</label>
            <input type="time" name="time_end" id="time_end" class="form-control" value="{{ $activity->time_end }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Aktivitas</label>
            <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="Masukkan deskripsi aktivitas">{{ $activity->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="mentor" class="form-label">Pembimbing</label>
            <input type="text" name="mentor" id="mentor" class="form-control" placeholder="Masukkan nama pembimbing"
                value="{{ $activity->mentor }}">
        </div>

        <input type="hidden" name="inputted_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="inputted_email" value="{{ Auth::user()->email }}">

        <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-check"></i> Ubah Data</button>
    </form>

    <script>
    document.getElementById('edit-activity-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var day = document.getElementById('day').value.trim();
        var time_start = document.getElementById('time_start').value.trim();
        var time_end = document.getElementById('time_end').value.trim();
        var description = document.getElementById('description').value.trim();
        var mentor = document.getElementById('mentor').value.trim();

        if (!day || !time_start || !time_end || !description || !mentor) {
            Swal.fire({
                title: 'Peringatan',
                text: 'Pastikan semua data telah diisi dengan benar!',
                icon: 'warning',
                confirmButtonText: 'Oke',
            });
        } else {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin data yang Anda masukkan sudah benar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim',
                cancelButtonText: 'Tidak, Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    });
    </script>

</div>
@endsection