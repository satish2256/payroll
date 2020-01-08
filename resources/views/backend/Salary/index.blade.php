@extends('layouts.backend')
@section('title','List Salary')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Salary Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Salary</a></li>
            <li class="active">Create page</li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Salary
                <a href="{{route('salary.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>
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
                            @include('layouts.includes.flash')
                            <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr role="row">
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>Basic</th>
                        <th>Deduction Amount</th>
                        <th>Medical Allowance</th>
                        <th>Dareness Allowance</th>
                        <th>Travel Allowance</th>
                        <th>House Rent Allowance</th>
                        <th>Bonus</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['salaries'] == $data['salaries']->count() > 0 )

                        @foreach($data['salaries'] as $salary)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{$salary->employee->name}}</td>
                                <td class="sorting_1">{{ $salary->basic }}</td>
                                <td class="sorting_1">{{ $salary->deduction_id }}</td>
                                <td class="sorting_1">{{ $salary->medical_allowance }}</td>
                                <td class="sorting_1">{{ $salary->dearness_allowance }}</td>
                                <td class="sorting_1">{{ $salary->travelling_allowance }}</td>
                                <td class="sorting_1">{{ $salary->house_rent_allowance }}</td>
                                <td class="sorting_1">{{ $salary->bonus }}</td>
                                <td class="sorting_1">{{ $salary->total_amount }}</td>
                                <td class="sorting_1">
                                    @if($salary->status==1)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-warning">Deactive</span>
                                    @endif
                                </td>
                                <td>{{ date('j M Y', strtotime($salary->created_at)) }} </td>
                                <td>
                                    <div class="bedit">
                                        <a class="btn btn-success"
                                           href="{{ route('salary.show', ['id' => $salary->id]) }}" title="View Details"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                        <a class="btn btn-warning"
                                           href="{{ route('salary.edit', ['id' => $salary->id]) }}" title="Edit"><i
                                                    class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ route('user.print', ['id' => $salary->id])}}" target="_blank"  class="btn btn-success"><i class="fa fa-print"></i>Payroll</a>

                                        {!! Form::open(['route' => ['salary.destroy', $salary->id], 'data-id'=> $salary->id, 'salary' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                        <button type="submit"  title="Delete"><i
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
                    <tr role="row">
                        <th>SN</th>
                        <th width="5%">Employee Name</th>
                        <th>Basic</th>
                        <th>Deduction Amount</th>
                        <th>Medical Allowance</th>
                        <th>Dareness Allowance</th>
                        <th>Travel Allowance</th>
                        <th>House Rent Allowance</th>
                        <th>Bonus</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th width="20%">Action</th>
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
@section('js')
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/alert.min.js') }}"></script>
    <script src="{{ asset('backend/js/alert.custom.js') }}"></script>
    <script src="{{ asset('backend/js/general.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

    </script>
@endsection
