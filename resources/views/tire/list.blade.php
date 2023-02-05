@extends('layouts.app')

@section('title','Tire list')

@section('content')
    <table class="table">
        <td>
            <div class="row mt-4">
                <div class="col-md-0">
                    <div class="flex.justify-content-center">
                        {!! $tires->links() !!}
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
                        <form action="{{ route('price-tires') }}">
                            <div class="input-group">
                                <button class="btn btn-primary">Прайс на шиномонтаж</button>
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
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tires as $tire)
            <tr>
                <th scope="row">{{ $tire->id }}</th>
                <td>{{ $tire->title }}</td>
                <td>{{ $tire->description }}</td>
                <td>{{ $tire->price }}</td>
                <td>{{ $tire->created_at?->format('Y/m/d') }}</td>
                <td>
                    @can('show', $tire)
                        <a href="{{ route('tire.show', ['tire' => $tire->id]) }}">Просмотр</a>
                    @endcan
                    <br>
                    @can('edit', $tire)
                        <a href="{{ route('tire.edit.form', ['tire' => $tire->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $tire)
                        <form action="{{ route('tire.delete', ['tire' => $tire->id]) }}" method="post">
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
        {{ $tires->links() }}
    </div>
@endsection

