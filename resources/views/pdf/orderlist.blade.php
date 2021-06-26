<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/pdfCSS.css">
    <title>Заказ № {{$order->id}} - Печать страницы</title>
    <style type="text/css">
        * {
            font-family: "DejaVu Sans", sans-serif;
        }
    </style>
</head>
<body>
<p class="card-footer" style='justify-items: center'>
    {!! DNS1D::getBarcodeHTML((string)$order->id, "C128",5,80,true) !!}
</p>
<p class="card-footer" style='text-align: center'><small>Предьявите штрих-код на кассе для получения заказа.</small></p>
<hr>
<p class="card-footer" style='text-align: center'>
    Квитанция к заказу № <b>{!! $order->id !!}</b> от <b>{{ $order->created_at->format('d/m/Y') }}</b>
</p>
<hr>
<p class="card-footer" style='text-align: left'>
    Получатель: <b>{{ $order->name }}</b>
</p>
<hr>
<p class="card-footer" style='text-align: center'>
    Статус заказа:<b><br>
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
    </b>
</p>
<hr>
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
<hr>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Название</th>
        <th>Кол-во</th>
        <th>Цена</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>
                {{ $product->name }}
            </td>
            <td><span class="badge badge-info"> {{ $product->pivot->count }}</span></td>
            <td>{{$product->price}} руб.</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">Общая стоимость:</td>
        <td>{{$order->calculateFullSum()}} руб.</td>
    </tr>
    </tbody>
</table>
<hr>
<br>
<h5 class="card-footer" style='text-align: left'>
    Подпись получателя: _______________
</h5>
<h5 class="card-footer" style='text-align: left'>
    Отпуск заказа: _____________________
</h5>
<h5 class="card-footer" style='text-align: left'>
    МП: _____________________
</h5>
<hr>
<div class="card-footer">
    <footer class="page-footer font-small">
        <!-- Grid row-->
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
            <!-- Grid column -->
            <div class="col-md-8 col-12 mt-5">
                <p style="line-height: 1.7rem; text-align: center">
                    ИНН 1056874035, ОГРН 8954712365742<br>
                    Отопление, водоснабжение, канализация.
                    Очень низкие цены.Поставка и монтаж. Челябинск, ул.
                    Руставели, 8, вход со стороны Равис <br>
                    Контактные данные: +7 (351) 776-06-09 (Дмитрий)</p>
            </div>
            <!-- Grid column -->
        </div>
        <div class="col-md-8 col-12 mt-5">
            <p style="text-align: center">
                &copy;2014 — 2021 ООО «Девайс-сантехника»
            </p>
        </div>
        <!-- Copyright -->
    </footer>
</div>
</body>
</html>
