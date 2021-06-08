@extends('layouts.master') @section('css') @section('title')
{{ __("trans.Teachers") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __("trans.Teacher_PageTitle") }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">
                    <a href="/" class="default-color">{{ __("trans.Home") }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __("trans.Teachers") }}</li>
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
                <a href="{{ route('teachers.create') }}" class="button x-small">
                    {{ __("trans.Teacher_add") }}
                </a>
                <br /><br />
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("trans.Teacher_Name") }}</th>
                                <th>{{ __("trans.Teacher_Gender") }}</th>
                                <th>{{ __("trans.Teacher_Join") }}</th>
                                <th>{{ __("trans.Teacher_Spec") }}</th>
                                <th>{{ __("trans.Teacher_Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($teachers as $teacher)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->gender->name }}</td>
                                <td>{{ $teacher->joining_date }}</td>
                                <td>{{ $teacher->specialization->name }}</td>
                                <td>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $teacher->id }}"
                                        title="{{ __('trans.Teacher_delete') }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- Modal Delete --}}
                            <div class="modal fade" id="delete{{ $teacher->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ __("trans.Teacher_delete") }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ __("trans.Teacher_Warning") }}
                                            <form action="{{ route('teachers.destroy', 'test') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $teacher->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        {{ __("trans.Teacher_Close") }}
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __("trans.Teacher_Delete")  }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@section('js')
{{-- Javascript --}}
@endsection
@endsection
