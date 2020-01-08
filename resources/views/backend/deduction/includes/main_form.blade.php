@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            var  path = "{{route('employee.cashadvance')}}"
            $('#employee_id').change(function(){
                var employee_id = $(this).val();
                // alert(employee_id);
                $.ajax({
                    url : path,
                    data:{'employee_id':employee_id,'_token': $('meta[name="csrf_token"]').attr('content')},
                    method:'post',
                    dataType:'text',
                    success:function (resp){
                        $('#cashadvance_id').val(resp);
                        // alert(resp);
                        console.log(resp);
                        // $('#cashadvance_id').empty();
                        // $('#cashadvance_id').append(resp);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {

            $('.calc').keyup(function(){
                // alert('ad');
                var cashadvance = parseInt($('#cashadvance_id').val());
                var pagibig = parseInt($('#pagibig').val());
                var philhealth = parseInt($('#philhealth').val());
                var projectissues = parseInt($('#projectissues').val());
                var sss = parseInt($('#sss').val());
                var total_deduction= cashadvance+pagibig+philhealth+projectissues+sss;
                $('#total_deduction').val(total_deduction);
            });
        });
    </script>
@endsection
<div class="box-body">
    <div class="form-group">
    {!! Form::label('employee_id', 'Employee Name') !!}<span class="mfield">*</span>
    {{Form::select("employee_id",$data['employees'], null,[ "class" => "form-control select2",
           "placeholder" => "Select employee","id"=>"employee_id"
        ])}}
    @include('layouts.includes.single_field_validation',['field' => 'employee_id'])
    </div>
    <div class="form-group">
        {!! Form::label('cashadvance_id', 'Cash Advance') !!}<span class="mfield">*</span>
        {!! Form::number('cashadvance_id',null, ["placeholder" => "Enter Cash Advance", "class" => "form-control calc","id"=>"cashadvance_id"]) !!}
        @include('layouts.includes.single_field_validation',['field' => 'cashadvance_id'])
    </div>

        <div class="form-group">
        {!! Form::label('pagibig', 'Pagibig') !!}<span class="mfield">*</span>
        {!! Form::number('pagibig',null, ["placeholder" => "Enter Pagibig Amount", "class" => "form-control calc","id"=>"pagibig"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'pagibig'])
    </div>
    <div class="form-group">
        {!! Form::label('philhealth', 'PhilHealth') !!}<span class="mfield">*</span>
        {!! Form::number('philhealth',null, ["placeholder" => "Enter PhilHealth", "class" => "form-control calc","id"=>"philhealth"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'philhealth'])
    </div>
    <div class="form-group">
        {!! Form::label('projectissues', 'ProjectIssues') !!}<span class="mfield">*</span>
        {!! Form::number('projectissues',null, ["placeholder" => "Enter ProjectIssues Amount", "class" => "form-control calc","id"=>"projectissues"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'projectissues'])
    </div>
    <div class="form-group">
        {!! Form::label('sss', 'SSS') !!}<span class="mfield">*</span>
        {!! Form::number('sss',null, ["placeholder" => "Enter SSS Amount", "class" => "form-control calc","id"=>"sss"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'sss'])
    </div>
    <div class="form-group">
        {!! Form::label('total_deduction', 'Total') !!}<span class="mfield">*</span>
        {!! Form::number('total_deduction',null, ["placeholder" => "Enter Total Amount", "class" => "form-control","id"=>"total_deduction"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'total_deduction'])
    </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Active </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Deactive </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
</div>

