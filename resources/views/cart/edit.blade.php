@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card my-4">
        <div class="card-header font-weight-bold">Cart</div>
        <form action="/cart/update" method="POST">
            <div class="card-body">
                @csrf
                <input type="hidden" value="{{ $cart->id }}" name="id">
                <input type="hidden" value="{{ $cart->produk_id }}" name="produk_id">
                <div class="form-group gap-4">
                    <label for="nama">Produk</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $cart->produk->nama }}"
                        readonly>
                    @error('nama')
                    <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah</label>
                    <input type="text" class="form-control" value="{{ old('jml', $cart->jml) }}" name="jml" id="jml"
                        placeholder="Jumlah">
                    @error('jml')
                    <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    //ambil customer detail data
    $(document).ready(function(){
    $('#produk_id').change(function(e){
        $.ajax ({
            type: "get",
            url: "{{ route('cart.detail') }}",
            data: {
                produk_id: $(this).val()
            },
            dataType: "json",
            success: function(response){
            $('#harga').val(response.harga);
            },
            error: function(xhr, thrownError){
                alert (xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    });
</script>
@endpush
@endsection