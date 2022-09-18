@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail {{ $module }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $module }}</a></li>
                            <li class="breadcrumb-item active">Detail {{ $module }}</li>
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
                                <th>Judul</th>
                                <td>{{ $model->title }}</td>
                            </tr>
                            <tr>
                                <th>Kontent</th>
                                <td>{!! $model->content !!}</td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="images p-5">
                        <div class="row">
                            <div class="col-lg-5">
                                <img style="width: 100%" src="{{ asset('storage/image/'.$module.'/'.$model->thumbnail) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
