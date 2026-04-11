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
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $userData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if ($userData->user_type == 'super_admin')
                                                            <span class="badge badge-danger">Super Admin</span>
                                                        @elseif ($userData->user_type == 'admin')
                                                            <span class="badge badge-success">Admin</span>
                                                        @elseif ($userData->user_type == 'user')
                                                            <span class="badge badge-primary">User</span>
                                                        @elseif ($userData->user_type == 'manager')
                                                            <span class="badge badge-info">Manager</span>
                                                        @elseif ($userData->user_type == 'employee')
                                                            <span class="badge badge-warning">Employee</span>
                                                        @elseif ($userData->user_type == 'student')
                                                            <span class="badge badge-secondary">Student</span>
                                                        @elseif ($userData->user_type == 'teacher')
                                                            <span class="badge badge-dark">Teacher</span>
                                                        @else
                                                            <span class="badge badge-secondary">{{ $userData->user_type ?? 'N/A' }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $userData->name }}</td>
                                                    <td>{{ $userData->email }}</td>
                                                    <td>
                                                        @if($userData->status == 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @elseif($userData->status == 'inactive')
                                                            <span class="badge badge-secondary">Inactive</span>
                                                        @elseif($userData->status == 'blocked')
                                                            <span class="badge badge-danger">Blocked</span>
                                                        @elseif($userData->status == 'suspended')
                                                            <span class="badge badge-warning">Suspended</span>
                                                        @elseif($userData->status == 'deactivated')
                                                            <span class="badge badge-info">Deactivated</span>
                                                        @elseif($userData->status == 'archived')
                                                            <span class="badge badge-dark">Archived</span>
                                                        @else
                                                            <span class="badge badge-secondary">{{ $userData->status ?? 'N/A' }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="admin-table-btn-wrapper">
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