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
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Manage Permissions
                                </h3>
                                <p class="text-muted mt-2">Assign and manage permissions for users</p>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle mr-2"></i>
                                            <strong>Note:</strong> Checkboxes indicate which permissions a user has. Check to assign, uncheck to revoke.
                                        </div>
                                    </div>
                                </div>

                                <!-- Users and Permissions Table -->
                                <div class="table-responsive">
                                    <table id="permissionsTable example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%;">User Name</th>
                                                <th style="width: 15%;">Role</th>
                                                <th style="width: 20%;">Email</th>
                                                <th style="width: 12%;">Status</th>
                                                <th style="width: 28%;">Permissions</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($allUsers->count() > 0)
                                                @foreach($allUsers as $userData)
                                                    <tr>
                                                        <td class="font-weight-bold">{{ $userData->name }}</td>
                                                        <td>
                                                            @php
                                                                $roles = $userData->getRoleNames();
                                                            @endphp
                                                            @if($roles->count() > 0)
                                                                @foreach($roles as $role)
                                                                    <span class="badge badge-primary">{{ ucfirst(str_replace('_', ' ', $role)) }}</span>
                                                                @endforeach
                                                            @else
                                                                <span class="badge badge-secondary">No Role</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $userData->email }}</td>
                                                        <td>
                                                            @if($userData->status === 'active')
                                                                <span class="badge badge-success">Active</span>
                                                            @elseif($userData->status === 'inactive')
                                                                <span class="badge badge-secondary">Inactive</span>
                                                            @elseif($userData->status === 'blocked')
                                                                <span class="badge badge-danger">Blocked</span>
                                                            @elseif($userData->status === 'suspended')
                                                                <span class="badge badge-warning">Suspended</span>
                                                            @else
                                                                <span class="badge badge-light">{{ $userData->status ?? 'N/A' }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="permission-badges">
                                                                @php
                                                                    $permissions = $userData->getAllPermissions()->pluck('name');
                                                                @endphp
                                                                @if($permissions->count() > 0)
                                                                    @foreach($permissions as $permission)
                                                                        <span class="badge" style="background-color: #e9ecef; border: 1px solid #dee2e6; color: #495057; margin: 2px;">
                                                                            {{ ucfirst(str_replace('_', ' ', $permission)) }}
                                                                        </span>
                                                                    @endforeach
                                                                @else
                                                                    <span class="text-muted"><small>No permissions</small></span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="waves-effect waves-light btn btn-info btn-circle btn-sm" data-toggle="modal"
                                                                data-target="#permissionModal{{ $userData->id }}">
                                                                <i class="mdi mdi-pencil font-size-16"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <!-- Permission Edit Modal -->
                                                    <div class="modal fade" id="permissionModal{{ $userData->id }}" tabindex="-1"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary text-white">
                                                                    <h5 class="modal-title">
                                                                        <i class="fa fa-lock mr-2"></i>Manage Permissions for
                                                                        <strong>{{ $userData->name }}</strong>
                                                                    </h5>
                                                                    <button type="button" class="close text-white" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('permissions.update') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="user_id" value="{{ $userData->id }}">
                                                                    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                                                        @if($allPermissions->count() > 0)
                                                                            <div class="row">
                                                                                @foreach($allPermissions as $guardName => $permissions)
                                                                                    <div class="col-md-6 mb-4">
                                                                                        <h6 class="mb-3 font-weight-bold">
                                                                                            <i class="fa fa-shield-alt mr-2"></i>{{ ucfirst($guardName) }}
                                                                                        </h6>
                                                                                        <div style="border-left: 3px solid #007bff; padding-left: 10px;">
                                                                                            @foreach($permissions as $permission)
                                                                                                <div class="custom-control custom-checkbox mb-2">
                                                                                                    <input type="checkbox" class="custom-control-input" id="perm_{{ $userData->id }}_{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" @if($userData->hasPermissionTo($permission->name)) checked @endif>
                                                                                                    <label class="custom-control-label"
                                                                                                        for="perm_{{ $userData->id }}_{{ $permission->id }}">
                                                                                                        {{ ucfirst(str_replace('_', ' ', $permission->name)) }}
                                                                                                        @if($userData->hasPermissionTo($permission->name) && !$userData->hasDirectPermission($permission->name))
                                                                                                            <small class="text-muted">(via role)</small>
                                                                                                        @endif
                                                                                                    </label>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @else
                                                                            <div class="alert alert-warning">
                                                                                No permissions found in the system. Please create permissions first.
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="fa fa-save mr-1"></i> Save Changes
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted">
                                                        No users found
                                                    </td>
                                                </tr>
                                            @endif
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
