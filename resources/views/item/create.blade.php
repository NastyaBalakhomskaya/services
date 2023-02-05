@extends('layouts.app')

@section('title', 'Create Item')

@section('content')

    <div class="row">
        <form action="{{route('item.create')}}" method="post">
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
                <label for="height">{{ __('validation.attributes.height') }}</label>
                <input value="{{ old ('height') }}" name="height" type="float"
                       class="form-control @error('height') is-invalid @enderror">
                @error('height')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="length">{{ __('validation.attributes.length') }}</label>
                <input value="{{ old ('length') }}" name="length" type="float"
                       class="form-control @error('length') is-invalid @enderror">
                @error('length')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="width">{{ __('validation.attributes.width') }}</label>
                <input value="{{ old ('width') }}" name="width" type="float"
                       class="form-control @error('width') is-invalid @enderror">
                @error('width')
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

            <div class="form-group">
                <label for="count">{{ __('validation.attributes.count') }}</label>
                <input value="{{ old ('count') }}" name="count" type="float"
                       class="form-control @error('count') is-invalid @enderror">
                @error('count')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection

