<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    @if ($currentStep != 3)
    <div style="display: none" class="row setup-content" id="step-3">
        @endif
        <div class="col-xs-12">
            <div class="col-md-12"><br />
                <label for="">{{ __('trans.attch') }}</label>
                <div class="form-group">
                    <input type="file" wire:model="photos" accept="image/*" multiple>
                </div>
                <button class="btn btn-danger btn-sm mr-2 nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">{{ trans('trans.Prev') }}</button>
                @if ($updateMode)
                <input type="hidden" wire:model="parent_id">
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_Edit"
                    type="button">{{ trans('trans.Finish') }}</button>
                @else
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                    type="button">{{ trans('trans.Finish') }}</button>
                @endif
            </div>
        </div>
    </div>

</div>
