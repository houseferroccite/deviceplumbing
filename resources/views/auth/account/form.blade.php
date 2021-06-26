@extends('auth.layouts.app')
@isset($user)
    @section('title', 'Редактировать аккаунт:' . Auth::user()->name)
@else
    @section('title', 'Создать аккаунт')
@endisset
@section('content')
    <div class="col-md-12">
        @isset($user)
            <br>
            <h4 style="text-align: center">Редактировать аккаунт: <b>{{ Auth::user()->name }}</b></h4>
        @else
            <br>
            <h3 style="text-align: center">Добавить аккаунт</h3>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($user)
              action="{{ route('accounts.update', $user = Auth::id())}}"
              @else
              action="{{ route('accounts.store') }}"
            @endisset>
            <div>
                @isset($user)
                    @method('PUT')
                @endisset
                @csrf
                <div class="container form-group text-center">
                    <hr>
                    <label for="upload-photo">
                        <img id="imgPrew" src="/assets/images/faces/4.jpg" title="">
                    </label>
                    <input type="file" id="upload-photo" name="image">
                    <p class="description"><b>Нажмите на фото для загрузки своего изображения</b></p>
                    <hr>
                </div>
                <div class="form-group">
                    <label for="name">Имя пользователя</label>
                    <input type="text" class="form-control" id="name" name="name"
                           aria-describedby="nameHelp" value="{{ Auth::user()->name }}">
                    <small id="nameHelp" class="form-text text-muted">Имя будет отображаться в профиле аккаунта.</small>
                </div>
                <div class="form-group">
                    <label for="email">Адрес электронной почты</label>
                    <input type="email" @if(Auth::user()->email_verified_at != null)
                    disabled
                           @endif class="form-control"
                           id="email" name="email"
                           aria-describedby="emailHelp" value="{{Auth::user()->email}}"
                    >
                    <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим Вашу электронную
                        почту.</small>
                </div>
                @admin
                <div class="form-group">
                    <select name="is_admin" id="is_admin" class="form-control" style="width: 100%">
                        @foreach ([0 => "Пользователь",1 => "Администратор"] as $field => $title)
                            <option value="{{$field}}"
                                    @isset($user)
                                    @if(Auth::user()->is_admin == $field)
                                    selected
                                @endif
                                @endisset
                            >{{ $title }}</option>
                        @endforeach
                    </select>
                </div>
                @endadmin
            </div>
            <br>
            <button class="btn btn-primary" style="width: 100%">
                @if(isset($user))
                    Обновить данные профиля
                @else
                    Создать профиль
                @endif
            </button>
            <br>
        </form>
    </div>
    <br>
@endsection
