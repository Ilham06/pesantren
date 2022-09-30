@extends('layouts.home')

@section('content')
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="text-primary m-0">PesanTren</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="/#about" class="nav-item nav-link active">Tentang Kami</a>
                    <a href="/#activity" class="nav-item nav-link">Kegiatan</a>
                    <a href="/#blog" class="nav-item nav-link">Artikel</a>
                </div>
                <a href="{{ route('form') }}" class="btn btn-primary py-2 px-4">Daftar</a>
            </div>
        </nav>
        <div class="container-fluid py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Kegiatan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Kegiatan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="my-5 activity-page">
        <div class="container">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="mb-3">Kegiatan {{ $data->name }}</h5> 

                    {!! $data->description !!}

                    <div class="images mt-3">
                        <h5 class="mb-4">Foto Kegiatan :</h5>
                        @foreach ($data->images as $image)
                            <div class="col-lg-3">
                                <img width="100%" src="/storage/image/activity/{{ $image->url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
