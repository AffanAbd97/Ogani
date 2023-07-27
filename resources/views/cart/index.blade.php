@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header font-weight-bold">Cart</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $index => $cart)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $cart->produk->nama }}</td>
                                <td>{{ $cart->jml }} kg</td>
                                <td>Rp. {{ number_format($cart->harga) }}</td>
                                <td>Rp. {{ number_format($cart->jml * $cart->harga) }}</td>
                                <td>
                                    <form action="/cart/{{ $cart->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="/cart/{{ $cart->id }}/edit"
                                            class="btn btn-outline-warning btn-sm">Edit</a>
                                        <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Product</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="/cart/checkout" class="btn btn-success">Checkout</a>
                <a href="/" class="btn btn-warning">Back to List</a>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#produk_id').change(function(e) {
            $.ajax({
                type: "get",
                url: "{{ route('cart.detail') }}",
                data: {
                    produk_id: $(this).val()
                },
                dataType: "json",
                success: function(response) {
                    $('#harga').val(response.harga);
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    </script>
@endpush
