<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/pdfCSS.css">
    <title>Список товаров - Печать страницы</title>
    <style type="text/css">
        * {
            font-family: "DejaVu Sans", sans-serif;
        }
        table,th,tr,td{
            border: 1px solid black;!important;
        }
    </style>
</head>
<body>
<p class="card-footer" style='text-align: center'>
    ООО «Девайс-сантехника»
</p>
<hr>
<p class="card-footer" style='text-align: left'>
    Ответственное лицо: <b> {{ Auth::user()->name }}</b>
</p>
<hr>
<p class="card-footer" style='text-align: center'>
    Актуальный перечень товаров на <b>{{ date('d/m/Y') }}</b>
</p>
<table class="table">
    <tbody>
    <tr>
        <th>
            #
        </th>
        <th>
            Штрих-код
        </th>
        <th>
            Название
        </th>
        <th>
            Категория
        </th>
        <th>
            Кол-во
        </th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id}}</td>
            <td align="center">
                {!! DNS1D::getBarcodeHTML($product->barcode, 'C128',1.3,45, true); !!}
            </td>
            <td align="center">{{ $product->name }}</td>
            <td align="center">{{ $product->category->name }}</td>
            <td align="center">{{ $product->CountProduct }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<h5 class="card-footer" style='text-align: left'>
    Ознакомлен: _____________________
    <br>
    <br>
    МП: _____________________
</h5>
</body>
</html>
