@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="box">
                            <div class="box-header with-border d-flex justify-content-between align-items-center">
                                <h3 class="box-title">Assigned Subjects List</h3>
                                <a href="{{ route('assign.subject.add') }}" class="btn btn-success btn-md">
                                    <i class="fa fa-plus mr-1"></i>
                                    Assign Subject
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Class Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $assignedSubjectData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $assignedSubjectData['student_class']['name'] }}</td>
                                                    <td class="admin-table-btn-wrapper">
                                                        <a href="{{ route('assign.subject.edit', $assignedSubjectData->class_id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fa fa-edit mr-1"></i> Edit
                                                        </a>
                                                        <a href="{{ route('assign.subject.details', $assignedSubjectData->class_id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-eye mr-1"></i> Details
                                                        </a>
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