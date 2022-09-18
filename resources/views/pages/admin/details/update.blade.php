@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ubah Detail Pesantren</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Detail Pesantren</a></li>
                            <li class="breadcrumb-item active">Ubah Data Pesantren</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('detail.store') }}" method="post">
                          @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="nama pesantren" value='{{ old('name', $data->name) }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="alamat pesantren" value='{{ old('address', $data->address) }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">No. Hp</label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="no hp pesantren" value='{{ old('phone', $data->phone) }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="email pesantren" value='{{ old('email', $data->email) }}' required>
                            </div>
                            <div class="mb-3">
                                <label for="about" class="form-label">Tentang Pesantren</label>
                                <textarea class="form-control" name="about" id="about" rows="3" required>{{ old('about', $data->about) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
