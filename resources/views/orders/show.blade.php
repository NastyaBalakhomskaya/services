@extends('layouts.app')

@section('title', 'Show order')

@section('content')
    <h4>Название/ номер заказа: {{ $order->title }}</h4>
    <h4>Контактные данные: {{ $order->contact_details }}</h4>
    <h4>Дата заказа: {{ $order->date_start }}</h4>
    <h4>Время заказа: {{ $order->time_start }}</h4>
<h4>Марка автомобиля: <div>
    @foreach($order->cars as $car)
        <h4>{{$car->brand}} {{$car->model}} {{$car->year}}</h4>
    @endforeach
</div></h4>
    <br>
    <div style="border:1px solid #ccc;">
    <table border="0" width="100%">
        <tr>
            <th><h4>Ремонт:</h4></th>
            <th><h4>Детейлинг:</h4></th>
            <th><h4>Шиномонтаж:</h4></th>
        </tr>
        <td>
            @foreach($order->services as $service)
                <h4>{{$service->title}}</h4>
            @endforeach
        </td>
        <td>

            @foreach($order->detailings as $detailing)
                <h4>{{ $detailing->title }}</h4>
            @endforeach
        </td>
        <td>

            @foreach($order->tires as $tire)
                <h4>{{ $tire->title }}</h4>
            @endforeach
        </td>
    </table>
    </div>
    <br>
    <h4>Описание: {{ $order->text }}</h4>
    <h4>Статус: {{ $order->status }}</h4>
    <h4>Время выполнения: {{ $order->datetime_finish }}</h4>
    <h4>Сумма к оплате: {{ $order->price_sum }}</h4>
    <h4>Дата добавления заказа: {{ $order->created_at?->format('Y/m/d') }}</h4>
    {{--<p>{!! nl2br(strip_tags($order->text)) !!}</p>--}}

@endsection
