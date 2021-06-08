@extends('layouts.master')
@section('css')

@section('title')
{{ __('trans.Students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('trans.Students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('trans.Students') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('layouts.errors')
                <a href="{{ route('students.create') }}" class="button x-small">
                    {{ __('trans.Student_add') }}
                </a>
                <br /><br />
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('trans.Student_Name') }}</th>
                                <th>{{ __('trans.Email') }}</th>
                                <th>{{ __('trans.Student_Gender') }}</th>
                                <th>{{ __('trans.Grade') }}</th>
                                <th>{{ __('trans.Levels_Name') }}</th>
                                <th>{{ __('trans.Section') }}</th>
                                <th>{{ __('trans.Student_Actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->gender->name }}</td>
                                <td>{{ $student->grade->name }}</td>
                                <td>{{ $student->level->name }}</td>
                                <td>{{ $student->section->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('students.edit', $student->id) }}" title="{{ $student->name }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('students.show', $student->id) }}" title="{{ $student->name }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $student->id }}" title="{{ $student->name }}">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('pages.students.delete_student')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
