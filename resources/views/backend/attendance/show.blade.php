@extends('layouts.backend')
@section('title','Show Attendance')

@section('content')

    <section class="content-header">
        <h1>
            Attendance Management
            <small>it all about class data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('attendance.index')}}">Attendance</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Attendance
                    <a href="{{route('attendance.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('attendance.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                                    @if($data['attendance']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Employee Name</th>
                                            <td>{{$data['attendance']->employee->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Date</th>
                                            <td>{{$data['attendance']->date}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Timein</th>
                                            <td>{{$data['attendance']->timein}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Timeout</th>
                                            <td>{{$data['attendance']->timeout}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>@if($data['attendance']->status===1)
                                                    <label class="label label-success">Present</label>
                                                @else
                                                    <label class="label label-danger">Absent</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['attendance']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['attendance']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['attendance']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>{{Auth::user($data['attendance']->updated_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['attendance.destroy', $data['attendance']->id], 'data-id'=> $data['attendance']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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

