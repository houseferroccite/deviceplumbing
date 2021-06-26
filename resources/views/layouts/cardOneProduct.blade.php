<div class="d-flex justify-content-center container mt-5">
    <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
        <div class="about-product text-center mt-2">
            <img src="{{ Storage::url($product->image) }}" width="300">
            <div>

                <h3>{{$product->name}}</h3>
                <h4 class="mt-0 text-black-50">{{$product->description}}</h4>
                <h5 class="mt-0 text-black-50">{{ $product->category->name }}</h5>
                <h6 class="mt-0 text-black-50">
                    @if($product->isHit())
                        <span class="badge badge-danger">Хит продаж!</span>
                    @endif
                    @if($product->isNew())
                        <span class="badge badge-success">Новинка</span>
                    @endif
                    @if($product->isRecommend())
                        <span class="badge badge-warning">Рекомендуем</span>
                    @endif
                </h6>            </div>
        </div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-price"><span>Описание:</span><span>{{$product->description}}</span></div>
            <hr>
            <div class="d-flex justify-content-between p-price"><span>Доступность товара:</span><span>{{ $product->availability }}</span></div>
            <hr>
            <div class="d-flex justify-content-between p-price"><span>Характеристики товара:</span><span>{!! nl2br(e($product->specification)) !!}</span></div>
            <hr>
            <div class="d-flex justify-content-between p-price"><span>Адрес магазина:</span><span>{{ $product->address }}</span></div>
            <hr>
            <div class="d-flex justify-content-between p-price"><span>Количество:</span><span>{{ $product->CountProduct }} шт.</span></div>
            <hr>
            <div class="d-flex justify-content-between p-supplier_id"><span>Поставщик:</span><span>{{ $product->supplies->name }}</span></div>
        </div>
        <div class="d-flex justify-content-between total font-weight-bold mt-4"><span>Цена:</span><span>{{$product->price}}руб.</span></div>
        <form action="{{route('basket-add', $product)}}" method="POST">
            @if($product->isNotAvailable())
                <p class="alert alert-danger text-md-center">
                Товар отсутствует!
            </p>
            @else
                @if(Auth::check())
                    <button type="submit" class="btn btn-primary" style="width: 100%" role="button">В корзину</button>
                @else
                    <p class="alert alert-warning text-md-center">
                        Для добавления товара в корзину,а также чтобы оставить комментарий пройдите <a href="{{route('login')}}">авторизацию</a>
                    </p>
                @endif
            @endif
            @csrf
        </form>
    </div>
</div>
