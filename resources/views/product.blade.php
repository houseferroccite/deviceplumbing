@extends('layouts.master')
@section('title','Товар')
@section('content')
    <!--Place Product -->
    <div id="titleProduct" class="card  border-bottom-0">
        <div class="card-body">
            @yield('title')
        </div>
    </div>
    <div id="titleProduct" class="card  border-bottom-0">
    </div>
    <!-- begin c-card -->
    <section id="Product">
        <div class="row" style="margin-left: 5px; margin-right: 5px;">
            @include('layouts.cardOneProduct', compact('product'))
        </div>
        <br>
        @if(Auth::check())
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-light-info btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Оставить отзыв
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                         data-parent="#accordionExample">
                        <div class="card-body">
                            @include('layouts.comments.addComment',compact('product'))
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="card-body comments">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">Отзывы:</h5>
                    </div>
                    <div class="card-body">
                        @foreach($comments as $comment)
                            @include('layouts.comments.showComment',compact('comment'))
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
