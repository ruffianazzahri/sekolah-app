@extends('layouts.user')

@section('title', 'Tambah Siswa')

@section('contents')
<div class="text-center">
    <h1 class="fw-bold fs-2 ms-3"><i class="fa fa-plus" style="color: green;"></i> Tambah Siswa</h1>
</div>

<hr />

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning" role="alert">
    {{ session('warning') }}
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger" role="alert">
    {{ session('danger') }}
</div>
@endif

<div class="pb-4">
    <form id="student-form" action="{{ route('storestudent') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama siswa"
                value="{{ auth()->user()->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <select id="class" name="class" class="form-select" {{ $existingStudentData ? 'disabled' : '' }}>
                <option value="X MIPA 1"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPA 1' ? 'selected' : '' }}>X MIPA 1
                </option>
                <option value="X MIPA 2"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPA 2' ? 'selected' : '' }}>X MIPA 2
                </option>
                <option value="X MIPA 3"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPA 3' ? 'selected' : '' }}>X MIPA 3
                </option>
                <option value="X MIPS 1"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPS 1' ? 'selected' : '' }}>X MIPS 1
                </option>
                <option value="X MIPS 2"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPS 2' ? 'selected' : '' }}>X MIPS 2
                </option>
                <option value="X MIPS 3"
                    {{ $existingStudentData && $existingStudentData->class == 'X MIPS 3' ? 'selected' : '' }}>X MIPS 3
                </option>
                <option value="XI MIPA 1"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPA 1' ? 'selected' : '' }}>XI MIPA 1
                </option>
                <option value="XI MIPA 2"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPA 2' ? 'selected' : '' }}>XI MIPA 2
                </option>
                <option value="XI MIPA 3"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPA 3' ? 'selected' : '' }}>XI MIPA 3
                </option>
                <option value="XI MIPS 1"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPS 1' ? 'selected' : '' }}>XI MIPS 1
                </option>
                <option value="XI MIPS 2"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPS 2' ? 'selected' : '' }}>XI MIPS 2
                </option>
                <option value="XI MIPS 3"
                    {{ $existingStudentData && $existingStudentData->class == 'XI MIPS 3' ? 'selected' : '' }}>XI MIPS 3
                </option>
                <option value="XII MIPA 1"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPA 1' ? 'selected' : '' }}>XII MIPA
                    1</option>
                <option value="XII MIPA 2"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPA 2' ? 'selected' : '' }}>XII MIPA
                    2</option>
                <option value="XII MIPA 3"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPA 3' ? 'selected' : '' }}>XII MIPA
                    3</option>
                <option value="XII MIPS 1"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPS 1' ? 'selected' : '' }}>XII MIPS
                    1</option>
                <option value="XII MIPS 2"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPS 2' ? 'selected' : '' }}>XII MIPS
                    2</option>
                <option value="XII MIPS 3"
                    {{ $existingStudentData && $existingStudentData->class == 'XII MIPS 3' ? 'selected' : '' }}>XII MIPS
                    3</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input id="age" name="age" type="number" class="form-control" placeholder="Masukkan usia siswa"
                value="{{ $existingStudentData ? $existingStudentData->age : '' }}"
                {{ $existingStudentData ? 'readonly' : '' }}>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Alasan ini mengikuti ekskul</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Contoh : Ingin menjadi seorang businessman"
                value="{{ $existingStudentData ? htmlspecialchars($existingStudentData->description) : '' }}"
                {{ $existingStudentData ? 'readonly' : '' }}>
        </div>


        <div class="mb-3 d-none">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" {{ $existingStudentData ? 'disabled' : '' }}>
                <option value="pending" selected>Sedang Dipertimbangkan</option>
                <option value="accepted">Diterima</option>
                <option value="rejected">Ditolak</option>
            </select>
        </div>

        <div class="mb-3 d-none">
            <label for="reason" class="form-label">Alasan</label>
            <input type="text" name="reason" id="reason" class="form-control"
                placeholder="Masukkan alasan siswa mengikuti ini" value="N/A"
                {{ $existingStudentData ? 'readonly' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary w-100" {{ $existingStudentData ? 'disabled' : '' }}>
            <i class="fa fa-plus"></i> Tambahkan Data Baru
        </button>
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

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script>
var doc = new jsPDF({
    orientation: 'l',

});

doc.setFont("helvetica");
doc.setFontType("bold");
doc.setFontSize(1);
var specialElementHandlers = {
    '#editor': function(element, renderer) {
        return true;
    }
};

$('#cmd').click(function() {
    doc.fromHTML($('#content1').html(), 15, 30, {
        'width': 700,
        'elementHandlers': specialElementHandlers
    });

    doc.save('daftar-siswa.pdf');
});
</script>
@endsection