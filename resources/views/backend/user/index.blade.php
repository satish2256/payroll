@extends('layouts.backend')
@section('title','List User')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">List page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List User
                    <a href="{{route('user.create')}}"class="btn btn-info"><i class="fa fa-plus"></i>create</a>

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i = 1; @endphp
                    @if($data['users'] == $data['users']->count() > 0 )

                        @foreach($data['users'] as $user)
                            <tr role="row" class="odd">
                                <td>{{ $i++ }}</td>
                                <td class="sorting_1">{{ $user->name }}</td>
                                <td class="sorting_1">{{ $user->email }}</td>
                                <td>{{ date('j M Y', strtotime($user->created_at)) }} </td>
                                <td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->id != $user->id)
                                        {!! Form::open(['route' => ['user.destroy', $user->id], 'data-id'=> $user->id, 'employee' => 'registration-delete', 'onsubmit' => 'handleTypeDelete(event)', 'method' => 'delete']) !!}
                                        <button type="submit" title="Delete"><i
                                                    class="btn btn-sm btn-block btn-danger glyphicon glyphicon-trash"></i></button>
                                        {!! Form::close() !!}
                                    @endif
                                        <a class="btn btn-success"
                                           href="{{ route('user.show', ['id' => $user->id]) }}" title="View Details"><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                        <a class="btn btn-warning"
                                           href="{{ route('user.edit', ['id' => $user->id]) }}" title="Edit"><i
                                                    class="glyphicon glyphicon-edit"></i></a>
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
