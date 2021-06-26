@extends('layouts.master')
@section('title','Категория:'. $category->name)
@section('content')
    <!--Place Categories -->
    <div id="titleCategories" class="card  border-bottom-0">
        <div class="card-body">
            <h2>@yield('title')</h2><br>
            <p>Товаров данной категории:{{$category->products->count()}}</p>
        </div>

    </div>
    <!-- begin c-card -->
    <section id="ProductCategory">
        <div class="row" style="margin-left: 10px; margin-right: 10px;">
            @foreach($category->products as $product)
                @include('layouts.cardProduct',compact('product'))
            @endforeach
        </div>
    </section>
    <!-- end c-card -->
    <!--End Place Categories -->
@endsection
