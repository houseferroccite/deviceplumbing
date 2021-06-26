@extends('auth.layouts.app')

@section('title', 'Панель администратора')

@section('content')
        <div class="jumbotron">
            <div class="row w-100" style="margin-top: 5px">
                <div class="col-md-3">
                    <div class="card border-info mx-sm-1 p-3">
                        <div class="text-info text-center mt-3"><h4><a href="{{route('categories.index')}}">Категории</a></h4></div>
                        <div class="text-info text-center mt-2"><h1>{{$categories->count()}}</h1></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-info  mx-sm-1 p-3">
                        <div class="text-info text-center mt-3"><h4><a href="{{route('products.index')}}">Товары</a></h4></div>
                        <div class="text-info text-center mt-2"><h1>{{$products->count()}}</h1></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-info  mx-sm-1 p-3">
                        <div class="text-info text-center mt-3"><h4><a href="{{route('home')}}">Заказы</a></h4></div>
                        <div class="text-info text-center mt-2"><h1>{{$orders->count()}}</h1></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-info mx-sm-1 p-3">
                        <div class="text-info text-center mt-3"><h4>Users</h4></div>
                        <div class="text-info text-center mt-2"><h1>{{$users->count()}}</h1></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
