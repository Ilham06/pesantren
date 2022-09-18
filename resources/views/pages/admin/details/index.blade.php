@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Pesantren</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail Pesantren</li>
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
                <div class="card-header">
                  <a href="{{ route('detail.create') }}" class="btn btn-success">Ubah Data</a>
                </div>
                <div class="card-body p-0">
                  <table class="table">
                <tr>
                  <th>Nama Pesantren</th>
                  <td>{{ $data->name }}</td>
                </tr>
                <tr>
                  <th>Alamat Pesantren</th>
                  <td>{{ $data->address }}</td>
                </tr>
                <tr>
                  <th>No. Hp Pesantren</th>
                  <td>{{ $data->phone }}</td>
                </tr>
                <tr>
                  <th>Email Pesantren</th>
                  <td>{{ $data->email }}</td>
                </tr>
                <tr>
                  <th>Tentang Pesantren</th>
                  <td>{{ $data->about }}</td>
                </tr>
              </table>
                </div>
              </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
