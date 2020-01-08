<div class="box-body">
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}<span class="mfield">*</span>
        {!! Form::text('name',null, ["placeholder" => "Enter Name", "class" => "form-control","id"=>"name"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'name'])
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}<span class="mfield">*</span>
        {!! Form::text('email',null, ["placeholder" => "Enter Email", "class" => "form-control","id"=>"email"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'email'])
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone') !!}<span class="mfield">*</span>
        {!! Form::number('phone',null, ["placeholder" => "Enter Phone", "class" => "form-control","id"=>"phone"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'phone'])
    </div>
    <div class="form-group">
        {!! Form::label('head_of_department', 'Head of Department') !!}<span class="mfield">*</span>
        {!! Form::text('head_of_department',null, ["placeholder" => "Enter Head of Department", "class" => "form-control","id"=>"head_of_department"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'head_of_department'])
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}<span class="mfield">*</span>
        {!! Form::text('description',null, ["placeholder" => "Enter Description", "class" => "form-control","id"=>"description"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'description'])
    </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Active </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Deactive </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
</div>
