@extends('auth.layouts.app')

@isset($news)
    @section('title', 'Редактировать пост:' . $news->name)
@else
    @section('title', 'Создать  пост')
@endisset

@section('content')
    <div class="order">
        @isset($news)
            <h5>Редактировать пост:</h5><h4>{{ $news->name }}</h4>
        @else
            <h1>Добавить пост:</h1>
        @endisset
        <div class="row-cols-auto">
            <form method="POST" enctype="multipart/form-data"
                  @isset($news)
                  action="{{ route('news.update', $news) }}"
                  @else
                  action="{{ route('news.store') }}"
                @endisset
            >
                <div class="container  justify-content-left">
                    @isset($news)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="input-group">
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName' =>'code'])
                                <label class="btn btn-primary" id="inputGroup" type="button">Код:</label>
                            <input type="text" name="code" id="code" id="inputGroup" class="form-control"
                                   placeholder="Введите код товара"
                                   value="{{ old('code', isset($news) ? $news->code : null) }}" aria-label=""
                                   aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName' =>'name'])
                            <label class="btn btn-primary" id="inputGroup" type="button">Название:</label>
                        <input type="text" name="name" id="inputGroup" class="form-control"
                               placeholder="Введите название поста"
                               value="@isset($news){{ $news->name }}@endisset" aria-label=""
                               aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName' =>'description'])
                                    <label class="btn btn-primary" id="inputGroup" type="button">Описание:</label>
                            <textarea name="description" id="inputGroup" cols="72"
                                      rows="7">@isset($news){{ $news->description }}@endisset</textarea>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success" style="width: 100%">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="col-md-12">
    </div>
@endsection
