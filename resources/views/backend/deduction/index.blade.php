@extends('layouts.backend')
@section('title','List Deduction')
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
            <li class="active">List page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Deduction
                    <a href="{{route('deduction.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>

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
                @include('layouts.includes.flash')
                <table class="table table-bordered">
                    <thead>
                    <tr role="row">
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>CashAdvance</th>
                        <th>Pagibag</th>
                        <th>PhilHealth</th>
                        <th>ProjectIssues</th>
                        <th>SSS</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['deductions'] == $data['deductions']->count() > 0 )

                        @foreach($data['deductions'] as $deduction)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{$deduction->employee->name}}</td>
                                <td class="sorting_1">{{ $deduction->cashadvance_id }}</td>
                                <td class="sorting_1">{{ $deduction->pagibig }}</td>
                                <td class="sorting_1">{{ $deduction->philhealth }}</td>
                                <td class="sorting_1">{{ $deduction->projectissues }}</td>'
                                <td class="sorting_1">{{ $deduction->sss }}</td>
                                <td class="sorting_1">{{ $deduction->total_deduction }}</td>
                                <td class="sorting_1">
                                    @if($deduction->status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-warning">Deactive</span>
                                    @endif
                                </td>
                                <td>{{ date('j M Y', strtotime($deduction->created_at)) }} </td>
                                <td>
                                    <div class="bedit">
                                        <a class="btn btn-success"
                                           href="{{ route('deduction.show', ['id' => $deduction->id]) }}" title="View Details"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                        <a class="btn btn-warning"
                                           href="{{ route('deduction.edit', ['id' => $deduction->id]) }}" title="Edit"><i
                                                    class="glyphicon glyphicon-edit"></i></a>

                                        {!! Form::open(['route' => ['deduction.destroy', $deduction->id], 'data-id'=> $deduction->id, 'deduction' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                        <button type="submit" title="Delete"><i
                                                    class="btn btn-sm btn-block btn-danger glyphicon glyphicon-trash"></i></button>
                                        {!! Form::close() !!}

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Data Not Found</td>
                        </tr>
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>CashAdvance</th>
                        <th>Pagibag</th>
                        <th>PhilHealth</th>
                        <th>ProjectIssues</th>
                        <th>SSS</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
