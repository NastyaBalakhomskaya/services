@extends('layouts.app')

@section('title', 'Tires Price')

@section('content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h4 class="display-6 fw-normal">Прайс на шиномонтаж:</h4>
        @foreach($tires as $element)
            <div class="alert alert-info">
                <h4>Шиномонтаж</h4>
                <h5>{{$element->title}}</h5>
                <h5>Цена: {{$element->price}} рублей</h5>
            </div>
        @endforeach
    </div>

@endsection

