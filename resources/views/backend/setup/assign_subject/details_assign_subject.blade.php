@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('assign.subject.view') }}" class="waves-effect waves-light btn btn-outline btn-secondary btn-circle mt-2 btn-sm">
                    <span class="mdi mdi-arrow-left font-size-14">
                </a>
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="box">
                            <div class="box-header with-border d-flex justify-content-between align-items-center">
                                <h3 class="box-title">Assigned Subject Details</h3>
                                <a href="{{ route('assign.subject.add') }}" class="waves-effect waves-light btn btn-success btn-circle btn-sm">
                                    <i class="mdi mdi-plus font-size-16"></i>
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>Assigned class for:</strong> {{ $detailsData['0']['student_class']['name'] }}
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Subject</th>
                                                <th>Full Mark</th>
                                                <th>Pass Mark</th>
                                                <th>Subjective Mark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailsData as $key => $details)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $details['subject']['name'] }}</td>
                                                    <td>{{ $details->full_mark }}</td>
                                                    <td>{{ $details->pass_mark }}</td>
                                                    <td>{{ $details->subjective_mark }}</td>
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