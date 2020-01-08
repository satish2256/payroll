@extends('layouts.backend')
@section('title','Create Attendance')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Attendance Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Attendance</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Attendance
                    <a href="{{route('attendance.index')}}"class="btn btn-success"><i class="fa fa-list"></i>List</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="row"> {!! Form::open(['route' => 'attendance.store', 'method' => 'POST','files' => true]) !!}
                @csrf
                <div class="col-md-12">
                @include('backend.attendance.includes.main_form')
                <!-- /.box-body -->

                    <div class="box-footer fboxm">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Save </button>
                        <button type="reset" class="btn btn-warning"><i class="fa fa-undo icheck"></i>cancel</button>
                    </div>
                </div>

            {!! Form::close() !!}
            <!--/.col (right) -->
            </div>
        </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
