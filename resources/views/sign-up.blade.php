@extends('layouts.app')

@section('title-block','Sign Up')

@section('content')
    <h1>Форма регистрации</h1>
    <div class="row">

        <form action="{{ route('sign-up') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('validation.attributes.name') }}</label>
                <input value="{{ old ('name') }}" name="name" type="text"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('validation.attributes.email') }}</label>
                <input value="{{ old ('email') }}" name="email" type="email"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('validation.attributes.password') }}</label>
                <input value="{{ old ('password') }}" name="password" type="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('validation.attributes.password_confirmation') }}</label>
                <input value="{{ old ('password_confirmation') }}" name="password_confirmation"
                       type="password_confirmation"
                       class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="checkbox">{{ __('validation.attributes.checkbox') }}</label>
                <input value="1" name="checkbox" type="checkbox"
                       class="form-check-input @error('checkbox') is-invalid @enderror">
                @error('checkbox')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <button class="btn btn-primary">Sign Up</button>
            </div>
        </form>
@endsection
