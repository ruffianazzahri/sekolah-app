@extends('layouts.app')

@section('title', 'Daftar Aktivitas')

@section('contents')
<div>

    <div class="d-flex justify-content-between">
        <h3 class="fw-bold"><i class="fa fa-users" style="color: green;"></i> Daftar Aktivitas</h3>
        <div>
            <button class="btn btn-success mb-2 me-2" id="cmd"><i class="fa fa-download"></i> Cetak PDF</button>
            <a href="{{ route('admin/activity/create') }}" class="btn btn-primary mb-2 me-2"><i class="fa fa-plus"></i>
                Tambah Aktivitas</a>
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
                <th scope="col">Hari</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col" class="w-25">Deskripsi</th>
                <th scope="col">Mentor</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="content2">
            @if($activity->count() > 0)
            @foreach($activity as $activity)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $activity->day }}</td>
                <td>{{ date('h:i A', strtotime($activity->time_start)) }}</td>
                <td>{{ date('h:i A', strtotime($activity->time_end)) }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->mentor }}</td>
                <td>

                    <a href="{{ route('admin/activity/show', $activity->id) }}" class="btn btn-primary btn-sm"
                        title="Detail">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin/activity/edit', $activity->id) }}" class="btn btn-success btn-sm"
                        title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="{{ route('admin/activity/destroy', $activity->id) }}" class="btn btn-danger btn-sm"
                        title="Hapus" onclick="event.preventDefault();
            if(confirm('Hapus aktivitas ini?')) {
                document.getElementById('delete-form-{{ $activity->id }}').submit();
            }">
                        <i class="fa fa-trash"></i>
                    </a>

                    <form id="delete-form-{{ $activity->id }}"
                        action="{{ route('admin/activity/destroy', $activity->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="6">Aktivitas tidak ditemukan</td>
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
    doc.save('daftar-aktivitas.pdf');
});
</script>

@endsection
