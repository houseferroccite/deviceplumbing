@extends('auth.layouts.app')
@section('title','Подтвердите E-mail')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 style="text-align: center">@yield('title')</h2>
                    </div>
                    @if(session('resent'))
                        <p class="alert alert-success font-weight-light text-xl-center">
                            Сообщение с новой ссылкой для подтверждения, отправлено.
                        </p>
                    @endif
                    <div class="card card-body">
                        <p class="alert alert-warning font-weight-light text-xl-center">
                            @yield('title')<br>
                            Если Вы не получили сообщение с письмом,
                        </p>
                    </div>
                    <div class="card-footer">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" style="width: 100%" class="btn btn-primary">
                                Нажмите для повторной отправки письма
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
