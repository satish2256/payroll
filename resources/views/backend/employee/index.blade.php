@extends('layouts.backend')
@section('title','List Employee')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Employee Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Employee</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Employee
                <a href="{{route('employee.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @if($data['employees'] == $data['employees']->count() > 0 )

                                    @foreach($data['employees'] as $employee)
                                        <tr role="row" class="odd">
                                            <td>{{ $i++ }}</td>
                                            <td class="sorting_1">{{ $employee->name }}</td>
                                            <td class="sorting_1">{{ $employee->email }}</td>
                                            <td class="sorting_1">{{ $employee->phone }}</td>
                                            <td class="sorting_1">{{ $employee->address }}</td>
                                            <td class="sorting_1">{{ $employee->username }}</td>
                                            <td class="sorting_1">
                                                @if($employee->status==1)
                                                    <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-warning">Deactive</span>
                                                @endif
                                            </td>
                                            <td class="sorting_1">
                                                @if($employee->gender==1)
                                                    <span class="label label-success">Male</span>
                                                @else
                                                    <span class="label label-warning">Female</span>
                                                @endif
                                            </td>
                                            <td>{{ date('j M Y', strtotime($employee->created_at)) }} </td>
                                            <td>
                                                <div class="bedit">
                                                    <a class="btn btn-success"
                                                       href="{{ route('employee.show', ['id' => $employee->id]) }}" title="View Details"><i
                                                                class="glyphicon glyphicon-eye-open"></i></a>
                                                    <a class="btn btn-warning"
                                                       href="{{ route('employee.edit', ['id' => $employee->id]) }}" title="Edit"><i
                                                                class="glyphicon glyphicon-edit"></i></a>

                                                    {!! Form::open(['route' => ['employee.destroy', $employee->id], 'data-id'=> $employee->id, 'employee' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                                    <button type="submit" title="Delete" class="btn btn-adn btn-danger"><i
                                                                class=" glyphicon glyphicon-trash"></i></button>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>

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
