@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('contents')
<div class="text-center">
    <h1 class="fw-bold fs-2 ms-3"><i class="fa fa-plus" style="color: green;"></i> Tambah Siswa</h1>
</div>

<hr />
<div class="pb-4">
    <form id="student-form" action="{{ route('admin/students/store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="description" class="form-label">Alasan ingin mengikuti ekskul</label>
            <textarea name="description" id="description" rows="3" class="form-control"
                placeholder="Contoh : Ingin menjadi seorang businessman"></textarea>
        </div>

        <div class="mb-3 d-none">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pending" selected>Sedang Dipertimbangkan</option>
                <option value="accepted">Diterima</option>
                <option value="rejected">Ditolak</option>
            </select>
        </div>

        <div class="mb-3 d-none">
            <label for="reason" class="form-label">Alasan</label>
            <input type="text" name="reason" id="reason" class="form-control"
                placeholder="Masukkan alasan siswa mengikuti ini" value="N/A">
        </div>
        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Tambahkan Data Baru</button>
    </form>

    <script>
    document.getElementById('student-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var name = document.getElementById('name').value.trim();
        var classValue = document.getElementById('class').value;
        var age = document.getElementById('age').value.trim();
        var description = document.getElementById('description').value.trim();

        if (!name || !classValue || !age || !description) {
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
