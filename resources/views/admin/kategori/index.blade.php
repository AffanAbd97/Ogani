@extends('admin.template.master')

@section('content')
<a type="button" class="btn btn-success ml-2 mb-3" href="/kategori/create">Tambahkan Data</a>
<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kategori</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Nama </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategori as $index => $item)
                    <tr>
                        <td> {{ $index + 1 }} </td>
                        <td> {{ $item->nama }} </td>
                        <td>
                            <form action="/kategori/{{ $item->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/kategori/{{ $item->id }}/edit" class="btn btn-outline-warning btn-sm">Edit</a>
                                <input onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                    type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        No data
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection