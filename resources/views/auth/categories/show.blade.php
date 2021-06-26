@extends('auth.layouts.app')

@section('title', 'Категория:' . $category->name)

@section('content')
    <div class="col-md-12">
        <h5>Категория:</h5><h4>{{ $category->name }}</h4>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Товары категории</td>
                <td>
                    @if(count($category->products))
                    <section id="basket">
                        <div class="card mb-3">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Цена</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category->products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{route('products.show',$product)}}">
                                                <img height="60px"
                                                     src="{{ Storage::url($product->image) }}">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                        <td>{{$product->price}} руб.</td>
                                    </tr>
{{--                                    @include('auth.categories.categoryProductCard',compact('product'))--}}
                                @endforeach
                                <td colspan="2">
                                </td>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    @else
                        <p class="alert alert-danger text-md-center">
                            Товары по данной категории отсутствуют!
                            <br>Вы также можете добавить товар воспользавшись кнопкой ниже.
                        </p>
                        <br>
                        <a class="btn btn-success" type="button" href="{{ route('products.create',) }}">
                            Добавить товар
                        </a>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
