<div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
        <div class="labels">
            @if($product->isHit())
                <span class="badge badge-danger">Хит продаж!</span>
            @endif
            @if($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif
            @if($product->isRecommend())
                <span class="badge badge-warning">Рекомендуем</span>
            @endif
        </div>
        <img height="250px" class="card-img-top" src="{{ Storage::url($product->image) }}" alt="...">
        <div class="card-body">
            <h6 class="card-title">
                {{$product->name}}
            </h6>
            <p class="card-text"><b>{{$product->price}}</b> руб.</p>
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
                            Для добавления товара в корзину, а также чтобы оставить комментарий пройдите <a href="{{route('login')}}">авторизацию</a>
                        </p>
                        @endif
                @endif
                <a href="{{route('product',[$product->id])}}" class="btn btn-default"
                   role="button">Подробно</a>
                @csrf
            </form>
        </div>
    </div>
</div>
