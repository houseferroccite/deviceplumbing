@extends('layouts.master')
@section('title','Товары')
@section('content')
    @if(count($products))
        <!--Place Product -->
        <div id="Product" class="card  border-bottom-0">
            <div class="card-body">
                <h3>@yield('title')</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('search')}}" class="form-inline my-2 my-lg-0">
                    @csrf
                    <input class="form-control mr-sm-2" id="s" name="s" style="width: 100% !important;" type="Search"
                           placeholder="Поиск по товарам" aria-label="Search">
                </form>
            </div>
            <div class="card-body radioSearch">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-light-info btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Фильтрация товаров
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                @include('layouts.filtering.filterProducts')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        </div>
        <!-- begin c-card -->
        <section id="Product">
            <div class="row" style="margin-left: 5px; margin-right: 5px;">
                @foreach($products as $product)
                    @include('layouts.cardProduct', compact('product'))
                @endforeach
            </div>
        </section>
        <div style="display: inline-block">
            <span style="text-align: center">
                {{$products->links()}}
            </span>
        </div>

    @else
        <p class="alert alert-danger text-md-center">По вашему запросу товаров не обнаружено!</p>
    @endif
    <!-- end c-card -->
    <!--End Place Product -->
@endsection
