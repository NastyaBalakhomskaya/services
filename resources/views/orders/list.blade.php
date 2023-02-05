@extends('layouts.app')

@section('title','Order list')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Название</th>
            <th scope="col">Контактные данные</th>
            <th scope="col">Статус</th>
            <th scope="col">Сумма</th>
            <th scope="col">Дата добавления</th>
            <th scope="col">Действие</th>

        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>

                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->title }}</td>
                <td>{{ $order->contact_details }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->price_sum }}</td>

                <td>{{ $order->created_at?->format('Y/m/d') }}</td>
                <td>

                    <a href="{{ route('order.show', ['order' => $order->id]) }}">Просмотр</a>
                    <br>
                    @can('edit', $order)
                        <a href="{{ route('order.edit.form', ['order' => $order->id]) }}">Редактирование</a>
                    @endcan
                    <br>
                    @can('delete', $order)
                        <form action="{{ route('order.delete', ['order' => $order->id]) }}" method="post">
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
        {{ $orders->links() }}
    </div>
@endsection
