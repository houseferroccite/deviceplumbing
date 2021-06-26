@extends('layouts.master')
@section('title','Главная')
@section('content')
    <!--Create carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://asninfo.ru/images/news-partners/c8414cea/8efa23bca5a25efc152b4827.jpg"
                     class=" d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 5px;">
                    <h5>СКИДКИ</h5>
                    <p>Сегодня у нас действуют скидки.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img
                    src="https://porch.com/advice/wp-content/uploads/2014/06/Fotolia_56453634_Subscription_Monthly_XXL-960x5001.jpg"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="background-color: white;border-radius: 5px;">
                    <h5 >Сантехника и многое другое</h5>
                    <p >Сантехническое оборудование.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--End carousel -->
    <!-- END HEADER -->

    <!--Place Product -->
    <div id="titleProduct" class="card  border-bottom-0">
        <div class="card-body">
            Товары
        </div>
    </div>
    <!-- begin c-card -->
    <section id="Product">
        <div class="row" style="margin-left: 5px; margin-right: 5px;">
            @foreach($products as $product)
                @include('layouts.cardProduct',compact('products'))
            @endforeach
        </div>
        <div style="display: inline-block">
            <span style="text-align: center">
                {{$products->links()}}
            </span>
        </div>
    </section>
    <!-- end c-card -->
    <!--End Place Product -->

    <!--Places News -->
    <div id="titleProduct" class="card  border-bottom-0">
        <div class="card-body">
            Новости
        </div>
    </div>
    <section id="News">
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                </div>
                @foreach($news as $new)
                    <div class="carousel-item">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{$new->name}}</h5>
                                <p class="card-text">{{$new->description}}</p>
                            </div>
                            <div class="card-footer text-muted">
                                {{$new->created_at}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!--Places News -->
@endsection
