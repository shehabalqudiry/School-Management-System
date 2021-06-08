{{-- Modal Delete --}}
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('trans.promotion_back') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('trans.promotion_delete') }}
                <br /><br />
                <form action="{{ route('promotions.destroy', 'Test') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="page_id" value="1">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('trans.Student_Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('trans.promotion_back') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
