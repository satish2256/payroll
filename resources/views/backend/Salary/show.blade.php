@extends('layouts.backend')
@section('title','Show Salary')

@section('content')

    <section class="content-header">
        <h1>
            Salary Management
            <small>it all about class data</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('salary.index')}}">Salary</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Show Salary
                    <a href="{{route('salary.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>Create</a>
                    <a href="{{route('salary.index')}}" class="btn btn-info"><i class="fa fa-list"></i>List</a>
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
                                    @if($data['salary']->count() == 0 )
                                        <tr>
                                            <td class="bg bg-danger" colspan="2">Invalid Data</td>

                                        </tr>
                                    @else
                                        <tr>
                                            <th width="25%">Deduction Amount</th>
                                            <td>{{$data['salary']->deduction_id}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Medical Allowance</th>
                                            <td>{{$data['salary']->medical_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Dareness Allowance</th>
                                            <td>{{$data['salary']->dearness_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Travel Allowance</th>
                                            <td>{{$data['salary']->travelling_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">House Rent Allowance</th>
                                            <td>{{$data['salary']->house_rent_allowance}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Basic</th>
                                            <td>{{$data['salary']->basic}}</td>
                                        </tr>
                                        <tr>
                                            <th width="25%">Bonus</th>
                                            <td>{{$data['salary']->bonus}}</td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td>@if($data['salary']->status===1)
                                                    <label class="label label-success">Active</label>
                                                @else
                                                    <label class="label label-danger">De Active</label>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['salary']->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ date('D, j M Y', strtotime($data['salary']->updated_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{Auth::user($data['salary']->created_by)->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>{{Auth::user($data['salary']->updated_by)->name}}</td>
                                        </tr>
                                        <tr>

                                            <td><a class="cust_btm btn btn-block btn-warning"
                                                   href="{{ route('salary.edit', ['id' => $data['salary']->id]) }}"><i
                                                            class="glyphicon glyphicon-edit"></i>Edit</a>
                                            </td>


                                            <td class="custom_btn_delete">
                                                {!! Form::open(['route' => ['salary.destroy', $data['salary']->id], 'data-id'=> $data['salary']->id, 'class' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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

