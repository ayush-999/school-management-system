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
                                <h3 class="box-title">Subjects List</h3>
                                <a href="{{ route('subject.add') }}" class="btn btn-success btn-md">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Subject
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $subjectData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $subjectData->name }}</td>
                                                    <td class="admin-table-btn-wrapper">
                                                        <a href="{{ route('subject.edit', $subjectData->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fa fa-edit mr-1"></i> Edit
                                                        </a>
                                                        <a href="{{ route('subject.delete', $subjectData->id) }}"
                                                            class="btn btn-danger btn-sm" id="delete">
                                                            <i class="fa fa-trash mr-1"></i> Delete
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