@extends('admin.template.master')

@section('judul')
<h1>Form</h1>
@endsection

@section('subjudul')
<h3>Tambahkan Kategori</h3>
@endsection

@section('content')
<form action="/kategori" method="POST">
    @csrf
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambahkan Data</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" id="nama"
                            placeholder="Nama Kategori">
                        @error('nama')
                        <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</form>
@endsection