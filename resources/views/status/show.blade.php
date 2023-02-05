@extends('layouts.app')

@section('title', 'Show status')

@section('content')
    <h4>Название статуса: {{ $status->title }}</h4>
    <h4>Описание: {{ $status->description }}</h4>
    <h4>Дата добавления статуса в список: {{ $status->created_at?->format('Y/m/d') }}</h4>
@endsection

