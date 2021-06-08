@extends('layouts.master') @section('css') @section('title')
{{ __("trans.Sections") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __("trans.Sections_PageTitle") }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">
                    <a href="/" class="default-color">{{ __("trans.Home") }}</a>
                </li>
                <li class="breadcrumb-item active">{{ __("trans.Sections") }}</li>
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
                    {{ __("trans.Sections_add") }}
                </button>
                <br /><br />
                <div class="accordion gray plus-icon round">
                    @foreach ($grades as $grade)
                    <div class="acd-group">
                        <a class="acd-heading">{{ $grade->name }}</a>
                        <div class="acd-des">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered p-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __("trans.Sections_Name") }}</th>
                                            <th>{{ __("trans.Levels_Name") }}</th>
                                            <th>{{ __("trans.Sections_Status") }}</th>
                                            <th>{{ __("trans.Sections_Actions") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($grade->sections as $section)

                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $section->name }}</td>
                                            <td>{{ $section->level->name }}</td>
                                            <td>
                                                @if($section->status == 1)
                                                <label class="badge bg-success text-light">نشط</label>
                                                @else
                                                <label class="badge bg-danger text-light">معطل</label>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $section->id }}"
                                                    title="{{ __('trans.Sections_edit') }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $section->id }}"
                                                    title="{{ __('trans.Sections_delete') }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __("trans.Sections_edit") }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('sections.update', $section->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-check">
                                                                <input class="form-check-input" id="flexCheckChecked" type="checkbox" @if ($section->status == 1) checked
                                                                @endif name="status">
                                                                <label for="flexCheckChecked" class="form-check-label">{{ __('trans.Sections_Status') }}</label>
                                                            </div>
                                                            <br /><br />
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="name"
                                                                        class="mr-sm-2">{{ __("trans.Section_name_ar") }}
                                                                        :
                                                                    </label>
                                                                    <input type="text" id="name"
                                                                        value="{{ $section->getTranslation('name', 'ar') }}"
                                                                        name="name" class="form-control" required />
                                                                </div>
                                                                <div class="col">
                                                                    <label for="name_en"
                                                                        class="mr-sm-2">{{ __("trans.Section_name_en") }}
                                                                        :
                                                                    </label>
                                                                    <input type="text" id="name_en"
                                                                        value="{{ $section->getTranslation('name', 'en') }}"
                                                                        name="name_en" class="form-control" required />
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <label
                                                                        class="mr-sm-2">{{ __('trans.Sections_Grade') }}
                                                                        : </label>
                                                                    <select name="grade_id"
                                                                        class="form-control form-control-lg" required
                                                                        onchange="console.log($(this).val())">
                                                                        <option value="" selected disabled>--
                                                                            {{ __("trans.Grades_list") }} --</option>
                                                                        @foreach ($list_grades as $grade)
                                                                        <option @if($grade->id == $section->grade_id)
                                                                            selected @endif
                                                                            value="{{ $grade->id }}">{{ $grade->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2 mb-3">
                                                                <div class="col">
                                                                    <label
                                                                        class="mr-sm-2">{{ __('trans.Sections_Level') }}
                                                                        : </label>
                                                                    <select name="level_id"
                                                                        class="form-control form-control-lg" required>
                                                                        <option value="{{ $section->level->id }}">
                                                                            {{ $section->level->name }}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="inputName" class="control-label">{{ trans('trans.Teacher_Name') }}</label>
                                                                    <select multiple name="teacher_id[]" class="form-control" id="inputName">
                                                                        @foreach($section->teachers as $teacher)
                                                                        <option selected value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                        @endforeach
                                                                        @foreach($teachers as $teacher)
                                                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                    {{ __("trans.Sections_Close") }}
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    {{ __("trans.Sections_submit") }}
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __("trans.Sections_delete") }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ __("trans.Sections_Warning") }}
                                                        <form action="{{ route('sections.destroy', $section->id) }}"
                                                            method="post">
                                                            @csrf @method('DELETE')
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">
                                                                    {{ __("trans.Sections_Close") }}
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">
                                                                    {{ __("trans.Sections_Delete")  }}
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Create --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('trans.Sections_add') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.store') }}" method="post">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" id="flexCheckChecked" type="checkbox" name="status">
                        <label for="flexCheckChecked" class="form-check-label">{{ __('trans.Sections_Status') }}</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="mr-sm-2">{{ __('trans.Section_name_ar') }} : </label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col">
                            <label for="name_en" class="mr-sm-2">{{ __('trans.Section_name_en') }} : </label>
                            <input type="text" id="name_en" name="name_en" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label class="mr-sm-2">{{ __('trans.Sections_Grade') }} : </label>
                            <select name="grade_id" class="form-control form-control-lg" required
                                onchange="console.log($(this).val())">
                                <option value="" selected disabled>-- {{ __("trans.Grades_list") }} --</option>
                                @foreach ($list_grades as $g)
                                <option value="{{ $g->id }}">{{ $g->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2 mb-3">
                        <div class="col">
                            <label class="mr-sm-2">{{ __('trans.Sections_Level') }} : </label>
                            <select name="level_id" class="form-control form-control-lg" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputName" class="control-label">{{ trans('trans.Teacher_Name') }}</label>
                            <select multiple name="teacher_id[]" class="form-control" id="inputName">
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('trans.Sections_Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('trans.Sections_submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="grade_id"]').on('change', function(){
            var grade_id = $(this).val();
            if(grade_id){
                $.ajax({
                    url: "{{ URL::to('levels/list') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="level_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="level_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                })
            } else {
                console.log("Error From Ajax")
            }
        });
    });
</script>
@endsection
@endsection
