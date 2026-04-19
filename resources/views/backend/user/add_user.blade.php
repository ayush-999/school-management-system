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
                                <h4 class="box-title">Add User</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('users.store') }}">
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
                                                                <option value="super_admin">Super Admin</option>
                                                                <option value="admin">Admin</option>
                                                                <option value="user">User</option>
                                                                <option value="manager">Manager</option>
                                                                <option value="employee">Employee</option>
                                                                <option value="student">Student</option>
                                                                <option value="teacher">Teacher</option>
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
                                                            <input type="text" name="name" class="form-control" required />
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
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group mb-3">
                                                        <h5>
                                                            User Password <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="password" id="user_password" name="password"
                                                                class="form-control" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="show_user_password"
                                                                class="filled-in chk-col-success">
                                                            <label for="show_user_password">Show Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Submit" />
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