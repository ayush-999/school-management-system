@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('users.view') }}" class="waves-effect waves-light btn btn-outline btn-secondary btn-circle mt-2 btn-sm">
                    <span class="mdi mdi-arrow-left font-size-14">
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit <i>{{ $editData->name }}</i> profile</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('users.update', $editData->id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            User Role <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="user_type" id="user_type" required
                                                                class="form-control">
                                                                <option value="" selected="" disabled="">
                                                                    Select Role
                                                                </option>
                                                                <option value="super_admin" {{ $editData->user_type == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                                                <option value="admin" {{ $editData->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                                                <option value="user" {{ $editData->user_type == 'user' ? 'selected' : '' }}>User</option>
                                                                <option value="manager" {{ $editData->user_type == 'manager' ? 'selected' : '' }}>Manager</option>
                                                                <option value="employee" {{ $editData->user_type == 'employee' ? 'selected' : '' }}>Employee</option>
                                                                <option value="student" {{ $editData->user_type == 'student' ? 'selected' : '' }}>Student</option>
                                                                <option value="teacher" {{ $editData->user_type == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            Status <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="status" id="status" required class="form-control">
                                                                <option value="" selected="" disabled="">Select Status
                                                                </option>
                                                                <option value="active" {{ $editData->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                <option value="inactive" {{ $editData->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                <option value="blocked" {{ $editData->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
                                                                <option value="deactivated" {{ $editData->status == 'deactivated' ? 'selected' : '' }}>
                                                                    Deactivated</option>
                                                                <option value="activated" {{ $editData->status == 'activated' ? 'selected' : '' }}>Activated</option>
                                                                <option value="no_longer_available" {{ $editData->status == 'no_longer_available' ? 'selected' : '' }}>No Longer Available</option>
                                                                <option value="suspended" {{ $editData->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                                <option value="archived" {{ $editData->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                                                <option value="deleted" {{ $editData->status == 'deleted' ? 'selected' : '' }}>Deleted</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            User Name
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $editData->name }}" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            Email Field <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $editData->email }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Update" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </section>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        document.getElementById("show_user_password").addEventListener("change", function () {
            let passwordField = document.getElementById("user_password");

            if (this.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
@endsection