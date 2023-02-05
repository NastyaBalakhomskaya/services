@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')

    <div class="row">
        <form action="{{route('order.edit', ['order' => $order->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">{{ __('validation.attributes.title') }}</label>
                <input value="{{ old ('title', $order->title) }}" name="title" type="text"
                       class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_details">{{ __('validation.attributes.contact_details') }}</label>
                <input value="{{ old ('contact_details', $order->contact_details) }}" name="contact_details" type="text"
                       class="form-control @error('contact_details') is-invalid @enderror">
                @error('contact_details')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_start">{{ __('validation.attributes.date_start') }}</label>
                <input value="{{ old ('date_start', $order->date_start) }}" name="date_start" type="date"
                       class="form-control @error('date_start') is-invalid @enderror">
                @error('date_start')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_start">{{ __('validation.attributes.time_start') }}</label>
                <input value="{{ old ('time_start', $order->time_start) }}" name="time_start" type="time"
                       class="form-control @error('time_start') is-invalid @enderror">
                @error('time_start')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                @error('cars')
                <div>{{ $message }}</div>
                @enderror
                @foreach($cars as $car)
                    <div class="form-check">
                        <input type="checkbox" name="cars[]" value="{{ $car->id }}"
                               class="form-check-input"
                               @if($order->cars->contains('id', $car->id)) checked @endif
                        > {{ $car->brand }} {{ $car->model }} {{$car->year}}
                    </div>
                @endforeach
            </div>
            <br>

            <div style="border:1px solid #ccc;">
                <table border="0" width="100%">
                    <tr>
                        <th>Детейлинг:</th>
                        <th>Ремонт:</th>
                        <th>Шиномонтаж:</th>
                    </tr>
                    <td>
                        <div class="form-group">
                            @error('detailings')
                            <div>{{ $message }}</div>
                            @enderror
                            @foreach($detailings as $detailing)
                                <div class="form-check">
                                    <input type="checkbox" name="detailings[]" value="{{ $detailing->id }}"
                                           class="form-check-input"
                                           @if($order->detailings->contains('id', $detailing->id)) checked @endif
                                    > {{ $detailing->title }}
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <br>
                    <td>
                        <div class="form-group">
                            @error('services')
                            <div>{{ $message }}</div>
                            @enderror
                            @foreach($services as $service)
                                <div class="form-check">
                                    <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                           class="form-check-input"
                                           @if($order->services->contains('id', $service->id)) checked @endif
                                    > {{ $service->title }}
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            @error('tires')
                            <div>{{ $message }}</div>
                            @enderror
                            @foreach($tires as $tire)
                                <div class="form-check">
                                    <input type="checkbox" name="tires[]" value="{{ $tire->id }}"
                                           class="form-check-input"
                                           @if($order->tires->contains('id', $tire->id)) checked @endif
                                    > {{ $tire->title }}
                                </div>
                            @endforeach
                        </div>
                    </td>
                </table>
            </div>
            <br>

            <div class="form-group">
                <label for="text">{{ __('validation.attributes.text') }}</label>
                <textarea name="text" rows="3"
                          class="form-control @error('text') is-invalid @enderror">{{ old('text', $order->text) }}
                </textarea>
                @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">{{ __('validation.attributes.status') }}</label>
                <input value="{{ old ('status', $order->status) }}" name="status" type="text"
                       class="form-control @error('status') is-invalid @enderror">
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="datetime_finish">{{ __('validation.attributes.datetime_finish') }}</label>
                <input value="{{ old ('datetime_finish', $order->datetime_finish) }}" name="datetime_finish"
                       type="datetime"
                       class="form-control @error('datetime_finish') is-invalid @enderror">
                @error('datetime_finish')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_sum">{{ __('validation.attributes.price_sum') }}</label>
                <input value="{{ old ('price_sum', $order->price_sum) }}" name="price_sum" type="float"
                       class="form-control @error('price_sum') is-invalid @enderror">
                @error('price_sum')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>

@endsection
