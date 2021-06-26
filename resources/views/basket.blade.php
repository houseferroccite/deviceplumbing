@extends('layouts.master')
@section('title','Корзина')
@section('content')
    <div class="starter-template">
        <h1>@yield('title')</h1>
        <p>Оформление заказа</p>
        <section id="basket">
            <div class="order-4" >
                <a type="button" class="btn btn-info" href="{{route('products')}}" role="group">
                    Вернуться за покупками
                </a>
            </div>
            <div class="card mb-3">
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
                    @foreach($order->products as $product)
                        @include('layouts.basketCard',compact('product'))
                    @endforeach
                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td> {{$order->getFullSum()}} руб. </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="order-4" >
                <a type="button" class="btn btn-success" href="{{route('basket-place')}}" role="group">
                    Оформить заказ
                </a>
            </div>
        </section>
    </div>
@endsection
