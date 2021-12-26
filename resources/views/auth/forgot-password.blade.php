@extends('layouts.guest')
@section('content')
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Send Password Reset Link') }}</button>
    </div>
    @if (Route::has('login'))
        <a href="{{ route('login') }}"><i class="fas fa-arrow-left"></i> {{ __('Back to login') }}</a>
    @endif
</form>
@endsection