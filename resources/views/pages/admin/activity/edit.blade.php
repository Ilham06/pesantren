@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Activity</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Activity</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
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
                        <form action="{{ route('activity.update', $model->id) }}" enctype="multipart/form-data" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="nama" placeholder="nama kegiatan" value="{{ old('name', $model->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Foto</label>
                                <input class="form-control " type="file" name="images[]" id="images" multiple>
                                <small class="text-danger">*pilih ulang untuk mengubah gambar, biarkan jika tidak</small>
                                @error('images')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                                @error('images.*')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="summernote" class="form-label">Deskripsi</label>
                                <textarea name="description" id="summernote">
                                    {{ old('description', $model->description) }}
                                </textarea>
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

@push('scripts')
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
