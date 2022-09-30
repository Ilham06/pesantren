@extends('layouts.home')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <div class="container">
            <a href="/" class="navbar-brand p-0">
                <h2 class="text-primary m-0">Pesan<span class="text-light">Tren</span></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="#about" class="nav-item nav-link active">Tentang Kami</a>
                    <a href="#activity" class="nav-item nav-link">Kegiatan</a>
                    <a href="#blog" class="nav-item nav-link">Artikel</a>
                </div>
                <a href="{{ route('form') }}" class="btn btn-primary py-2 px-4">Daftar</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-dark py-md-5 hero-header mb-5">
        <div class="container my-5 py-md-5">
            <div class="row justify-content-center align-items-center g-5 py-5 my-3">
                <div class="col-lg-8 py-4 text-center">
                    <h1 class="display-3 text-white animated slideInLeft">{{ $data->name }}</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2 mt-4">Tempor erat elitr rebum at clita. Diam dolor
                        diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem
                        sit clita duo justo magna dolore erat amet</p>
                    <a href="{{ route('form') }}" class="btn btn-primary py-sm-3 py-5 px-sm-5 me-3 animated slideInLeft">Daftar
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- About Start -->
    <div class="about" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-center g-5">
                <div class="col-lg-4">
                    <img class="img-fluid rounded-2 w-100 wow zoomIn" data-wow-delay="0.1s"
                        src="{{ asset('assets/landing-page/images/about-3.jpg') }}">
                </div>
                <div class="col-lg-6">
                    <div class="section-title mt-3">
                        <h5 class="text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to {{ $data->name }}</h1>
                    </div>
                    <p class="mb-4">{{ $data->about }}</p>
                        <!-- <div class="social-media">
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                            <a href=""><i class="fab fa-tiktok"></i></a>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Activity -->
    <div class="activity" id="activity">
        <div class="container">
            <div class="section-title">
                <h5 class="text-primary fw-normal">Kegiatan</h5>
                <h1 class="mb-5">Kegiatan unggulan di PesanTren</h1>
            </div>
            <div class="row">
                @foreach ($activities as $activity)
                <div class="col-lg-3 col-6 wow fadeInUp">
                    <div class="acivity-item"
                        style="background-image: linear-gradient(rgba(15, 23, 43, .5), rgba(15, 23, 43, .7)), url(/storage/image/activity/{{ $activity->images->first()->url }}); background-position: center; background-repeat: no-repeat; background-size: cover;">
                        <h3><a href="{{ route('showActivity', $activity->slug) }}" class="text-white">{{ $activity->name }}</a></h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Activity -->

    <!-- Popular Product Start -->
    <div class="blog" id="blog">
        <div class="container">
            <div class="section-title">
                <h5 class="text-primary fw-normal">Blog</h5>
                <h1 class="mb-5">Artikel terkini tentang PesanTren</h1>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-6 wow fadeInUp">
                        <div class="blog-item">
                            <div class="img">
                                <img src="/storage/image/article/{{ $article->thumbnail }}" class="img-fluid">
                                <div class="blog-desc text-start py-3">
                                    <h2 class="mb-3"><a href="{{ route('showArticle', $article->slug) }}" class="text-dark">{{ $article->title }}</a></h2>
                                    <span class="category">{!! $article->excerp() !!}</span>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Popular blog End -->

    <!-- cta -->
    <div class="cta">
        <div class="container">
            <div class="row  justify-content-center">
                <div class="col-lg-10 d-flex justify-content-between">
                    <h4>Tertarik bergabung bersama kami?</h4>
                    <a href="{{ route('form') }}" class="btn btn-primary py-sm-3 py-5 px-sm-5 me-3 animated slideInLeft">Daftar
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end cta -->
@endsection