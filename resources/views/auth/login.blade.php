@extends('layouts.guest')

@section('content')
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">{{ __('Password') }}</label>
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right w-100">{{ __('Login') }}</button>
        </div>

        @if (Route::has('password.request'))
            <p class="m-0 text-center"><a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a></p>
        @endif

        @if (Route::has('registration'))
            <div class="mt-3 text-center">
                {{ __('Don\'t have an account?') }} <a href="{{ route('registration') }}">{{ __('Create new one') }}</a>
            </div>
        @endif
    </form>
@endsection