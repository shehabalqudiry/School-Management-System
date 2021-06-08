<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = "{{ asset('assets/js') }}/";
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script type="text/javascript">
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('box1');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
            }
        }
    $(function(){
        $('#btn_delete_all').click(function(){
            var selected = new Array();
            $('#datatable input[type=checkbox]:checked').each(function(){
                selected.push(this.value);
            });

            if(selected.length > 0){
                $('#delete_all').modal('show');
                $('input[id="delete_all_id"]').val(selected);
            }
        })
    });
</script>

<script>
    $(document).ready(function () {
    $('select[name="grade_id"]').on('change', function () {
        var grade_id = $(this).val();
        if (grade_id) {
            $.ajax({
                url: "{{ URL::to('get_levels') }}/" + grade_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="level_id"]').empty();
                    $('select[name="level_id"]').append('<option selected disabled>{{__('trans.Choose')}}...</option>');
                    $.each(data, function (key, value) {
                        $('select[name="level_id"]').append('<option value="' + key + '">' + value + '</option>');
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
    $('select[name="level_id"]').on('change', function () {
        var level_id = $(this).val();
        if (level_id) {
            $.ajax({
                url: "{{ URL::to('get_sections') }}/" + level_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="section_id"]').empty();
                    $('select[name="section_id"]').append('<option selected disabled>{{__('trans.Choose')}}...</option>');
                    $.each(data, function (key, value) {
                        $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>

@livewireScripts
@toastr_js
@toastr_render
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
