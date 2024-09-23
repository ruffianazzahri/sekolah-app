@extends('layouts.app')

@section('title', 'SIGMA Dashboard')

@section('contents')
<div class="text-center">
    <h1 class="fw-bold">Dashboard</h1>
    <h3>Welcome, {{ session('userName', Auth::user()->name) }}!</h3>
</div>

<!-- Chart Container -->
<div class="container mt-5">
    <h4>Daftar Calon Peserta</h4>
    <div class="row">
        <div class="col-4">
        <canvas id="statusChart" width="400" height="200"></canvas>
        </div>
        <div class="col-4">

        </div>
    </div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>

@endsection
