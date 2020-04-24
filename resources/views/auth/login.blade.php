@extends('layouts.main')

@section('title', 'Login')

@section('menu')
        @include('auth.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">
                                {{ __('E-Mail Address') }}
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       name="email" value="admin@example.com"
                                       class="form-control
                                @error('email')
                                       is-invalid
                                @enderror"
                                       autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">
                                {{ __('Password') }}
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       name="password" value="12345678"
                                       class="form-control
                                @error('password')
                                           is-invalid
                                @enderror"
                                       autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 mt-3">
                        <a class="btn btn-primary" href="{{ route('vkLogin') }}" role="button"><i class="fab fa-vk fa-lg fa-fw"></i></a>
                        <a class="btn btn-dark" href="{{ route('ghLogin') }}" role="button"><i class="fab fa-github fa-lg fa-fw"></i></a>
                        <a class="btn btn-primary" href="#" role="button"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        <a class="btn btn-danger" href="#" role="button"><i class="fab fa-google fa-lg fa-fw"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
