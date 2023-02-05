@extends('layouts.app')

@section('title','Car list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Марка</th>
            <th scope="col">Модель</th>
            <th scope="col">Год</th>
            <th scope="col">Тип кузова</th>
            <th scope="col">Объем</th>
            <th scope="col">Коробка передач</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <th scope="row">{{ $car->id }}</th>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->body_type }}</td>
                <td>{{ $car->volume }}</td>
                <td>{{ $car->transmission }}</td>
                <td>{{ $car->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $car)
                        <a href="{{ route('car.show', ['car' => $car->id]) }}">Просмотр</a>
                    @endcan
                    <br>
                    @can('edit', $car)
                        <a href="{{ route('car.edit.form', ['car' => $car->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $car)
                        <form action="{{ route('car.delete', ['car' => $car->id]) }}" method="post">
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
        {{ $cars->links() }}
    </div>
@endsection

