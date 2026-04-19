@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('fees.amount.view') }}" class="waves-effect waves-light btn btn-outline btn-secondary btn-circle mt-2 btn-sm">
                    <span class="mdi mdi-arrow-left font-size-14">
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-6 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit Fees Amount</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('fees.amount.update', $editData[0]->fees_category_id) }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="add_item">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Fees Category <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="fees_category_id"
                                                                            id="fees_category_id" required
                                                                            class="form-control">
                                                                            <option value="" selected="" disabled="">
                                                                                Select Fees Category
                                                                            </option>
                                                                            @foreach($fees_categories as $fees_category)
                                                                                <option value="{{ $fees_category->id }}" {{ $editData['0']->fees_category_id == $fees_category->id ? 'selected' : '' }}>
                                                                                    {{ $fees_category->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach($editData as $edit)
                                                            <div class="delete_whole_extra_item_add"
                                                                id="delete_whole_extra_item_add">
                                                                <div class="row">
                                                                    <div class="col-md-5 col-12">
                                                                        <div class="form-group mb-4">
                                                                            <h5>
                                                                                Student Class <span class="text-danger">*</span>
                                                                            </h5>
                                                                            <div class="controls">
                                                                                <select name="class_id[]" class="form-control"
                                                                                    required>
                                                                                    <option value="" selected="" disabled="">
                                                                                        Select Student Class
                                                                                    </option>
                                                                                    @foreach($classes as $class)
                                                                                        <option value="{{ $class->id }}" {{ $edit->class_id == $class->id ? 'selected' : '' }}>
                                                                                            {{ $class->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group mb-4">
                                                                            <h5>
                                                                                Fees Amount <span class="text-danger">*</span>
                                                                            </h5>
                                                                            <div class="controls">
                                                                                <input type="text" name="amount[]"
                                                                                    id="fees-amount" value="{{ $edit->amount }}"
                                                                                    class="form-control" />

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12" style="margin-top: 24px">
                                                                        <div class="form-group mb-4">
                                                                            <span class="waves-effect waves-light btn-circle btn btn-success addEventMore btn-sm">
                                                                                <i class="fa fa-plus-circle font-size-12"></i>
                                                                            </span>
                                                                            <span class="waves-effect waves-light btn-circle btn btn-danger removeEventMore btn-sm">
                                                                                <i class="fa fa-minus-circle font-size-12"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Update Fees Amount" />
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
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-5 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Student Class <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <select name="class_id[]" class="form-control" required>
                                    <option value="" selected="" disabled="">
                                        Select Student Class
                                    </option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Fees Amount <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <input type="text" name="amount[]" id="fees-amount" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12" style="margin-top: 22px">
                        <div class="form-group mb-4">
                            <span class="waves-effect waves-light btn-circle btn btn-success addEventMore btn-sm">
                                <i class="fa fa-plus-circle font-size-12"></i>
                            </span>
                            <span class="waves-effect waves-light btn-circle btn btn-danger removeEventMore btn-sm">
                                <i class="fa fa-minus-circle font-size-12"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var counter = 0;
            $(document).on("click", ".addEventMore", function () {

                // destroy all select2 first
                $('select').select2('destroy');

                var whole_extra_item_add = $("#whole_extra_item_add").html();
                var newItem = $(whole_extra_item_add);

                $(this).closest(".add_item").append(newItem);

                // reinitialize ALL selects
                $('select').select2({
                    width: '100%'
                });

                counter++;
            });
            $(document).on("click", ".removeEventMore", function (event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });
        });
    </script>

@endsection