@extends('layouts.master')
@section('css')

@section('title')
{{ __('trans.promotions') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ __('trans.promotions') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ __('trans.promotions') }}</li>
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
                <a href="{{ route('promotions.index') }}" class="button x-small">
                    {{ __('trans.promotion_add') }}
                </a>
                <button type="button" class="button gray x-small" data-toggle="modal" data-target="#delete_all">
                    {{ __('trans.promotion_back') }}
                </button>
                <br /><br />
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('trans.Student_Name') }}</th>
                                <th style="color: red">{{ __('trans.From') }}</th>
                                <th>{{ __('trans.Grade') }}</th>
                                <th>{{ __('trans.Sections_Level') }}</th>
                                <th>{{ __('trans.Section') }}</th>
                                <th>{{ __('trans.academic_year') }}</th>
                                <th style="color: green">{{ __('trans.To') }}</th>
                                <th>{{ __('trans.Grade') }}</th>
                                <th>{{ __('trans.Sections_Level') }}</th>
                                <th>{{ __('trans.Section') }}</th>
                                <th>{{ __('trans.academic_year') }}</th>
                                <th>{{ __('trans.Actions') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $promotion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $promotion->student->name }}</td>
                                <td style="color: red">{{ __('trans.From') }}</td>
                                <td>{{ $promotion->f_grade->name }}</td>
                                <td>{{ $promotion->f_level->name }}</td>
                                <td>{{ $promotion->f_section->name }}</td>
                                <td>{{ $promotion->academic_year }}</td>
                                <td style="color: green">{{ __('trans.To') }}</td>
                                <td>{{ $promotion->t_grade->name }}</td>
                                <td>{{ $promotion->t_level->name }}</td>
                                <td>{{ $promotion->t_section->name }}</td>
                                <td>{{ $promotion->academic_year_new }}</td>
                                <td>
                                    
                                    {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#delete_one_{{ $promotion->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button> --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $promotion->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('pages.students.promotions.delete_promotion')
                            @include('pages.students.promotions.delete_all')
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
