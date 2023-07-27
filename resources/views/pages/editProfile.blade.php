@extends('layouts.template')

@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        id="preview_img"
                        style=" object-fit: contain;
                        width: 230px;
                        height: 230px;"
                        src="/img/profile/{{ $profile->foto ? $profile->foto : 'noimageprofile.png' }}"><span
                        class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-3">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="foto" name="foto"
                                    onchange="loadPreview(this)">
                                @error('foto')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="input-group-text" for="gambar">Upload</label>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama"
                                    name="name"value="{{ $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Telepon</label>
                                <input type="text" class="form-control" placeholder="enter address line 1" name="telepon"
                                    value="{{ $profile->telepon }}">
                                @error('telepon')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Umur</label>
                                <input type="number" class="form-control" placeholder="enter address line 1" name="umur"
                                    value="{{ $profile->umur }}">
                                @error('umur')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="pria"
                                        value="1" {{ $profile->gender == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pria">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="wanita"
                                        value="2" {{ $profile->gender == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wanita">Wanita</label>
                                </div>
                                @error('gender')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $profile->alamat }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
