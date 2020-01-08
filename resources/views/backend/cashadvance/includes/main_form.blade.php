<div class="box-body">
    <div class="form-group">
    {!! Form::label('employee_id', 'Employee') !!}<span class="mfield">*</span>
    {{Form::select("employee_id",$data['employees'], null,[ "class" => "form-control select2",
           "placeholder" => "Select Employee","id"=>"employee_id"
        ])}}
    @include('layouts.includes.single_field_validation',['field' => 'employee_id'])
    </div>
    <div class="form-group">
        {!! Form::label('date_advance', 'Advance Date') !!}<span class="mfield">*</span>
        {!! Form::date('date_advance',null, ["placeholder" => "Enter Advance Date", "class" => "form-control","id"=>"date_advance"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'date_advance'])
    </div>
    <div class="form-group">
        {!! Form::label('amount', 'Amount') !!}<span class="mfield">*</span>
        {!! Form::number('amount',null, ["placeholder" => "Enter Amount", "class" => "form-control","id"=>"amount"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'amount'])
    </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Active </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Deactive </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
</div>
