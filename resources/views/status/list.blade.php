@extends('layouts.app')

@section('title','Status list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($statuses as $status)
            <tr>
                <th scope="row">{{ $status->id }}</th>
                <td>{{ $status->title }}</td>
                <td>{{ $status->description }}</td>
                <td>{{ $status->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $status)
                        <a href="{{ route('status.show', ['status' => $status->id]) }}">Просмотр</a>
                    @endcan
                    <br>
                    @can('edit', $status)
                        <a href="{{ route('status.edit.form', ['status' => $status->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $status)
                        <form action="{{ route('status.delete', ['status' => $status->id]) }}" method="post">
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
        {{ $statuses->links() }}
    </div>
@endsection

