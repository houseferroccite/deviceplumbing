@extends('auth.layouts.app')
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
            @include('auth.layouts.card', compact('product'))
    </section>
    <!-- end c-card -->
    <!--End Place Product -->
@endsection
