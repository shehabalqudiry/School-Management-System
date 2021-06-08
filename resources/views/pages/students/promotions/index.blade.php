@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{__('trans.Student_Promotion')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{__('trans.Student_Promotion')}}
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

                <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                <form method="post" action="{{ route('promotions.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{__('trans.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="grade_id" required>
                                <option selected disabled>{{__('trans.Choose')}}...</option>
                                @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="level_id">{{__('trans.Levels')}} : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="level_id" required>

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{__('trans.Section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id" required>

                            </select>
                        </div>
                        <div class="form-group col">
                            <div class="form-group">
                                <label for="academic_year">{{__('trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++) <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{__('trans.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="grade_id_new">
                                <option selected disabled>{{__('trans.Choose')}}...</option>
                                @foreach($grades as $grade)
                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="level_id">{{__('trans.Levels')}}: <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="level_id_new">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="section_id">:{{__('trans.Section')}} </label>
                            <select class="custom-select mr-sm-2" name="section_id_new">

                            </select>
                        </div>
                        <div class="form-group col">
                            <div class="form-group">
                                <label for="academic_year_new">{{__('trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year_new">
                                    <option selected disabled>{{__('trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('trans.Student_submit') }}</button>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
    $('select[name="grade_id_new"]').on('change', function () {
        var grade_id = $(this).val();
        if (grade_id) {
            $.ajax({
                url: "{{ URL::to('get_levels') }}/" + grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="level_id_new"]').empty();
                    $('select[name="level_id_new"]').append('<option selected disabled>{{__('trans.Choose')}}...</option>');
                    $.each(data, function (key, value) {
                        $('select[name="level_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>


<script>
    $(document).ready(function () {
    $('select[name="level_id_new"]').on('change', function () {
        var level_id = $(this).val();
        if (level_id) {
            $.ajax({
                url: "{{ URL::to('get_sections') }}/" + level_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id_new"]').empty();
                    $('select[name="section_id_new"]').append('<option selected disabled>{{__('trans.Choose')}}...</option>');
                    $.each(data, function (key, value) {
                        $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>
@endsection
