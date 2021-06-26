@extends('layouts.master')
@section('title','Оформление заказа')
@section('content')
<div class="order">
    <h1>Подтвердите заказ:</h1>
        <div class="row-cols-auto">
            <form action="{{route('basket-confirm')}}" method="POST">
                <div>
                    <br><p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>
                    <div class="container">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">ФИО</button>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Введите ФИО" aria-label="" aria-describedby="basic-addon1"
                            value="{{old('name', isset(Auth::user()->name) ? Auth::user()->name : null)}}">
                        </div>
                        @guest
                        <hr>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">Email</button>
                            </div>
                            <input type="email" name="email" class="form-control" placeholder="Введите Email" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        @endguest
                        <hr>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">Телефон</button>
                            </div>
                            <input type="text" name="phone" class="form-control" placeholder="+7 (999) 99 99 999" id="phone" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <hr>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">Способ оплаты:</button>
                            </div>
                            <select class="form-control search-slt" name="payment" id="payment">
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->payments_method }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <p>Общая стоимость:<b>{{$order->calculateFullSum()}}₽.</b></p>
                    <br>
                    @csrf
                    <input type="submit" class="btn bt btn-success" style="width: 100%"  value="Подтвердите заказ">
                </div>
            </form>
        </div>
</div>
@endsection
