@extends('layouts.guest')

@section('content')

    {!! Form::open(['route' => 'login']) !!}
        <div class="form-group">
            {{ Form::label('email', __('Email')) }}
            {{ Form::text('email', old('email'), ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('password', __('Password')) }}
            {{ Form::password('password', ['class' => 'form-control']) }}
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

    {!! Form::close() !!}
@endsection