@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')

    <div class="row">
        <form action="{{route('service.edit', ['service' => $service->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('validation.attributes.title') }}</label>
                <input value="{{ old ('title', $service->title) }}" name="title" type="text"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{ __('validation.attributes.description') }}</label>
                <input value="{{ old ('description', $service->description) }}" name="description" type="text"
                       class="form-control @error('description') is-invalid @enderror">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">{{ __('validation.attributes.price') }}</label>
                <input value="{{ old ('price', $service->price) }}" name="price" type="float"
                       class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_work">{{ __('validation.attributes.time_work') }}</label>
                <input value="{{ old ('time_work', $service->time_work) }}" name="time_work" type="time"
                       class="form-control @error('time_work') is-invalid @enderror">
                @error('time_work')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>

@endsection

