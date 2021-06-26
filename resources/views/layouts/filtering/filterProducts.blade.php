<h5 style="text-align: left">Фильтрация по меткам и стоимости:</h5>
<form method="GET" action="{{route('indexSearch')}}">
    <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="hit" @if(request()->has('hit')) checked @endif>
        <label class="form-check-label" for="hit">
            <h5><span class="badge badge-danger">Хит продаж!</span></h5>
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif>
        <label class="form-check-label" for="new">
            <h5><span class="badge badge-success">Новинка</span></h5>
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif>
        <label class="form-check-label" for="recommend">
            <h5><span class="badge badge-warning">Рекомендуем</span></h5>
        </label>
    </div>
    <br>
    <div class="row g-2">
        <div class="row-7">
            <input type="text" name="price_from" id="price_from" class="form-control" placeholder="от 100" value="{{request()->price_from}}">
        </div>
        <div class="row-7">
            <input type="text" name="price_to" id="price_to" class="form-control" placeholder="до 10000000" value="{{request()->price_to}}">
        </div>
        <br>
        <div class="row-3">
            <button type="submit" class="btn btn-primary p-1">Фильтрация</button>
        </div>
        <br>
        <div class="row-3">
            <a href="{{route('products')}}" class="btn btn-warning p-1">Сбросить фильтр</a>
        </div>
    </div>
</form>
