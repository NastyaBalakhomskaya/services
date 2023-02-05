@extends('layouts.app')

@section('title','Service list')

@section('content')
    <table class="table">
        <td>
            <div class="row mt-4">
                <div class="col-md-0">
                    <div class="flex.justify-content-center">
                        {!! $services->links() !!}
                    </div>
                </div>
                <div class="col-md-7">
                    <ul class="list-unstyled">
                        <form action="{{ route('price') }}">
                            <div class="input-group">
                                <button class="btn btn-primary">Прайс на все услуги</button>
                            </div>
                        </form>
                        <br>
                        <form action="{{ route('price-services') }}">
                            <div class="input-group">
                                <button class="btn btn-primary">Прайс на ремонт</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </td>

        <td>
            <div class="row mt-4">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <ul class="list-unstyled">
                        <form action="{{ route('home') }}">
                            <h4>Параметры поиска заказа: </h4>
                            <h6>Заказ №: </h6>
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Введите №/название заказа"
                                       name="title"
                                       value="{{ request()->get('title') }}">
                                <button class="btn btn-primary">Поиск</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </td>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
            <th scope="col">Время выполнения работы</th>
            <th scope="col">Дата добавления</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <th scope="row">{{ $service->id }}</th>
                <td>{{ $service->title }}</td>
                <td>{{ $service->description }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->time_work }}</td>
                <td>{{ $service->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $service)
                        <a href="{{ route('service.show', ['service' => $service->id]) }}">Просмотр</a>
                    @endcan
                    <br>
                    @can('edit', $service)
                        <a href="{{ route('service.edit.form', ['service' => $service->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $service)
                        <form action="{{ route('service.delete', ['service' => $service->id]) }}" method="post">
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
        {{ $services->links() }}
    </div>
@endsection
