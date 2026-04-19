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
                                <h3 class="box-title">Fees Amount List</h3>
                                <a href="{{ route('fees.amount.add') }}" class="waves-effect waves-light btn btn-success btn-circle mt-2 btn-sm">
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
                                                <th>Fees Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $feesAmountData)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $feesAmountData['fees_category']['name'] }}</td>
                                                    <td class="admin-table-btn-wrapper">
                                                        <a href="{{ route('fees.amount.edit', $feesAmountData->fees_category_id) }}"
                                                            class="waves-effect waves-light btn btn-info btn-circle btn-sm">
                                                            <i class="mdi mdi-pencil font-size-16"></i>
                                                        </a>
                                                        <a href="{{ route('fees.amount.details', $feesAmountData->fees_category_id) }}"
                                                            class="waves-effect waves-light btn btn-primary btn-circle btn-sm">
                                                            <i class="fa fa-eye font-size-12"></i>
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