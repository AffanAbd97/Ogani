@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Data</div>
            <div class="card-body">
                <form action="/cart/confirm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <input disabled name="user_id" id="user_id" class="form-control" value="{{ $userdata->name }}">
                        @error('user_id')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pengiriman">Pengiriman</label>
                        <select name="pengiriman" id="pengiriman" class="form-control" value="{{ old('pengiriman') }}">
                            <option value="">Silahkan pilih Pengiriman</option>

                            <option value="Express">Express</option>
                            <option value="Reguler">Reguler</option>

                        </select>
                        @error('pengiriman')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label>
                        <input name="bank" id="bank" class="form-control">
                        @error('bank')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="noRek">Nomor Rekening</label>
                        <input name="noRek" id="noRek" class="form-control">
                        @error('noRek')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="totalHrg">Total Harga</label>
                        <input disabled name="totalHrg" id="totalHrg" class="form-control"
                            value="Rp. {{ number_format($total) }}">
                        @error('totalHrg')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" id="alamat" class="form-control" value="{{ $userdata->profile->alamat }}">
                        @error('alamat')
                            <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Product</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
