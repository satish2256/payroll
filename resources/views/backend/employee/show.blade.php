@extends('layouts.backend')
@section('title','Show Employee')

@section('content')

    <section class="content-header">
        <h1>
            Employee Management
            <small>it all about class data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('employee.index')}}">Employee</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Employee
                    <a href="{{route('employee.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('employee.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            @include('layouts.includes.flash')
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Details of Exam Types</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                       aria-describedby="example1_info">
                                    @if($data['employee']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Name</th>
                                            <td>{{$data['employee']->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Phone</th>
                                            <td>{{$data['employee']->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Email</th>
                                            <td>{{$data['employee']->email}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Address</th>
                                            <td>{{$data['employee']->address}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">UserName</th>
                                            <td>{{$data['employee']->username}}</td>
                                        </tr>

                                        <tr>
                                            <th>Gender</th>
                                            <td>@if($data['employee']->gender===1)
                                                    <label class="label label-success">Male</label>
                                                @else
                                                    <label class="label label-danger">Female</label>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td>@if($data['employee']->status===1)
                                                    <label class="label label-success">Active</label>
                                                @else
                                                    <label class="label label-danger">De Active</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['employee']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['employee']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['employee']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>{{Auth::user($data['employee']->updated_by)->name}}</td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('employee.edit', ['id' => $data['employee']->id]) }}"><i
                                                            class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['employee.destroy', $data['employee']->id], 'data-id'=> $data['employee']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                <button type="submit" title="Delete"><i
                                                            class="btn btn-sm btn-block btn-danger glyphicon glyphicon-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>

                                            <script src="{{ asset('backend/js/general.js') }}"></script>
                                        </tr>

                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
@endsection

