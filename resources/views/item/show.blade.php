@extends('layouts.app')

@section('title', 'Show item')

@section('content')
    <h4>Название: {{ $item->title }}</h4>
    <h4>Описание: {{ $item->description }}</h4>
    <h4>Высота: {{ $item->height }}</h4>
    <h4>Длина: {{ $item->length }}</h4>
    <h4>Ширина: {{ $item->width }}</h4>
    <h4>Цена: {{ $item->price }}</h4>
    <h4>Количество: {{ $item->count }}</h4>
    <h4>Дата добавления товара в список: {{ $item->created_at?->format('Y/m/d') }}</h4>
@endsection

