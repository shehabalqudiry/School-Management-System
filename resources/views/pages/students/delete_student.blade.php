{{-- Modal Delete --}}
<div class="modal fade" id="delete{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ __('trans.Student_delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('trans.Student_Warning') }}
                <br /><br />
                <input type="text" disabled class="form-control" value="{{ $student->name }}">
                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('trans.Student_Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('trans.Student_Delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
