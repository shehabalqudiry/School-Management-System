@extends('layouts.master') @section('css') @section('title')
{{ __("trans.Levels") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __("trans.Levels_PageTitle") }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">
                    <a href="/" class="default-color">{{ __("trans.Home") }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __("trans.Levels") }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('layouts.errors')
                <button type="button" class="button x-small" data-toggle="modal" data-target=".bd-example-modal-lg">
                    {{ __("trans.Levels_add") }}
                </button>
                <button type="button" class="button x-small button-danger" id="btn_delete_all">
                    {{ __("trans.Levels_Delete_selected") }}
                </button>
                <br /><br />
                <div class="col-4">
                    <form action="{{ route('levels.filters') }}" method="post">
                        @csrf
                        <select name="grade_id" class="form-control form-control-lg" required onchange="this.form.submit()">
                            <option>Search ...</option>
                            @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <br /><br />
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="select_all" id="select-all" value="">
                                </th>
                                <th>#</th>
                                <th>{{ __("trans.Levels_Name") }}</th>
                                <th>{{ __("trans.Grades_Name") }}</th>
                                <th>{{ __("trans.Levels_Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @if (isset($details))
                                <?php $levels = $details; ?>
                            @else
                                <?php $levels = $levels; ?>
                            @endif
                            @foreach ($levels as $level)

                            <?php $i++; ?>
                            <tr>
                                <td><input type="checkbox" value="{{ $level->id }}" name="box1"></td>
                                <td>{{ $i }}</td>
                                <td>{{ $level->name }}</td>
                                <td>{{ $level->grade->name }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $level->id }}" title="{{ __('trans.Levels_edit') }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $level->id }}" title="{{ __('trans.Levels_delete') }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit{{ $level->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ __("trans.Levels_add") }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('levels.update', $level->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name"
                                                            class="mr-sm-2">{{ __("trans.stage_name_ar") }}
                                                            :
                                                        </label>
                                                        <input type="text" id="name"
                                                            value="{{ $level->getTranslation('name', 'ar') }}"
                                                            name="name" class="form-control" required />
                                                    </div>
                                                    <div class="col">
                                                        <label for="name_en"
                                                            class="mr-sm-2">{{ __("trans.stage_name_en") }}
                                                            :
                                                        </label>
                                                        <input type="text" id="name_en"
                                                            value="{{ $level->getTranslation('name', 'en') }}"
                                                            name="name_en" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="grade_id" class="mr-sm-2">{{
                                                            __("trans.Grades")
                                                        }}
                                                        :
                                                    </label>
                                                    <select id="grade_id" name="grade_id" class="form-control form-control-lg">
                                                        @foreach ($grades as $grade)
                                                        <option @if($grade->id == $level->grade_id) selected @endif
                                                            value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        {{
                                                            __(
                                                                "trans.Levels_Close"
                                                            )
                                                        }}
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __("trans.Levels_submit") }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Delete --}}
                            <!-- Modal -->
                            <div class="modal fade" id="delete{{ $level->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ __("trans.Levels_delete") }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __("trans.Levels_Warning") }}
                                            <form action="{{ route('levels.destroy', $level->id) }}" method="post">
                                                @csrf @method('DELETE')
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        {{ __("trans.Levels_Close") }}
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __("trans.Levels_Delete")  }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>{{ __("trans.Levels_Name") }}</th>
                                <th>{{ __("trans.Grades_Name") }}</th>
                                <th>{{ __("trans.Levels_Actions") }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Create --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('trans.Levels_add') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('levels.store') }}" method="post" class=" row mb-30">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="list_levels">
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="name" class="mr-sm-2">{{ __('trans.Level_name_ar') }} :
                                                </label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="name_en" class="mr-sm-2">{{ __('trans.Level_name_en') }}
                                                    : </label>
                                                <input type="text" name="name_en" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="box">
                                                    <label for="grade_id" class="mr-sm-2">{{ __('trans.Grades') }} :
                                                    </label>
                                                    <select name="grade_id" class="form-control form-control-lg">
                                                        @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="mr-sm-2">{{ __('trans.Levels_Actions') }} :
                                                </label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ __('trans.Levels_Delete') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20 mb-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ __('trans.Levels_add') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('trans.Levels_Close') }}</button>
                                <button type="submit" class="btn btn-success">{{ __('trans.Levels_submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Delete Selected --}}
    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ __("trans.Levels_delete") }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __("trans.Levels_Warning") }}
                    <form action="{{ route('levels.destroy_selected') }}" method="post">
                        @csrf
                        <input type="hidden" id="delete_all_id" name="delete_all_id" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                {{ __("trans.Levels_Close") }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{ __("trans.Levels_Delete")  }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@section('js')

@endsection
@endsection

