<div class="modal modal-danger fade" id="deleteProd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Удаление товара</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('products.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Вы действительно хотите удалить данный товар?<br>
                        После удаления изменения не обратимы.
                    </p>
                    <input type="hidden" name="product_id" id="prod_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Нет, закрыть</button>
                    <button type="submit" class="btn btn-warning">Да, удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>
