@extends('layouts.app')

@section('title', 'Show schedule for detailings')

@section('content')
    <h4>Дата записи: {{ $scheddetailing->date_record }}</h4>
    <h4>Время записи: {{ $scheddetailing->time_record }}</h4>
    <h4>Дата добавления в список: {{ $scheddetailing->created_at?->format('Y/m/d') }}</h4>
@endsection



