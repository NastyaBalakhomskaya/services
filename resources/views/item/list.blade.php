@extends('layouts.app')

@section('title','Item list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Высота</th>
            <th scope="col">Длина</th>
            <th scope="col">Ширина</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
            <th scope="col">Дата добавления</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->height }}</td>
                <td>{{ $item->length }}</td>
                <td>{{ $item->width }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->count }}</td>
                <td>{{ $item->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $item)
                        <a href="{{ route('item.show', ['item' => $item->id]) }}">Просмотр</a>
                    @endcan
                    <br>
                    @can('edit', $item)
                        <a href="{{ route('item.edit.form', ['item' => $item->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $item)
                        <form action="{{ route('item.delete', ['item' => $item->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                Удалить
                            </button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $items->links() }}
    </div>
@endsection

