@extends('layouts.app')

@section('title', 'Create Tire')

@section('content')

    <div class="row">
        <form action="{{route('tire.create')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('validation.attributes.title') }}</label>
                <input value="{{ old ('title') }}" name="title" type="text"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{ __('validation.attributes.description') }}</label>
                <input value="{{ old ('description') }}" name="description" type="text"
                       class="form-control @error('description') is-invalid @enderror">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">{{ __('validation.attributes.price') }}</label>
                <input value="{{ old ('price') }}" name="price" type="float"
                       class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection

