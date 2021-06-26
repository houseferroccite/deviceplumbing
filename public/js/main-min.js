function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgPrew').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#upload-photo").change(function () {
    readURL(this);
});


    $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var cat_id = button.data('catid')
    var modal = $(this)
    modal.find('.modal-body #cat_id').val(cat_id);
})
$('#deleteProd').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var prod_id = button.data('prodid')
    var modal = $(this)
    modal.find('.modal-body #prod_id').val(prod_id);
})
$('#popoverBasket').popover('hide')

const $btn = document.querySelector('#btn'),
    $checkbox = document.querySelector('#input');

$checkbox.addEventListener('change', () =>
{
    $btn.disabled = $checkbox.checked ? false : true;
});
