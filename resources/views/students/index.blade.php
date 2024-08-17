@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('contents')
<div>

    <div class="d-flex justify-content-between">
        <h3 class="fw-bold"><i class="fa fa-users" style="color: green;"></i> Daftar Siswa</h3>
        <div>
            <button class="btn btn-success mb-2 me-2" id="cmd"><i class="fa fa-download"></i> Generate PDF</button>
            <a href="{{ route('admin/students/create') }}" class="btn btn-primary mb-2 me-2"><i class="fa fa-plus"></i>
                Tambah Siswa</a>
        </div>


    </div>

    <hr />
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-check"></i> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-check"></i> {{ Session::get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-striped">
        <thead class="table-dark" id="content1">
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
        <tbody id="content2">
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
    doc.fromHTML($('#content2').html(), 15, 50, {
        'width': 700,
        'elementHandlers': specialElementHandlers
    });
    doc.save('daftar-siswa.pdf');
});
</script>

@endsection