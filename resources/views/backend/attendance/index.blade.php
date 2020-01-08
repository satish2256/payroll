@extends('layouts.backend')
@section('title','List Attendance')
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
            <li class="active">List page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Attendance
                    <a href="{{route('attendance.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>

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
                    <table class="table table-bordered">
                    <tr>
                        <th>SN</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Timein</th>
                        <th>Timeout</th>
                        <th>status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['attendances'] == $data['attendances']->count() > 0 )

                        @foreach($data['attendances'] as $attendance)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{ $attendance->employee->name }}</td>
                                <td class="sorting_1">{{ $attendance->date }}</td>
                                <td class="sorting_1">{{ $attendance->timein }}</td>
                                <td class="sorting_1">{{ $attendance->timeout }}</td>
                                <td class="sorting_1">
                                    @if($attendance->status==1)
                                        <span class="label label-success">Present</span>
                                    @else
                                        <span class="label label-warning">Absent</span>
                                    @endif
                                </td>
                                <td>{{ date('j M Y', strtotime($attendance->created_at)) }} </td>
                                <td>
                                    <a class="btn btn-success"
                                       href="{{ route('attendance.show', ['id' => $attendance->id]) }}" title="View Details"><i
                                                class="glyphicon glyphicon-eye-open"></i></a>
                                    {!! Form::open(['route' => ['attendance.destroy', $attendance->id], 'data-id'=> $attendance->id, 'salary' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                    <button type="submit" title="Delete"><i
                                                class="btn btn-sm btn-block btn-danger glyphicon glyphicon-trash"></i></button>
                                    {!! Form::close() !!}

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
                        <th>Date</th>
                        <th>Timein</th>
                        <th>Timeout</th>
                        <th>status</th>
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
