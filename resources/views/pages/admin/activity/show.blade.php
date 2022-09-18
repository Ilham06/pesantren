@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Kegiatan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Activity</a></li>
                            <li class="breadcrumb-item active">Activity</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card mt-2">
                    <div class="card-body p-0">
                        <table class="table">
                            <tr>
                                <th>Nama Kegiatan</th>
                                <td>{{ $model->name }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{!! $model->description !!}</td>
                            </tr>
                            <tr>
                                <th>Foto Kegiatan</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="images p-5">
                        <div class="row">
                            @forelse ($model->images as $image)
                                <div class="col-lg-3">
                                    <img style="width: 100%" src="{{ asset('storage/image/activity/'.$image->url) }}" alt="">
                                </div>
                            @empty
                                <p>Tidak ada foto</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
