@extends('layouts.backend')
@section('title','List Position')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Position Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Position</a></li>
            <li class="active">Create page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Position
                <a href="{{route('position.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['positions'] == $data['positions']->count() > 0 )

                        @foreach($data['positions'] as $position)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{ $position->name }}</td>
                                <td class="sorting_1">{{ $position->description }}</td>
                                <td class="sorting_1">
                                    @if($position->status==1)
                                        <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-warning">Deactive</span>
                                    @endif
                                </td>
                                <td>{{ date('j M Y', strtotime($position->created_at)) }} </td>
                                <td>
                                    <div class="bedit">
                                        <a class="btn btn-success"
                                           href="{{ route('position.show', ['id' => $position->id]) }}" title="View Details"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                        <a class="btn btn-warning"
                                           href="{{ route('position.edit', ['id' => $position->id]) }}" title="Edit"><i
                                                    class="glyphicon glyphicon-edit"></i></a>

                                        {!! Form::open(['route' => ['position.destroy', $position->id], 'data-id'=> $position->id, 'position' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
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
                        <th>Description</th>
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
