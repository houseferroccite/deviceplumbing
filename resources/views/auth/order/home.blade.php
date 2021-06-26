@extends('auth.layouts.app')
@section('title', 'Заказы')
@section('content')
    <div class="order col-md-12">
        @admin
        <br>
        <h3 style="text-align: center">Заказы</h3><br>
        <div class="card-body">
            <p class="card-footer" style='text-align: center'>
                <small>
                    Для поиска Заказа в сиситеме отсканируйте штрих-код на квитанции!
                </small>
            </p>
            <form method="GET" action="{{route('searchID')}}" class="form-inline my-2 my-lg-0">
                <input
                    class="form-control mr-sm-2"
                    id="id"
                    name="id"
                    style="width: 100% !important;"
                    type="Search"
                    autofocus
                    placeholder="Поиск заказа по штрих-коду"
                    aria-label="Search">
                <br>
            </form>
            @else
                <hr>
                <h3 style="text-align: center">Заказы пользователя</h3>
                <hr>
                @endadmin
                @admin
                <hr>
                <h6>Фильтрация статуса</h6>
                @include('auth.modal.listStatus')
                <hr>
                @else
                    @include('auth.order.order')
                    @endadmin
                    @if(count($orders))
                        <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Статус
                                </th>
                                <th>
                                    Когда отправлен
                                </th>
                                <th>
                                    ФИО
                                </th>
                                <th>
                                    Сумма
                                </th>
                                <th>
                                    Действия
                                </th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id}}</td>
                                    <td>
                                        @switch($order->status)
                                            @case(0)
                                            <span class="badge badge-secondary">Отменен</span>
                                            @break
                                            @case(1)
                                            <span class="badge badge-warning">В обработке</span>
                                            @break
                                            @case(2)
                                            <span class="badge badge-success">Готов к выдаче</span>
                                            @break
                                            @case(3)
                                            <span class="badge badge-primary">Получен</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                                    <td>{{ $order->pregName($order->name) }}</td>
                                    <td>{{ $order->calculateFullSum()}} руб.</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('person.orders.destroy', $order) }}" method="POST">
                                                <a class="btn btn-success" type="button" style="width: 100%"
                                                   @admin
                                                   href="{{route('orders.show',$order)}}"
                                                   @else
                                                   href="{{route('person.orders.show',$order)}}"
                                                   @endadmin
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-binoculars"
                                                         viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                                    </svg>
                                                </a>
                                                @csrf
                                                @admin
                                                @else
                                                    @method('DELETE')
                                                    <input style="width: 100%" class="btn btn-danger" type="submit"
                                                           value="Удалить заказ">
                                                    @endadmin
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    @else
                        @admin
                        <p class="alert alert-danger text-md-center">
                            Заказ отсутствует в базе!
                            <a href="{{route('home')}}">Сбросить фильтр</a>
                        </p>
                        @endadmin
                    @endif
                    <div style="display: inline-block">
            <span style="text-align: center">
                {{$orders->links()}}
            </span>
                    </div>
        </div>
@endsection
