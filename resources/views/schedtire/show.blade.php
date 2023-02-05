@extends('layouts.app')

@section('title', 'Show schedule for tires')

@section('content')
    <h4>Дата записи: {{ $schedtire->date_record }}</h4>
    <h4>Время записи: {{ $schedtire->time_record }}</h4>
    <h4>Дата добавления в список: {{ $schedtire->created_at?->format('Y/m/d') }}</h4>
@endsection

