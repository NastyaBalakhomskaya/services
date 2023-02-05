@extends('layouts.app')

@section('title', 'Show detailing')

@section('content')
    <h4>Название услуги: {{ $detailing->title }}</h4>
    <h4>Описание: {{ $detailing->description }}</h4>
    <h4>Цена: {{ $detailing->price }}</h4>
    <h4>Дата добавления услуги в список: {{ $detailing->created_at?->format('Y/m/d') }}</h4>
@endsection
