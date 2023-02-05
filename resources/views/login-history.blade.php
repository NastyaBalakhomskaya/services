@extends('layouts.app')

@section('title-block', 'Login history List')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Дата входа в систему</th>
                <th scope="col">Имя пользователя</th>
                <th scope="col">IP пользователя</th>
            </tr>
            </thead>
            @foreach($visits as $visit)
                <tr>
                    <td>{{$visit->created_at->format('G:i:s Y/m/d')}}</td>
                    <td>{{$visit->user->name}}</td>
                    <td>{{$visit->user_ip}}</td>
                </tr>
            @endforeach
            <tbody>
            </tbody>
            <div>

@endsection
