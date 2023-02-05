@extends('layouts.app')

@section('title', 'Services Price')

@section('content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h4 class="display-6 fw-normal">Прайс на ремонт:</h4>
        @foreach($services as $element)
            <div class="alert alert-info">
                <h4>Ремонт</h4>
                <h5>{{$element->title}}</h5>
                <h5>Цена: {{$element->price}} рублей</h5>
            </div>
        @endforeach
    </div>

@endsection
