@extends('layouts.backend')
@section('title','View Deduction')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Deduction Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Deduction</a></li>
            <li class="active">View page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">View Deduction
                <a href="{{route('deduction.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>
                <a href="{{route('deduction.index')}}"class="btn btn-success"><i class="fa fa-list"></i>List</a>

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
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info">
                                @if($data['deduction']->count() == 0 )
                                    <tr>
                                        <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                    </tr>
                                @else
                                    <tr>
                                        <th width="25%">CashAdvance Amount</th>
                                        <td>{{$data['deduction']->cashadvance_id}}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Pagibig</th>
                                        <td>{{$data['deduction']->pagibig}}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">PhilHealth</th>
                                        <td>{{$data['deduction']->philhealth}}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">ProjectIssues</th>
                                        <td>{{$data['deduction']->projectissues}}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">SSS</th>
                                        <td>{{$data['deduction']->sss}}</td>
                                    </tr>
                                    <tr>
                                        <th width="25%">Total</th>
                                        <td>{{$data['deduction']->total_deduction}}</td>
                                    </tr>
                                        <th>Created at</th>
                                        <td>{{ date('D, j M Y', strtotime($data['deduction']->created_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated at</th>
                                        <td>{{ date('D, j M Y', strtotime($data['deduction']->updated_at)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created By</th>
                                        <td>{{Auth::user($data['deduction']->created_by)->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated By</th>
                                        <td>{{Auth::user($data['deduction']->updated_by)->name}}</td>
                                    </tr>
                                    <tr>

                                        <td><a class="cust_btm btn btn-block btn-warning"
                                               href="{{ route('deduction.edit', ['id' => $data['deduction']->id]) }}"><i
                                                        class="glyphicon glyphicon-edit"></i>Edit</a>
                                        </td>


                                        <td class="custom_btn_delete">
                                            {!! Form::open(['route' => ['deduction.destroy', $data['deduction']->id], 'data-id'=> $data['deduction']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
