@extends('auth.layouts.app')
@section('title', 'Аккаунт:' . Auth::user()->name)
@section('content')
    <div class="col-md-12">
        <br>
        <h3 style="text-align: center">@yield('title')</h3>
        <div>
            <div class="container form-group text-center">
                <hr>
                <img style="width:200px;text-align:center;border-radius: 50px"
                     src="{{ Storage::url(Auth::user()->image) }}">
                <hr>
            </div>
            <div class="form-group">
                <h5>Имя пользователя</h5>
                <input type="text" class="form-control" id="name" name="name"
                       aria-describedby="nameHelp" disabled value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <h5 for="email">
                    Адрес электронной почты
                    @if(Auth::user()->email_verified_at != null)
                        <span class="badge badge-success" id="badge">Подтвержден</span>
                    @endif
                </h5>
                <input type="email" class="form-control"
                       id="email" name="email"
                       aria-describedby="emailHelp" disabled value="{{Auth::user()->email}}"
                >
            </div>
            <div class="form-group">
                <a class="btn btn-primary" style="width: 100%" href="{{route('accounts.edit',$user = Auth::id())}}">Редактировать
                    профиль</a>
            </div>
        </div>
        <br>
    </div>
    <br>
@endsection
