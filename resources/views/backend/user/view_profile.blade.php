@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-4 mx-auto mt-4">
                        <div class="box box-widget widget-user">
                            <div class="box-header with-border widget-cover-image bg-bubbles-white"
                                style="background: url('{{ asset('backend/images/gallery/full/10.jpg') }}') center center;">
                            </div>
                            <div class="box-body p-4">
                                <h4 class="widget-user-username"><b>{{ (!empty($user->name)) ? $user->name : 'Not provided' }}</b></h4>
                                <h6 class="widget-user-desc mt-2"><b>Role:</b> {{ (!empty($user->user_type)) ? $user->user_type : 'Not provided' }}</h6>
                                <h6 class="widget-user-desc"><b>Email:</b> {{ (!empty($user->email)) ? $user->email : 'Not provided' }}</h6>
                                <h6 class="widget-user-desc mb-4"><b>Address:</b> {{ (!empty($user->address)) ? $user->address : 'Not provided' }}</h6>
                                <div class="widget-user-image">
                                    <img class="rounded"
                                        src="{{ (!empty($user->image)) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                        alt="{{ $user->name }}'s profile picture">
                                </div>
                                <div class="widget-user-info">
                                    <div class="row b-1 border-dark rounded">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Mobile No</h5>
                                                <span class="description-text">{{ (!empty($user->mobile)) ? $user->mobile : 'Not provided' }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 br-1 bl-1 border-dark">
                                            <div class="description-block">
                                                <h5 class="description-header">Gender</h5>
                                                <span class="description-text">{{ (!empty($user->gender)) ? $user->gender : 'Not provided' }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Status</h5>
                                                <span class="description-text">{{ (!empty($user->status)) ? $user->status : 'Not provided' }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <div class="box-footer p-4">
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-success btn-block">
                                    <i class="fa fa-edit mr-1"></i>
                                    Edit Profile
                                </a>
                                <a href="" class="btn btn-secondary btn-block btn-outline">
                                    <i class="fa fa-lock mr-1"></i>
                                    Change Password
                                </a>
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