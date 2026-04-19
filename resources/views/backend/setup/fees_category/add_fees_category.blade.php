@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('fees.category.view') }}" class="waves-effect waves-light btn btn-outline btn-secondary btn-circle mt-2 btn-sm">
                    <span class="mdi mdi-arrow-left font-size-14">
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Add Fees Category</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('fees.category.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-4">
                                                        <h5>
                                                            Fees Category Name
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" id="fees-category-name"
                                                                class="form-control" />
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Submit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </section>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection