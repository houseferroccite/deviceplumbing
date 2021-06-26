<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-left" id="myModalLabel">Подтверждение удаления</h4>
            </div>
            <form action="{{route('categories.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                        Вы действительно хотите удалить данную категорию?<br>
                        После удаления изменения не обратимы.
                    </p>
                    <input type="hidden" name="category_id" id="cat_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Нет, закрыть</button>
                    <button type="submit" class="btn btn-warning">Да, удалить</button>
                </div>
            </form>
        </div>
    </div>
</div>
