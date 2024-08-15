@extends('layouts.app')

@section('title', 'SIGMA
register')

@section('contents')
<div class="text-center">
    <h1 class="fw-bold">Dashboard</h1>
    <h3>Welcome, {{ session('userName', Auth::user()->name) }}!</h3>
</div>

@endsection
