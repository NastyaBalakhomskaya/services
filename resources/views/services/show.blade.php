@extends('layouts.app')

@section('title', 'Show service')

@section('content')
    <h4>Название услуги: {{ $service->title }}</h4>
    <h4>Описание: {{ $service->description }}</h4>
    <h4>Цена: {{ $service->price }}</h4>
    <h4>Время выполнения работы: {{ $service->time_work }}</h4>
    <h4>Дата добавления услуги в список: {{ $service->created_at?->format('Y/m/d') }}</h4>
@endsection
