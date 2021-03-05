<<div class="modal fade" id="modal_book_tour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nhập thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.book-tour.store')}}" method="post">
            <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Số người tham gia</label>
                        <input type="number" class="form-control" id="members" name="members" required>
                    </div>
                    <input type="hidden" name="tour_id" id="tour_id">
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </div>
            </form>
        </div>
    </div>
</div>
