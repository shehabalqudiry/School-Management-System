@extends('layouts.master')
@section('css')

@section('title')
{{ __('trans.Teacher_Edit') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('trans.Teacher_Edit') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('trans.Home') }}</a></li>
                <li class="breadcrumb-item active">{{ __('trans.Teacher_Edit') }}</li>
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
                <form action="{{ route('teachers.update', 'test') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $teacher->id }}">
                    {{ method_field('patch') }}
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="email">{{ __('trans.Email') }}</label>
                            <input class="form-control" value="{{ $teacher->email }}" name="email" type="text"
                                placeholder="{{ __('trans.Email') }}" />
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="password">{{ __('trans.Password') }}</label>
                            <input class="form-control" value="{{ $teacher->password }}" name="password" type="password"
                                placeholder="{{ __('trans.Password') }}" />
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="teacher_name_ar">{{ __('trans.Teacher_name_ar') }}</label>
                            <input class="form-control" value="{{ $teacher->getTranslation('name', 'ar') }}" type="text" placeholder="{{ __('trans.Teacher_name_ar') }}"
                                name="name" />
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="teacher_name_en">{{ __('trans.Teacher_name_en') }}</label>
                            <input class="form-control" value="{{ $teacher->getTranslation('name', 'en') }}" type="text" placeholder="{{ __('trans.Teacher_name_en') }}"
                                name="name_en" />
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="specialization_id">{{ __('trans.Teacher_Spec') }}</label>
                            <select name="specialization_id" class="form-control form-control-lg">
                                @foreach ($specs as $spec)
                                <option @if($teacher->specialization_id == $spec->id) selected @endif value="{{ $spec->id }}">{{ $spec->name }}</option>
                                @endforeach
                            </select>
                            @error('specialization_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="gender_id">{{ __('trans.Teacher_Gender') }}</label>
                            <select name="gender_id" class="form-control form-control-lg">
                                @foreach ($genders as $gender)
                                <option @if($teacher->gender_id == $gender->id) selected @endif value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="joining_date">{{ __('trans.Teacher_Join') }}</label>
                            <input class="form-control" value="{{ $teacher->joining_date }}" type="date" name="joining_date" />
                            @error('joining_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="address">{{ __('trans.Address') }}</label>
                            <textarea class="form-control" placeholder="{{ __('trans.Address') }}"
                                name="address">{{ $teacher->address }}</textarea>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('trans.Teacher_Edit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
