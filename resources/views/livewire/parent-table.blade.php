
<button type="button" class="button x-small" wire:click="showAdd">{{ __('trans.Add_Parent') }}</button>
<br /><br />
<div class="table-responsive">
    <table id="datatable" class="table table-striped table-bordered p-0">
        <thead>
            <tr>
                <th>{{ __('trans.Email') }}</th>
                <th>{{ __('trans.Name_Father') }}</th>
                <th>{{ __('trans.National_ID_Father') }}</th>
                <th>{{ __('trans.Passport_ID_Father') }}</th>
                <th>{{ __('trans.Phone_Father') }}</th>
                <th>{{ __('trans.Job_Father') }}</th>
                <th>{{ __('trans.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sparents as $sparent)
            <tr>
                <td>{{ $sparent->email}}</td>
                <td>{{ $sparent->name_father}}</td>
                <td>{{ $sparent->national_id_father}}</td>
                <td>{{ $sparent->Passport_id_father}}</td>
                <td>{{ $sparent->phone_father}}</td>
                <td>{{ $sparent->job_father}}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-success" wire:click="update({{ $sparent->id}})"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" wire:click="delete({{ $sparent->id}})"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>