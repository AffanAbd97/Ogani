@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card my-4">
        <div class="card-header font-weight-bold">Cart</div>
        <form action="/cart/store" method="POST">
            <div class="card-body">
                @csrf
                <div class="form-group gap-4">
                    <label for="produk_id">Produk</label>
                    <select name="produk_id" id="produk_id" class="form-control">
                        <option value="">Silahkan pilih produk</option>
                        @foreach ($products as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('produk_id')
                    <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                    @error('harga')
                    <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jml">Jumlah</label>
                    <input type="text" class="form-control" value="{{ old('jml') }}" name="jml" id="jml"
                        placeholder="Jumlah">
                    @error('jml')
                    <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Add</button>
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