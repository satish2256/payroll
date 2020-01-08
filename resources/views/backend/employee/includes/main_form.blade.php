<div class="box-body">
    <div class="form-group">
        {!! Form::label('department_id', 'Department') !!}<span class="mfield">*</span>
        {{Form::select("department_id",$data['departments'], null,[ "class" => "form-control select2",
               "placeholder" => "Select departments","id"=>"department_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'department_id'])
    </div>
    <div class="form-group">
        {!! Form::label('position_id','Position') !!}<span class="mfield">*</span>
        {{Form::select("position_id",$data['positions'], null,[ "class" => "form-control select2",
               "placeholder" => "Select Position","id"=>"position_id"
            ])}}
        @include('layouts.includes.single_field_validation',['field' => 'position'])
    </div>
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
        {!! Form::label('address', 'Address') !!}<span class="mfield">*</span>
        {!! Form::text('address',null, ["placeholder" => "Enter Address", "class" => "form-control","id"=>"address"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'address'])
    </div>
    <div class="form-group">
        {!! Form::label('username', 'Username') !!}<span class="mfield">*</span>
        {!! Form::text('username',null, ["placeholder" => "Enter Username", "class" => "form-control","id"=>"username"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'username'])
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}<span class="mfield">*</span><br>
        {!! Form::password('password',null, ["placeholder" => "Enter Password", "class" => "form-control","id"=>"password"]) !!}
        @include('layouts.includes.single_field_validation',['field'=>'password'])
    </div>
    <div class="form-group"> {!! Form::label('gender', 'Gender',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('gender', 1, true) !!}Male </label>
        <label class="radio-inline"> {!! Form::radio('gender', 0, false) !!}Female </label>
        @include('layouts.includes.single_field_validation',['field' => 'gender'])
    </div>
    <div class="form-group"> {!! Form::label('status', 'Status',["class" => "radiostatus"]) !!}<br>
        <label class="radio-inline"> {!! Form::radio('status', 1, true) !!}Active </label>
        <label class="radio-inline"> {!! Form::radio('status', 0, false) !!}Deactive </label>
        @include('layouts.includes.single_field_validation',['field' => 'status'])
    </div>
</div>
