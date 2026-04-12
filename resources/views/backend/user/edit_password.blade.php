@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('profile.view') }}" class="btn btn-outline btn-secondary mt-2 btn-sm">
                    <i class="fa fa-arrow-left mr-2"></i> Back
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Change Password</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            Current Password
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="password" name="oldpassword"
                                                                id="current_password" class="form-control" />
                                                            @error('oldpassword')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            New Password
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="password" name="password" id="password"
                                                                class="form-control"/>
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            Confirm New Password
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="password" name="password_confirmation"
                                                                id="password_confirmation" class="form-control"/>
                                                            @error('password_confirmation')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="show_all_passwords"
                                                                class="filled-in chk-col-success">
                                                            <label for="show_all_passwords">Show Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Update Password" />
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
        document.getElementById("show_all_passwords").addEventListener("change", function () {
            let currentPasswordField = document.getElementById("current_password");
            let newPasswordField = document.getElementById("password");
            let confirmPasswordField = document.getElementById("password_confirmation");

            if (this.checked) {
                currentPasswordField.type = "text";
                newPasswordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                currentPasswordField.type = "password";
                newPasswordField.type = "password";
                confirmPasswordField.type = "password";
            }
        });
    </script>
@endsection