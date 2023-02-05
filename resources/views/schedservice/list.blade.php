@extends('layouts.app')

@section('title','Schedule service list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Дата записи</th>
            <th scope="col">Время записи</th>
            <th scope="col">Дата добавления</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schedservices as $schedservice)
            <tr>
                <th scope="row">{{ $schedservice->id }}</th>
                <td>{{ $schedservice->date_record }}</td>
                <td>{{ $schedservice->time_record }}</td>
                <td>{{ $schedservice->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('schedservice.show', ['schedservice' => $schedservice->id]) }}">Просмотр</a>
                    <br>
                    @can('edit', $schedservice)
                        <a href="{{ route('schedservice.edit.form', ['schedservice' => $schedservice->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $schedservice)
                        <form action="{{ route('schedservice.delete', ['schedservice' => $schedservice->id]) }}" method="post">
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
        {{ $schedservices->links() }}
    </div>
@endsection


