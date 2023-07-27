@extends('admin.template.master')

@section('judul')
    <h1>Form</h1>
@endsection

@section('subjudul')
    <h3>Update Produk</h3>
@endsection

@section('content')
    <form action="/dashboard/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        {{ method_field('PATCH') }}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambahkan Data</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="nama">Nama Buah</label>
                            <input type="text" class="form-control" value="{{ $produk->nama }}" name="nama"
                                id="nama" placeholder="Nama Buah">
                            @error('nama')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4">{{ $produk->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>File upload</label>
                            <input type="file" name="gambar" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                            @error('gambar')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga (/kg)</label>
                            <input type="text" class="form-control" value="{{ $produk->harga }}" name="harga"
                                id="harga" placeholder="Harga (/kg)">
                            @error('harga')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" value="{{ $produk->stok }}" name="stok"
                                id="stok" placeholder="Stok">
                            @error('stok')
                                <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="">Silahkan pilih kategori</option>
                                <option value="{{ $produk->kategori_id }}" selected>{{ $produk->kategori->nama }}</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </form>
@endsection
