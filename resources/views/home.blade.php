@extends('layouts.app')

@section('title-block')Главная страница@endsection

@section('content')
    <div class="pricing-header p-2 pb-md-0 mx-auto text-center">
        <div class="alert alert-info">
            <h5><a href="{{ route('detailing.list') }}" class="nav-link">Детейлинг</a></h5>
        </div>
        <div class="alert alert-info">
            <h5><a href="{{ route('tire.list') }}" class="nav-link">Шиномонтаж</a></h5>
        </div>
        <div class="alert alert-info">
            <h5><a href="{{ route('service.list') }}" class="nav-link">Ремонт</a></h5>
        </div>
        <div class="alert alert-info">
            <h5><a href="{{ route('price') }}" class="nav-link">Прайс на все услуги</a></h5>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-4">
            <div class="pricing-header p-1 pb-md-1 mx-auto text-center">
                <div class="alert alert-info">
                    <h5><a href="{{ route('price-detailings') }}" class="nav-link">Прайс на детейлинг</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pricing-header p-1 pb-md-1 mx-auto text-center">
                <div class="alert alert-info">
                    <h5><a href="{{ route('price-services') }}" class="nav-link">Прайс на ремонт</a></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pricing-header p-1 pb-md-1 mx-auto text-center">
                <div class="alert alert-info">
                    <h5><a href="{{ route('price-tires') }}" class="nav-link">Прайс на шиномонтаж</a></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-7">

            @if($orders->isEmpty())
                <h2>Заказов нет</h2>
            @endif

            @foreach($orders as $order)

                <article class="mb-5">
                    <h4 class="mb-1">Заказ: {{ $order->title }}</h4>
                    <h4 class="mb-1">Статус заказа: {{ $order->status }}</h4>
                    <table border="1" width="100%">
                        <tr>
                            <th><h4>Ремонт:</h4></th>
                            <th><h4>Детейлинг:</h4></th>
                            <th><h4>Шиномонтаж:</h4></th>
                        </tr>
                        <td>
                            @foreach($order->services as $service)
                                <span>{{ $service->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->detailings as $detailing)
                                <span>{{ $detailing->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->tires as $tire)
                                <span>{{ $tire->title }}</span>
                            @endforeach
                        </td>
                    </table>
                </article>
            @endforeach
            <div class="flex.justify-content-center">
                {!! $orders->links() !!}
            </div>
        </div>

        <div class="col-md-5">
            <ul class="list-unstyled">
                <form action="{{ route('home') }}">
                    <h4>Параметры поиска заказа: </h4>
                    <h6>Заказ №: </h6>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Заказ" name="title"
                               value="{{ request()->get('title') }}">
                    </div>
                    <br>
                    <h6>Статус заказа: </h6>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Статус" name="status"
                               value="{{ request()->get('status') }}">
                    </div>
                    <br>
                    <div style="border:1px solid #ccc;">
                        <table border="0" width="100%">
                            <tr>
                                <th>Ремонт:</th>
                                <th>Детейлинг:</th>
                                <th>Шиномонтаж:</th>
                            </tr>

                            <td>
                                @foreach($services as $service)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="services[]"
                                               value="{{ $service->id }}"
                                               @if(in_array($service->id, request()->get('services',[])))
                                               checked
                                            @endif
                                        > {{$service->title}}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($detailings as $detailing)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="detailings[]"
                                               value="{{ $detailing->id }}"
                                               @if(in_array($detailing->id, request()->get('detailings',[])))
                                               checked
                                            @endif
                                        > {{$detailing->title}}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($tires as $tire)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               name="tires[]"
                                               value="{{ $tire->id }}"
                                               @if(in_array($tire->id, request()->get('tires',[])))
                                               checked
                                            @endif
                                        > {{$tire->title}}
                                    </div>
                                @endforeach
                            </td>
                        </table>
                    </div>
                    <br>
                    <button class="btn btn-primary">Поиск</button>
                </form>
            </ul>
        </div>
    </div>

@endsection
