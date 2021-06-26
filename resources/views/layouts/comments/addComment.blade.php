<div class="comments">
    <form method="POST" enctype="multipart/form-data" action="{{route('person.comment.store')}}">
        @include('auth.layouts.error',['fieldName' =>'comment'])
        @csrf
        <div class="input-group mb-3">
            <input type="text" id="user_id" name="user_id" value="{{Auth::id()}}" hidden>
            <input type="text" id="product_id" name="product_id" value="{{$product->id}}" hidden>
            <div class="input-group-prepend">
                <span class="input-group-text" id="user">@</span>
            </div>
            <input type="text" class="form-control" aria-label="Имя пользователя"
                   aria-describedby="user" value="{{Auth::user()->name}}" disabled>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="date">Дата:</span>
            </div>
            <input type="text" class="form-control" id="date" name="date" value="{{date('d.m.Y')}}" aria-describedby="date" disabled>
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Текст комментария</span>
            </div>
            <textarea class="form-control" id="comment" name="comment" aria-label="Текст комментария"></textarea>
        </div>
        <br>
        <button class="btn btn-success" style="width: 100%">Комментировать</button>
    </form>
</div>
