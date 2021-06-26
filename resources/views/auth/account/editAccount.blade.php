@extends('auth.layouts.app')
@section('title', 'Редактировать аккаунт')
@section('content')
    <form action="#" method="#">
        @csrf
        <div style="text-align:center">
            <img id="imgAvatar" src="/assets/images/faces/1.jpg">
            <input type="file" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="email">Адрес электронной почты</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим Вашу электронную почту.</small>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button class="btn btn-primary">Отправить</button>
    </form>
@endsection
