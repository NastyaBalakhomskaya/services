@extends('layouts.app')

@section('title', 'Show car')

@section('content')
    <h4>Марка: {{ $car->brand }}</h4>
    <h4>Модель: {{ $car->model }}</h4>
    <h4>Год: {{ $car->year }}</h4>
    <h4>Тип кузова: {{ $car->body_type }}</h4>
    <h4>Объем: {{ $car->volume }}</h4>
    <h4>Коробка передач: {{ $car->transmission }}</h4>
    <h4>Дата добавления машины в список: {{ $car->created_at?->format('Y/m/d') }}</h4>
@endsection

