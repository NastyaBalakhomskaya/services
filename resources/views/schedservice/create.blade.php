@extends('layouts.app')

@section('title', 'Create Schedule for services')

@section('content')

    <div class="row">
        <form action="{{route('schedservice.create')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="date_record">{{ __('validation.attributes.date_record') }}</label>
                <input value="{{ old ('date_record') }}" name="date_record" type="date"
                       class="form-control @error('date_record') is-invalid @enderror">
                @error('date_record')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_record">{{ __('validation.attributes.time_record') }}</label>
                <input value="{{ old ('time_record') }}" name="time_record" type="time"
                       class="form-control @error('time_record') is-invalid @enderror">
                @error('time_record')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection


