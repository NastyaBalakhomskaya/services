@extends('layouts.app')

@section('title', 'Show tire')

@section('content')

    <h4>Название услуги: {{ $tire->title }}</h4>
    <h4>Описание: {{ $tire->description }}</h4>
    <h4>Цена: {{ $tire->price }}</h4>
    <h4>Дата добавления услуги в список: {{ $tire->created_at?->format('Y/m/d') }}</h4>

@endsection

