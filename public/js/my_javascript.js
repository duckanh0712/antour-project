
    function booktour (id)
{
    $('#tour_id').val(id)
    $('#modal_book_tour').modal('show');
}
    function confirmBookTour(id) {

        $('#id_book_tour').val(id);
        $('#modal-confirm').modal('show');
    }
