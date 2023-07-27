@extends('admin.template.master')

@section('judul')
    <h1>Form</h1>
@endsection

@section('subjudul')
    <h3>Tambahkan Produk</h3>
@endsection

@section('content')
    <div class="row">
        @if (file_exists(public_path('image' . '/' . $produk->gambar)))
            <img src="{{ asset('/image' . '/' . $item->gambar) }}" style="" class="col-lg-6" alt="...">
        @else
            <img src="{{ $produk->gambar }}" style="" class="col-lg-6" alt="...">
        @endif

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $produk->nama }}</h4>
                    <p class="card-description">{{ $produk->deskripsi }}</p>
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Harga</td>
                                <td>{{ $produk->harga }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="/dashboard" class="btn btn-info btn-lg  btn-sm">kembali</a>
            </div>
        </div>
        {{-- <div class="card">
        <img src="{{asset('image/'. $produk->gambar)}}" style="width: 100vh; height: 400px;" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>{{$produk->judul}}</h2>
                <p class="card-text">{{$produk->ringkasan, 20}}</p>
                <p class="card-text">Tahun Terbit: {{$produk->tahun, 20}}</p>
                <a href="/dashboard" class="btn btn-info btn-sm">kembali</a>
            </div>
    </div> --}}
    @endsection
