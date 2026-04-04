@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border d-flex justify-content-between align-items-center">
                                <h3 class="box-title">User List</h3>
                                <a href="{{ route('users.add') }}" class="btn btn-success btn-md">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add User
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Role</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $userData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $userData->user_type }}</td>
                                                    <td>{{ $userData->name }}</td>
                                                    <td>{{ $userData->email }}</td>
                                                    <td>
                                                        @if(!in_array($userData->user_type, ['super_admin']))
                                                            <a href="{{ route('users.edit', $userData->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fa fa-edit mr-1"></i> Edit
                                                            </a>
                                                            <a href="{{ route('users.delete', $userData->id) }}"
                                                                class="btn btn-danger btn-sm" id="delete">
                                                                <i class="fa fa-trash mr-1"></i> Delete
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection