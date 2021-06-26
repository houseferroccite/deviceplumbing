<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="fav.svg">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.2.0/css/all.css "
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>@yield('title')</title>
</head>
<body>

<div class="wrapper">
    <!-- HEADER -->
    <!--Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('index')}}">Девайс-сантехника</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}">Главная<span></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products')}}">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">О нас</a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                        <a type="nav-link" class="nav-link" href="{{route('basket')}}">
                            Корзина
                        </a>
                    @endif
                </li>
            </ul>
            @guest
                <a type="button" class="nav-link" href="{{route('login')}}">Войти</a>
            @endguest
            @auth
                @admin
                <a type="button" class="nav-link" href="{{route('admPanel')}}">Панель администрирования</a>
            @else
                @include('auth.layouts.profileCard')
                @endadmin
            @endauth
        </div>
    </nav>
    <!--End Navigation Bar -->
    @if(session()->has('success'))
        <p class="alert alert-success text-md-center">{{session()->get('success')}}</p>
    @endif
    @if(session()->has('warning'))
        <p class="alert alert-warning text-md-center">{{session()->get('warning')}}</p>
@endif
@yield('content')
<!-- Footer -->
    <footer class="page-footer font-small">

        <!-- Footer Links -->

        <!-- Grid row-->
        <hr class="rgba-white-light" style="margin: 0 15%;">

        <!-- Grid row-->
        <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

            <!-- Grid column -->
            <div class="col-md-8 col-12 mt-5">
                <p style="line-height: 1.7rem">&copy;2014 — 2021 ООО «Девайс-сантехника»<br>
                    Отопление, водоснабжение, канализация. Очень низкие цены.Поставка и монтаж. Челябинск, ул.
                    Руставели, 8, вход со стороны Равис <br>&#9742;+7 (909) 746-77-79</p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row-->
        <hr id="line" class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
        <!-- Grid row-->
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">&copy; 2021 <a href="https://vk.com/zimovets_alexei">Alexei Zimovets</a>
            <a id="ins-ic" class="ins-ic social">
                <i class="fa fa-instagram fa-lg white-text mr-4"> </i>
            </a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>
<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="/js/main-min.js"></script>
</body>

</html>




