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
                                <h3 class="box-title">System Health Check</h3>
                                <span class="badge 
                                    @if($status === 'ok') badge-success @elseif($status === 'warning') badge-warning @else badge-danger @endif">
                                    {{ strtoupper($status) ?? 'UNKNOWN' }}
                                </span>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                @if($checks && count($checks) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Check Name</th>
                                                    <th>Status</th>
                                                    <th>Message</th>
                                                    <th>Last Checked</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($checks as $check)
                                                    <tr>
                                                        <td>
                                                            <strong>{{ $check['check'] ?? 'Unknown Check' }}</strong>
                                                        </td>
                                                        <td>
                                                            @if(($check['status'] ?? '') === 'ok')
                                                                <span class="badge badge-success">Healthy</span>
                                                            @elseif(($check['status'] ?? '') === 'warning')
                                                                <span class="badge badge-warning">Warning</span>
                                                            @else
                                                                <span class="badge badge-danger">Failed</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <small>
                                                                @if($check['notificationMessage'] ?? null)
                                                                    {{ $check['notificationMessage'] }}
                                                                @else
                                                                    <em>No message</em>
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <small>{{ $lastChecked?->format('Y-m-d H:i:s') ?? 'N/A' }}</small>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">No Health Check Data</h4>
                                        <p>Run the health check command to populate data:</p>
                                        <code>php artisan health:check</code>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('health.index') }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-refresh mr-1"></i> Refresh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
