<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal3Label">Обновление статуса</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('statusUpdate',$order->id)}}" method="POST">
                    @csrf
                    <div class="row-sm-6">
                        <div class="form-group col">
                            <label for="status" class="col-sm-2 col-form-label">Статус заказа</label>
                            <div class="row-sm-10">
                                <select name="status" id="status" class="form-control" style="width: 100%">
                                    @foreach ([1 => "В обработке",2 => "Готов к выдаче",3 => "Получен", 0 => "Отменен"] as $field => $title)
                                        <option value="{{$field}}">{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button style="width: 100%" class="btn btn-success">Обновить статус</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
