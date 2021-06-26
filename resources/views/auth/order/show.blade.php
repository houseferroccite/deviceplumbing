@extends('auth.layouts.app')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                @admin
                <!-- Button trigger modal -->
                <p class="alert alert-danger text-md-center">
                    <b>Чтобы изменить статус заказа, нажмите <a type="button" data-toggle="modal"
                                                                data-target="#changeStatus"
                                                                style="text-decoration: none" href="#">тут</a>!</b>
                </p>
                <!-- Modal -->
            @include('auth.modal.CardChangeStatus')
            <!-- End Modal -->
                @endadmin
                <div class="panel">
                    @admin
                    @else
                        @if($order->status === 2)
                            <div class="sectionBarcode justify-content-center">
                                <div class="container mt-5">
                                    <div class="d-flex justify-content-between mb-2">
                                        <p><strong>Квитанция к заказу №{{ $order->id }}
                                                от {{ $order->created_at->format('d/m/Y') }}</strong></p>
                                        <a class="btn btn-primary" href="{{ route('person.pdf.generate',$order) }}">
                                            Распечатать для получения
                                        </a>
                                    </div>
                                    @endif
                                    @endadmin
                                    <h1>Заказ №{{ $order->id }}</h1>
                                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>
                                    <p>Статус заказа:<b>
                                    @switch($order->status)
                                        @case(0)
                                        <h5><span class="badge badge-secondary">Отменен</span></h5>
                                        @break
                                        @case(1)
                                        <h5><span class="badge badge-warning">В обработке</span></h5>
                                        @break
                                        @case(2)
                                        <h5><span class="badge badge-success">Готов к выдаче</span></h5>
                                        @break
                                        @case(3)
                                        <h5><span class="badge badge-primary">Получен</span></h5>
                                        @break
                                        @endswitch
                                        </b>
                                        </p>
                                        <p>Указанный способ оплаты:<b>
                                                @switch($order->payment_id)
                                                    @case(1)
                                                    При получении оплата - наличными
                                                    @break
                                                    @case(2)
                                                    При получении оплата - картой
                                        @break
                                        @case(3)
                                        <h5><span class="badge badge-danger">Способ оплаты не был указан</span></h5>
                                        @break
                                        @endswitch
                                        </b>
                                        </p>
                                        <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Название</th>
                                                <th>Кол-во</th>
                                                <th>Цена</th>
                                                <th>Стоимость</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>
                                                        @admin
                                                        <a href="{{route('productTrashed',[$product->category->code,$product])}}">
                                                            <img height="60px"
                                                                 src="{{ Storage::url($product->image) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                        @else
                                                            <img height="60px"
                                                                 src="{{ Storage::url($product->image) }}">
                                                            {{ $product->name }}
                                                            @endadmin
                                                    </td>
                                                    <td><span
                                                            class="badge badge-info"> {{ $product->pivot->count }}</span>
                                                    </td>
                                                    <td>{{$product->price}} руб.</td>
                                                    <td>{{$product->getPriceCount()}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">Общая стоимость:</td>
                                                <td>{{$order->calculateFullSum()}} руб.</td>
                                            </tr>
                                            <hr>
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>
                </div>
            </div>
@endsection
