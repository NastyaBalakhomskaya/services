@extends('layouts.app')

@section('title-block')Обратная связь@endsection

@section('content')
<h1>Обратная связь</h1>


    @if ($errors->any())
        <div class="alert alert-danger">Error!</div>
    @endif


    <div class="row">
        <form action="{{ route('contact.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('validation.attributes.name') }}</label>
                <input value="{{ old('name') }}" type="text" name="name" placeholder={{ __('validation.attributes.name') }}
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="email">{{ __('validation.attributes.email') }}</label>
                <input value="{{ old('email') }}" type="email" name="email" placeholder={{ __('validation.attributes.email') }}
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="phone">{{ __('validation.attributes.phone') }}</label>
                <input value="{{ old('phone') }}" type="text" name="phone" placeholder={{ __('validation.attributes.phone') }}
                       class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>

@endsection