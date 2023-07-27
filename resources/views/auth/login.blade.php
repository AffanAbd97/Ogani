@extends('layouts.auth')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <img src="/dashboard/assets/images/logo.png" alt="" class="img-fluid mb-4">
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">{{ __('Login') }}</h4>
                            <hr>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="Email"
                                        placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" id="Password" placeholder="Password"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <div class="alert alert-danger alert-dismissible">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                    <input type="checkbox" class="custom-control-input" ame="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                                <button class="btn btn-block btn-primary mb-4"> {{ __('Login') }}</button>


                            </form>
                            <hr>
                            @if (Route::has('password.request'))
                                <p class="mb-2 text-muted">{{ __('Forgot Your Password?') }} <a
                                        href="{{ route('password.request') }}" class="f-w-400">Reset</a></p>
                            @endif
                            <p class="mb-0 text-muted">Don’t have an account? <a href="/register" class="f-w-400">Signup</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
