@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-5 col-12 mx-auto mt-4">
                        <div class="box box-widget widget-user">
                            <div class="box-header with-border bg-bubbles-white p-0">
                                <img class="widget-cover-image "
                                    src="{{(!empty($user->cover_image)) ? url('upload/user_images/' . $user->cover_image) : url('backend/images/gallery/full/10.jpg') }}"
                                    alt="Cover Image">
                            </div>
                            <div class="box-body p-4">
                                <h4 class="widget-user-username">
                                    <b>{{ (!empty($user->name)) ? $user->name : 'Not provided' }}</b>
                                </h4>
                                <h6 class="widget-user-desc mt-2"><b>Role:</b>
                                    @if($user->user_type == 'super_admin')
                                        <span class="badge badge-primary-light">Super Admin</span>
                                    @elseif($user->user_type == 'admin')
                                        <span class="badge badge-success-light">Admin</span>
                                    @elseif($user->user_type == 'user')
                                        <span class="badge badge-warning-light">User</span>
                                    @else
                                        <span class="badge badge-danger-light">Unknown</span>
                                    @endif
                                </h6>
                                <h6 class="widget-user-desc"><b>Email:</b>
                                    {{ (!empty($user->email)) ? $user->email : 'Not provided' }}</h6>
                                <h6 class="widget-user-desc mb-4"><b>Address:</b>
                                    {{ (!empty($user->address)) ? $user->address : 'Not provided' }}</h6>
                                <div class="widget-user-image">
                                    <img class="rounded img-fluid"
                                        src="{{ (!empty($user->image)) ? url('upload/user_images/' . $user->image) : url('upload/no_image.jpg') }}"
                                        alt="{{ $user->name }}'s profile picture">
                                </div>
                                <div class="widget-user-info">
                                    <div class="row b-1 border-dark b-dashed rounded">
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Mobile No</h5>
                                                <span
                                                    class="description-text">{{ (!empty($user->mobile)) ? '+91-' . $user->mobile : 'Not provided' }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 br-1 bl-1 br-dashed bl-dashed border-dark">
                                            <div class="description-block">
                                                <h5 class="description-header">Gender</h5>
                                                <span
                                                    class="description-text">{{ (!empty($user->gender)) ? $user->gender : 'Not provided' }}</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">Status</h5>
                                                @if($user->status == 'active')
                                                    <span class="badge badge-success-light">Active</span>
                                                @elseif($user->status == 'inactive')
                                                    <span class="badge badge-danger-light">Inactive</span>
                                                @elseif($user->status == 'blocked')
                                                    <span class="badge badge-danger-light">Blocked</span>
                                                @elseif($user->status == 'suspended')
                                                    <span class="badge badge-warning-light">Suspended</span>
                                                @elseif($user->status == 'deactivated')
                                                    <span class="badge badge-info-light">Deactivated</span>
                                                @elseif($user->status == 'archived')
                                                    <span class="badge badge-dark">Archived</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $user->status ?? 'N/A' }}</span>
                                                @endif
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
                                <a href="{{ route('password.view') }}" class="btn btn-secondary btn-block btn-outline">
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