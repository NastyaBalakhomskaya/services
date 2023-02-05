@extends('layouts.app')

@section('title','Schedule detailing list')

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
        @foreach($scheddetailings as $scheddetailing)
            <tr>
                <th scope="row">{{ $scheddetailing->id }}</th>
                <td>{{ $scheddetailing->date_record }}</td>
                <td>{{ $scheddetailing->time_record }}</td>
                <td>{{ $scheddetailing->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('scheddetailing.show', ['scheddetailing' => $scheddetailing->id]) }}">Просмотр</a>
                    <br>
                    @can('edit', $scheddetailing)
                        <a href="{{ route('scheddetailing.edit.form', ['scheddetailing' => $scheddetailing->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $scheddetailing)
                        <form action="{{ route('scheddetailing.delete', ['scheddetailing' => $scheddetailing->id]) }}" method="post">
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
        {{ $scheddetailings->links() }}
    </div>
@endsection



