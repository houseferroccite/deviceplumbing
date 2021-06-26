@extends('layouts.master')
@section('title','Категории товаров')
@section('content')
    <!--Place Categories -->
    <div id="titleCategories" class="card  border-bottom-0">
        <div class="card-body">
            @yield('title')
        </div>
    </div>
    <!-- begin c-card -->
    <div class="row" style="margin-left: 10px; margin-right: 10px;margin-top: 10px">
        @foreach($categories as $category)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="text-card text-md-center">
                            {{$category->description}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a style="text-decoration: none" class="btn btn-primary" href="{{route('category',$category->code)}}">{{$category->name}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
