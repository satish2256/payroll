    <div class="form-group">
        {!! Form::label('employee_id', 'Employee Name') !!}<span class="mfield">*</span>
        {{Form::select("employee_id",$data['employees'], null,[ "class" => "form-control select2",
               "placeholder" => "Select employee","id"=>"employee_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'employee_id'])
    </div>
    <div class="form-group">
        {!! Form::label('date', 'Date') !!}<span class="mfield">*</span>
        {!! Form::date('date',null, ["placeholder" => "Enter Date", "class" => "form-control","id"=>"date"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'date'])
    </div>
    <div class="form-group">
        {!! Form::label('timein', 'Timein') !!}<span class="mfield">*</span>
        {!! Form::time('timein',null, ["placeholder" => "Enter Timein", "class" => "form-control","id"=>"timein"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'timein'])
    </div>
    <div class="form-group">
        {!! Form::label('timeout', 'Timeout') !!}<span class="mfield">*</span>
        {!! Form::time('timeout',null, ["placeholder" => "Enter Timeout", "class" => "form-control","id"=>"timeout"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'timeout'])
    </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Present </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Absent </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
