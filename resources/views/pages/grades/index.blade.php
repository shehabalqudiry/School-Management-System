@extends('layouts.master')
@section('css')

@section('title')
    {{ __('trans.Grades') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('trans.Grades_PageTitle') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="/" class="default-color">{{ __('trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('trans.Grades') }}</li>
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
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ __('trans.Grades_add') }}
                    </button>
                    <br /><br />
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trans.Grades_Name') }}</th>
                                    <th>{{ __('trans.Grades_Notes') }}</th>
                                    <th>{{ __('trans.Grades_Actions') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($grades as $grade)
                                
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->notes }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $grade->id }}" title="{{ __('trans.Grades_edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $grade->id }}" title="{{ __('trans.Grades_delete') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('trans.Grades_add') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('grades.update', $grade->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="name" class="mr-sm-2">{{ __('trans.stage_name_ar') }} : </label>
                                                            <input type="text" id="name" value="{{ $grade->getTranslation('name', 'ar') }}" name="name" class="form-control" required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="name_en" class="mr-sm-2">{{ __('trans.stage_name_en') }} : </label>
                                                            <input type="text" id="name_en" value="{{ $grade->getTranslation('name', 'en') }}" name="name_en" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="notes" class="mr-sm-2">{{ __('trans.Grades_Notes') }} : </label>
                                                            <input type="text" value="{{ $grade->notes }}" id="notes" name="notes" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Grades_Close') }}</button>
                                                        <button type="submit" class="btn btn-primary">{{ __('trans.Grades_submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal Delete --}}
                                <!-- Modal -->
                                <div class="modal fade" id="delete{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('trans.Grades_delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('trans.Grades_Warning') }}
                                                <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Grades_Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('trans.Grades_Delete') }}</button>
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
                                    <th>#</th>
                                    <th>{{ __('trans.Grades_Name') }}</th>
                                    <th>{{ __('trans.Grades_Notes') }}</th>
                                    <th>{{ __('trans.Grades_Actions') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Create-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('trans.Grades_add') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('grades.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="mr-sm-2">{{ __('trans.stage_name_ar') }} : </label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="name_en" class="mr-sm-2">{{ __('trans.stage_name_en') }} : </label>
                                    <input type="text" id="name_en" name="name_en" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="notes" class="mr-sm-2">{{ __('trans.Grades_Notes') }} : </label>
                                    <input type="text" id="notes" name="notes" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('trans.Grades_Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('trans.Grades_submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
