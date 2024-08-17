@extends('layouts.app')

@section('title', 'Tambah Aktivitas')

@section('contents')
<div class="text-center">
    <h1 class="fw-bold fs-2 ms-3"><i class="fa fa-plus" style="color: green;"></i> Tambah Aktivitas</h1>
</div>

<hr />
<div class="pb-4">
    <form id="activity-form" action="{{ route('admin/activity/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <select name="day" id="day" class="form-control">
                <option value="" disabled selected>Pilih hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="time_start" class="form-label">Waktu Mulai</label>
            <input type="time" name="time_start" id="time_start" class="form-control">
        </div>

        <div class="mb-3">
            <label for="time_end" class="form-label">Waktu Selesai</label>
            <input type="time" name="time_end" id="time_end" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Aktivitas</label>
            <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="Masukkan deskripsi aktivitas"></textarea>
        </div>

        <div class="mb-3">
            <label for="mentor" class="form-label">Pembimbing</label>
            <input type="text" name="mentor" id="mentor" class="form-control" placeholder="Masukkan nama pembimbing">
        </div>

        <input type="hidden" name="inputted_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="inputted_email" value="{{ Auth::user()->email }}">

        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Tambahkan Data Baru</button>
    </form>

    <script>
    document.getElementById('activity-form').addEventListener('submit', function(event) {
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
