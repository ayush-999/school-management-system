@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-4">
                        <div class="box box-widget widget-user">
                            <div class="box-header with-border">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="widget-user-username">{{ $user->name }}</h3>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-success btn-md">
                                        <i class="fa fa-edit mr-1"></i>
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <h6 class="widget-user-desc mt-2"><b>Type:</b> {{ $user->user_type }}</h6>
                                <h6 class="widget-user-desc"><b>Email:</b> {{ $user->email }}</h6>
                                <h6 class="widget-user-desc"><b>Address:</b> {{ $user->address }}</h6>
                                <div class="widget-user-image">
                                    <img class="rounded-circle"
                                        src="{{ (!empty($user->image)) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                        alt="{{ $user->name }}'s profile picture">
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Mobile No</h5>
                                            <span class="description-text">{{ $user->mobile }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Gender</h5>
                                            <span class="description-text">{{ $user->gender }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Status</h5>
                                            <span class="description-text">{{ $user->status }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
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