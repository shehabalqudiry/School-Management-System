@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('trans.Student_add')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('trans.Student_add')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @include('layouts.errors')
                <form method="post" action="{{ route('students.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{__('trans.personal_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('trans.Student_name_ar')}} : <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('trans.Student_name_en')}} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="name_en" value="{{ old('name_en') }}" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('trans.Email')}} : </label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('trans.Password')}} :</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{__('trans.Student_Gender')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{__('trans.Nationality')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @foreach($nationals as $nal)
                                    <option value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{__('trans.Bloods')}} : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @foreach($bloods as $bg)
                                    <option value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{__('trans.Date_of_Birth')}} :</label>
                                <input class="form-control" type="text" value="{{ old('date_birth') }}" id="datepicker-action" name="date_birth"
                                    data-date-format="yyyy-mm-dd">
                            </div>
                        </div>

                    </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        {{__('trans.Student_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="grade_id">{{__('trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="level_id">{{__('trans.Levels_Name')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="level_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{__('trans.Section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{__('trans.parent')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="sparent_id">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name_father }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{__('trans.academic_year')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) <option
                                        value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="photos">{{ __('trans.attch') }} :</label>
                                <input type="file" name="photos[]" value="{{ old('photos[]') }}" accept="image/*" multiple class="form-control" />
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success pull-right"
                        type="submit">{{__('trans.Student_submit')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
