@extends('auth.layouts.app')

@isset($category)
    @section('title', 'Редактировать категорию:' . $category->name)
@else
    @section('title', 'Создать категорию')
@endisset

@section('content')
    <div class="order">
        @isset($category)
            <h5>Редактировать Категорию:</h5><h4>{{ $category->name }}</h4>
        @else
            <h1>Добавить Категорию:</h1>
        @endisset
        <div class="row-cols-auto">
            <form method="POST" enctype="multipart/form-data"
                  @isset($category)
                  action="{{ route('categories.update', $category) }}"
                  @else
                  action="{{ route('categories.store') }}"
                @endisset
            >
                <div class="container  justify-content-left">
                    @isset($category)
                        @method('PUT')
                    @endisset
                    @csrf
                    <div class="input-group">
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName' =>'code'])
                                <label class="btn btn-primary" id="inputGroup" type="button">Код:</label>
                            <input type="text" name="code" id="code" id="inputGroup" class="form-control"
                                   placeholder="Введите код товара"
                                   value="{{ old('code', isset($category) ? $category->code : null) }}" aria-label=""
                                   aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="col-sm-6">
                        @include('auth.layouts.error',['fieldName' =>'name'])
                            <label class="btn btn-primary" id="inputGroup" type="button">Название:</label>
                        <input type="text" name="name" id="inputGroup" class="form-control"
                               placeholder="Введите название товара"
                               value="@isset($category){{ $category->name }}@endisset" aria-label=""
                               aria-describedby="basic-addon1">
                        </div>
                    </div>
                        <hr>
                        <div class="input-group row">
                            <label for="image" class="col-sm-2 col-form-label">Картинка:</label>
                            <div class="col-sm-10">
                                <label class="btn btn-primary btn-file">
                                    Загрузить<input type="file" name="image" id="image">
                                </label>
                            </div>
                        </div>
                        </div>
                    <hr>
                    <div class="input-group">
                        <div class="col-sm-6">
                            @include('auth.layouts.error',['fieldName' =>'description'])
                                    <label class="btn btn-primary" id="inputGroup" type="button">Описание:</label>
                            <textarea name="description" id="inputGroup" cols="72"
                                      rows="7">@isset($category){{ $category->description }}@endisset</textarea>
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
