@extends('layouts.app')

@section('title','Schedule tire list')

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
        @foreach($schedtires as $schedtire)
            <tr>
                <th scope="row">{{ $schedtire->id }}</th>
                <td>{{ $schedtire->date_record }}</td>
                <td>{{ $schedtire->time_record }}</td>
                <td>{{ $schedtire->created_at?->format('Y/m/d') }}</td>
                <td>
                    <a href="{{ route('schedtire.show', ['schedtire' => $schedtire->id]) }}">Просмотр</a>
                    <br>
                    @can('edit', $schedtire)
                        <a href="{{ route('schedtire.edit.form', ['schedtire' => $schedtire->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $schedtire)
                        <form action="{{ route('schedtire.delete', ['schedtire' => $schedtire->id]) }}" method="post">
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
        {{ $schedtires->links() }}
    </div>
@endsection

