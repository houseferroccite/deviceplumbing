<form action="{{route('searchStatus')}}" method="GET" novalidate="novalidate">
    <select class="form-control search-slt" name="status" id="status" style="width: 100%">
        @foreach ([0 => "Отменен",1 => "В обработке",2 => "Готов к выдаче",3 => "Получен"] as $field => $title)
            <option value="{{ $field }}">{{ $title }}</option>
        @endforeach
    </select>
    <br>
    <button class="btn btn-primary" style="width: 100%">Найти</button>
</form>
