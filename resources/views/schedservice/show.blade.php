@extends('layouts.app')

@section('title', 'Show schedule for services')

@section('content')
    <h4>Дата записи: {{ $schedservice->date_record }}</h4>
    <h4>Время записи: {{ $schedservice->time_record }}</h4>
    <h4>Дата добавления в список: {{ $schedservice->created_at?->format('Y/m/d') }}</h4>
@endsection


