@extends('layouts.user')

@section('title', 'Home')

@section('contents')
<div id="carouselExampleCaptions" class="carousel slide mt-5 mb-5">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/entepreneur1.jpg') }}" class="img-fluid  w-100 h-100" alt="1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to Sigma Academy</h5>
                <p>Sigma Academy adalah ekstrakulikuler yang mengajarkan bisnis, wirausaha dan investasi dengan tujuan
                    meningkatkan mental ekonomi maju untuk siswa SMA Negeri 100 agar berkontribusi luar biasa untuk
                    negeri dalam sektor perekonomian. </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/entepreneur2.jpg') }}" class="img-fluid  w-100 h-100" alt="1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tahukah anda</h5>
                <p>Dikutip dari <a
                        href="https://money.kompas.com/read/2023/09/05/140056826/apa-itu-wirausaha-pengertian-tujuan-karakteristik-dan-contohnya?page=all">Kompas,
                    </a> Wirausaha adalah salah satu faktor yang mampu mendorong
                    perekonomian negara. Kegiatan wirausaha dinilai dapat membantu pemerintah dalam mengurangi angka
                    pengangguran melalui pembukaan lapangan kerja. </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/entepreneur3.jpg') }}" class="img-fluid w-100 h-100" alt="1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Selamat!</h5>
                <p>Sigma Academy menjadi salah satu organisasi terbaik di SMA Negeri 100!</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


@endsection
