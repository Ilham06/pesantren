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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Pendaftaran</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Pendaftaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="my-5 form-page">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        {{ session('message') }} atau <a href="https://wa.me/{{ $data->phone }}?text=Hallo%20admin" class="alert-link">hubungi admin</a>.
                    </div>
                </div>
            @endif
            <h2 class="mb-4">Syarat dan Ketentuan</h2>
            {{-- <ul class="mt-4"> --}}
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam, eos?</li>
                <li>Lorem ipsum dolor sit amet consectetur.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, molestias.</li>
            {{-- </ul> --}}
            <h2 class="mt-5">Form Pendaftaran</h2>
            <form class="row g-3 mt-4" action="{{ route('registration') }}" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-lg" name="name" id="name"
                        placeholder="masukan nama lengkap">
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select id="gender" name="gender" class="form-select form-select-lg">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">laki laki</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="birthday-place" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control form-control-lg" name="birthday_place" id="birthday-place"
                        placeholder="masukan tempat lahir">
                </div>
                <div class="col-6">
                    <label for="birthday-date" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control form-control-lg" name="birthday_date" id="birthday-date">
                </div>
                <div class="col-md-6">
                    <label for="origin" class="form-label">Asal Sekolah</label>
                    <input type="text" name="school_origin" class="form-control form-control-lg" id="origin"
                        placeholder="masukan asal sekolah">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">No. Hp/Wa</label>
                    <input type="number" name="phone" class="form-control form-control-lg" id="phone"
                        placeholder="masukan nomor hp/wa">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control form-control-lg" name="address" id="address" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
