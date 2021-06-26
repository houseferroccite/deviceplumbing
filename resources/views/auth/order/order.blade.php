<div class="jumbotron">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="text-info text-center mt-3">
                    <h4>
                        <a style="text-decoration: none; color: #17a2b8" href="{{route('person.orders.index')}}">Всего заказов</a>
                    </h4>
                </div>
                <div class="text-info text-center mt-2"><h1>{{$orders->count()}}</h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-dark mx-sm-1 p-3">
                <div class="text-dark text-center mt-3">
                    <h4>
                        <a style="text-decoration: none;color: #343a40" href="{{route('person.orders.OrderTrashed',$user)}}">История заказов</a>
                    </h4>
                </div>
                <div class="text-dark text-center mt-2"><h1>{{$orderTrashed->count()}}</h1></div>
            </div>
        </div>
    </div>
</div>
