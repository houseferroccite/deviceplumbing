@extends('auth.layouts.app')

@section('title', 'Пост:' . $news->name)

@section('content')
    <div class="col-md-12">
        <h5>Новости:</h5><h4>{{ $news->name }}</h4>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $news->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $news->code }}</td>
            </tr>
            <tr>
                <td>Заголовок</td>
                <td>{{ $news->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $news->description }}</td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td>{{ $news->created_at }}</td>
            </tr>
            <tr>
                <td>Дата удаления</td>
                <td>{{ $news->updated_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
