@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('fees.amount.view') }}" class="btn btn-outline btn-secondary mt-2 btn-sm">
                    <i class="fa fa-arrow-left mr-2"></i> Back
                </a>
                <div class="row">
                    <div class="col-8 mx-auto">
                        <div class="box">
                            <div class="box-header with-border d-flex justify-content-between align-items-center">
                                <h3 class="box-title">Fees Amount Details</h3>
                                <a href="{{ route('fees.amount.add') }}" class="btn btn-success btn-md">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Fees Amount
                                </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h4><strong>Fees Category:</strong> {{ $detailsData['0']['fees_category']['name'] }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Class Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailsData as $key => $details)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $details['student_class']['name'] }}</td>
                                                    <td>{{ $details->amount }}</td>
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