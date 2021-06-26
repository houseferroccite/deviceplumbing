<div class="d-flex justify-content-center container mt-5">
    <div class="card p-3 bg-white"><i class="fa fa-card"></i>
        <div class="about-product text-center mt-2"><img src="{{ Storage::url($product->image) }}" width="300">
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
                </h6>
            </div>
        </div>
        <div class="stats mt-2">
            <div class="d-flex justify-content-between p-description"><span>Описание:</span><span>{{$product->description}}</span></div>
            <div class="d-flex justify-content-between p-availability"><span>Доступность товара:</span><span>{{ $product->availability }}</span></div>
            <div class="d-flex justify-content-between p-specification"><span>Характеристики товара:</span><span>{!! nl2br(e($product->specification)) !!}</span></div>
            <div class="d-flex justify-content-between p-address"><span>Адрес магазина:</span><span>{{ $product->address }}</span></div>
            <div class="d-flex justify-content-between p-CountProduct"><span>Количество:</span><span>{{ $product->CountProduct }} шт.</span></div>
            <div class="d-flex justify-content-between p-supplier_id"><span>Поставщик:</span><span>{{ $product->supplies->name }}</span></div>
        </div>
        <div class="d-flex justify-content-between price font-weight-bold mt-4"><span>Цена:</span><span>{{$product->price}} руб.</span></div>
        <br>
        @if($product->isNotAvailable())
            <p class="alert alert-danger text-md-center">
                Товар отсутствует!
            </p>
        @else
            <p class="alert alert-success text-md-center">
                Товар в наличии!
            </p>
        @endif
    </div>
</div>
