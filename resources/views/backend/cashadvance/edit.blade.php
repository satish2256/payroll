@extends('layouts.backend')
@section('title','Edit CashAdvance')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           CashAdvance Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">CashAdvance</a></li>
            <li class="active">Edit page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit CashAdvance
                    <a href="{{route('cashadvance.index')}}"class="btn btn-info"><i class="fa fa-list"></i>List</a>
                    <a href="{{route('cashadvance.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
            @include('layouts.includes.error')
                @include('layouts.includes.flash')

                <div class="row"> {!! Form::model($data['cashadvance'],['route' => ['cashadvance.update',$data['cashadvance']->id], 'method' => 'PUT','files' => true]) !!}
                    @csrf
                    @include('backend.cashadvance.includes.main_form')
                    <!-- /.box-body -->
                    <div class="col-md-6">
                        <div class="box-footer fboxm">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check icheck"></i>Update </button>
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
