@extends('layouts.app')

@section('title', 'Create Car')

@section('content')

    <div class="row">
        <form action="{{route('car.create')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="brand">{{ __('validation.attributes.brand') }}</label>
                <input value="{{ old ('brand') }}" name="brand" type="text"
                       class="form-control @error('brand') is-invalid @enderror">
                @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="model">{{ __('validation.attributes.model') }}</label>
                <input value="{{ old ('model') }}" name="model" type="text"
                       class="form-control @error('model') is-invalid @enderror">
                @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="year">{{ __('validation.attributes.year') }}</label>
                <input value="{{ old ('year') }}" name="year" type="text"
                       class="form-control @error('year') is-invalid @enderror">
                @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="body_type">{{ __('validation.attributes.body_type') }}</label>
                <input value="{{ old ('body_type') }}" name="body_type" type="text"
                       class="form-control @error('body_type') is-invalid @enderror">
                @error('body_type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="volume">{{ __('validation.attributes.volume') }}</label>
                <input value="{{ old ('volume') }}" name="volume" type="float"
                       class="form-control @error('volume') is-invalid @enderror">
                @error('volume')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="transmission">{{ __('validation.attributes.transmission') }}</label>
                <input value="{{ old ('transmission') }}" name="transmission" type="text"
                       class="form-control @error('transmission') is-invalid @enderror">
                @error('transmission')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection

