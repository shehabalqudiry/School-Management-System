@extends('layouts.master')
@section('css')
@section('title')
{{trans('trans.Student_information')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{trans('trans.Student_information')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02"
                                    aria-selected="true">{{trans('trans.Student_information')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02" role="tab"
                                    aria-controls="profile-02" aria-selected="false">{{trans('trans.attch')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{trans('trans.Student_Name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{trans('trans.Email')}}</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">{{trans('trans.Student_Gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{trans('trans.Nationality')}}</th>
                                            {{-- <td>{{$student->gender->name}}</td> --}}
                                            <td>{{$student->nationality->name}}</td>
                                            {{-- @dd($student->sparents) --}}
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('trans.Grade')}}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{trans('trans.Levels_Name')}}</th>
                                            <td>{{$student->level->name}}</td>
                                            <th scope="row">{{trans('trans.Section')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{trans('trans.Date_of_Birth')}}</th>
                                            <td>{{ $student->date_birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('trans.parent')}}</th>
                                            <td>{{ $student->sparents->name_father}}</td>
                                            {{-- <td>{{ $student->academic_year }}</td> --}}
                                            <th scope="row">{{trans('trans.academic_year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{route('Upload_attachment')}}"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="photos">{{trans('trans.attch')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <input type="hidden" name="student_name" value="{{$student->name}}">
                                                    <input type="hidden" name="student_id" value="{{$student->id}}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{trans('trans.Student_submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover"
                                        style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('trans.filename')}}</th>
                                                <th scope="col">{{trans('trans.created_at')}}</th>
                                                <th scope="col">{{trans('trans.Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($student->images as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attachment->filename}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href="{{route('download_attachment', ['studentname'=>$attachment->imageable->name, 'filename'=> $attachment->filename])}}"
                                                        role="button"><i class="fas fa-download"></i>&nbsp;
                                                        {{trans('trans.Download')}}</a>

                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_img{{ $attachment->id }}"
                                                        title="{{ trans('trans.Student_Delete') }}">{{trans('trans.Student_Delete')}}
                                                    </button>

                                                </td>
                                            </tr>
                                            @include('pages.students.delete_img')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@endsection
