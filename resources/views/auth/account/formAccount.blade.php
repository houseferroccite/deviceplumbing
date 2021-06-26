@extends('auth.layouts.app')

@isset($user)
    @section('title', 'Редактировать аккаунт ' . $user->name)
@else
    @section('title', 'Создать аккаунт')
@endisset
@section('content')
    <div class="col-md-12">
        @isset($user)
            <h4>Редактировать аккаунт <b>{{ $user->name }}</b></h4>
        @else
            <h3>Добавить аккаунт</h3>
        @endisset
            <form method="POST" enctype="multipart/form-data"
                  @isset($user)
                  action="{{ route('account.update', $user) }}"
                  @else
                  action="{{ route('account.store') }}"
                @endisset>
                <div>
                    @isset($user)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="form-group">
                        <label for="email">Адрес электронной почты</label>
                        <input type="email" class="form-control" id="email" name="email"
                               aria-describedby="emailHelp" value="{{ old('email', isset($user) ? $user->email : null) }}">
                        <small id="emailHelp" class="form-text text-muted">Мы никогда никому не передадим Вашу электронную почту.</small>
                    </div>
                        <div class="form-group">
                            <label for="name">Имя пользователя</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   aria-describedby="nameHelp" value="{{ old('name', isset($user) ? $user->name : null) }}">
                            <small id="nameHelp" class="form-text text-muted">Имя будет отображаться в профиле аккаунта.</small>
                        </div>
                        <div class="form-group">
                            <label for="image">Изображение аккаунта</label>
                            <input type="file" class="form-control" id="image" name="image"
                                   aria-describedby="imageHelp" value="{{ old('image', isset($user) ? $user->image : null) }}">
                            <small id="imageHelp" class="form-text text-muted">Фото будет отображаться в профиле аккаунта.</small>
                        </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password"
                               value="{{ old('password', isset($user) ? $user->password : null) }}">
                    </div>
                        @admin
                    <div class="form-group form-check">
                        <select name="is_admin" id="is_admin" class="form-control" style="width: 100%">
                            @foreach ([0 => "Отменен",1 => "Администратор"] as $field => $title)
                                <option value="{{$field}}">{{ $title }}</option>
                            @endforeach
                        </select>
                    </div>
                        @endadmin
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
    </div>
@endsection
