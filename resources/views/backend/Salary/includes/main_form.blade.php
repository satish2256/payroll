@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            var  path = "{{route('employee.deduction')}}"
            $('#employee_id').change(function(){
                var employee_id = $(this).val();
                // alert(employee_id);
                $.ajax({
                    url : path,
                    data:{'employee_id':employee_id,'_token': $('meta[name="csrf_token"]').attr('content')},
                    method:'post',
                    dataType:'text',
                    success:function (resp){
                        $('#deduction_id').val(resp);
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
                var basic = parseInt($('#basic').val());
                var deduction = parseInt($('#deduction_id').val());
                var medical_allowance = parseInt($('#medical_allowance').val());
                var dearness_allowance = parseInt($('#dearness_allowance').val());
                var travelling_allowance = parseInt($('#travelling_allowance').val());
                var house_rent_allowance = parseInt($('#house_rent_allowance').val());
                var bonus = parseInt($('#bonus').val());
                var total_amount= basic-deduction+medical_allowance+dearness_allowance+travelling_allowance+house_rent_allowance+bonus;
                $('#total_amount').val(total_amount);
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
            {!! Form::label('basic', 'Basic Salary') !!}<span class="mfield">*</span>
            {!! Form::number('basic',null, ["placeholder" => "Enter Basic Salary Amount", "class" => "form-control calc","id"=>"basic"]) !!}
            @include('layouts.includes.single_field_validation',['field'=>'basic'])
        </div>
    <div class="form-group">
        {!! Form::label('deduction_id', 'Deduction') !!}<span class="mfield">*</span>
        {!! Form::number('deduction_id',null, ["placeholder" => "Enter Deduction Amount", "class" => "form-control calc","id"=>"deduction_id"]) !!}
        @include('layouts.includes.single_field_validation',['field' => 'deduction_id'])
    </div>
    <div class="form-group">
        {!! Form::label('medical_allowance', 'Medical Allowance') !!}<span class="mfield">*</span>
        {!! Form::number('medical_allowance',null, ["placeholder" => "Enter Medical Allowance Amount", "class" => "form-control calc","id"=>"medical_allowance"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'medical_allowance'])
    </div>
    <div class="form-group">
        {!! Form::label('dearness_allowance', 'Dearness Allowance') !!}<span class="mfield">*</span>
        {!! Form::number('dearness_allowance',null, ["placeholder" => "Enter Dearness Allowance Amount", "class" => "form-control calc","id"=>"dearness_allowance"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'dearness_allowance'])
    </div>
    <div class="form-group">
        {!! Form::label('travelling_allowance', 'Travelling Allowance') !!}<span class="mfield">*</span>
        {!! Form::number('travelling_allowance',null, ["placeholder" => "Enter Travelling Allowance Amount", "class" => "form-control calc","id"=>"travelling_allowance"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'travelling_allowance'])
    </div>
    <div class="form-group">
        {!! Form::label('house_rent_allowance', 'House Rent Allowance') !!}<span class="mfield">*</span>
        {!! Form::number('house_rent_allowance',null, ["placeholder" => "Enter House Rent Allowance Amount", "class" => "form-control calc","id"=>"house_rent_allowance"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'house_rent_allowance'])
    </div>
    <div class="form-group">
        {!! Form::label('bonus', 'Bonus') !!}<span class="mfield">*</span>
        {!! Form::number('bonus',null, ["placeholder" => "Enter Bonus Amount", "class" => "form-control calc","id"=>"bonus"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'bonus'])
    </div>
        <div class="form-group">
            {!! Form::label('total_amount', 'Total') !!}<span class="mfield">*</span>
            {!! Form::number('total_amount',null, ["placeholder" => "Enter Total Amount", "class" => "form-control","id"=>"total_amount"]) !!}
            @include('layouts.includes.single_field_validation',['field'=>'total_amount'])
        </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Active </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Deactive </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
</div>