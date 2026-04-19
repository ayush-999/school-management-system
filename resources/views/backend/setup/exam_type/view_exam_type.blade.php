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
                                <h3 class="box-title">Exam Types List</h3>
                                <a href="{{ route('exam.type.add') }}" class="waves-effect waves-light btn-circle btn btn-success btn-sm">
                                    <i class="mdi mdi-plus font-size-16"></i>
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
                                            @foreach ($allData as $key => $examTypeData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $examTypeData->name }}</td>
                                                    <td class="admin-table-btn-wrapper">
                                                        <a href="{{ route('exam.type.edit', $examTypeData->id) }}"
                                                            class="waves-effect waves-light btn btn-info btn-circle btn-sm">
                                                            <i class="mdi mdi-pencil font-size-16"></i>
                                                        </a>
                                                        <a href="{{ route('exam.type.delete', $examTypeData->id) }}"
                                                            class="waves-effect waves-light btn btn-danger btn-circle btn-sm" id="delete">
                                                            <i class="mdi mdi-delete font-size-16"></i>
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