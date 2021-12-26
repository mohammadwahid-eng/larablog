@extends('layouts.guest')
@section('content')
    <form method="POST" action="{{ route('registration') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="agree" class="custom-control-input @error('agree') is-invalid @enderror" id="agree" required {{ old('agree') ? 'checked' : '' }}>
                <label class="custom-control-label" for="agree">{{ __('I agree with the') }} <a href="/">{{ __('Terms of Service') }}</a></label>
                @error('agree')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Register') }}</button>
        </div>
    </form>
@endsection