@extends('admin.template.master')

@section('content')
    @php
    function rupiah($angka)
    {
        $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    @endphp


    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Produk</h4>
                <a type="button" class="btn btn-success  ml-2" href="/dashboard/create">Tambahkan Data</a>
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nama </th>
                            <th> Email</th>
                            <th> Alamat </th>
                            <th> Total Pembelian </th>
                            <th>Pengiriman</th>
                            <th>Bank</th>
                            <th>Rekening</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($order as $item)
                            <tr>

                                <td> {{ $i }} </td>
                                <td> {{ $item->user->name }} </td>
                                <td> {{ $item->user->email }} </td>
                                <td> {{ $item->alamat }} </td>
                                <td> {{ rupiah($item->totalHrg) }} </td>
                                <td> {{ $item->pengiriman }} </td>
                                <td> {{ $item->bank }} </td>
                                <td> {{ $item->noRek }} </td>
                                <td> {{ $item->tanggal }} </td>

                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <tr>
                                No Product
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div class="mt-3">
                    {{ $order->links() }}
                </div> --}}
            </div>
        </div>



    </div>
@endsection
@push('css')
    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
