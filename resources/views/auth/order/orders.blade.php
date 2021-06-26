@extends('auth.layouts.app')
@section('title', 'История заказов')
@section('content')
    <div class="order col-md-12">
        <h3 style="text-align: center">История заказов</h3>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Номер
                </th>
                <th>
                    Статус
                </th>
                <th>
                    Дата создания
                </th>
                <th>
                    Дата отмены заказа
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
                @if(count($orderS))
            </tr>
            @foreach($orderS as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>
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
                    </td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->deleted_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->calculateFullSum()}} руб.</td>
                    <td>
                        <div class="btn-group mb-3">
                            <form action="..." method="POST">
                                <a class="btn btn-danger" type="button"
                                   href="{{route('person.orders.forceDelete',$order->id)}}"
                                >
                                    Удалить
                                </a>
                                <a class="btn btn-success" type="button"
                                   href="{{route('person.orders.restore',$order->id)}}"
                                >
                                    Восстановить заказ
                                </a>
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <p class="alert alert-danger font-weight-bolder text-xl-center">История заказов не обнаружена!</p>
    @endif
@endsection
