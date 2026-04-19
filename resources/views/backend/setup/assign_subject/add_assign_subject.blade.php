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
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-12 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Assign Subject</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('assign.subject.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="add_item">
                                                        <div class="row">
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Class Name <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="class_id" class="form-control"
                                                                            required>
                                                                            <option value="" selected="" disabled="">
                                                                                Select Class
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

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-5 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Select Subject <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="subject_id[]" id="subject_id" required
                                                                            class="form-control">
                                                                            <option value="" selected="" disabled="">
                                                                                Select Subject
                                                                            </option>
                                                                            @foreach($subjects as $subject)
                                                                                <option value="{{ $subject->id }}">
                                                                                    {{ $subject->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Full Mark <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="full_mark[]"
                                                                            id="full_mark" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Pass Mark <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="pass_mark[]"
                                                                            id="pass_mark" class="form-control" />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12">
                                                                <div class="form-group mb-4">
                                                                    <h5>
                                                                        Subjective Mark <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="subjective_mark[]"
                                                                            id="subjective_mark" class="form-control" />

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12" style="margin-top: 24px">
                                                                <div class="form-group mb-4">
                                                                    <span class="waves-effect waves-light btn-circle btn btn-success addEventMore btn-sm">
                                                                        <i class="fa fa-plus-circle font-size-12"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-5 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Select Subject <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <select name="subject_id[]" id="subject_id" required class="form-control">
                                    <option value="" selected="" disabled="">
                                        Select Subject
                                    </option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Full Mark <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" id="full_mark" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Pass Mark <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" id="pass_mark" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group mb-4">
                            <h5>
                                Subjective Mark <span class="text-danger">*</span>
                            </h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" id="subjective_mark" class="form-control" />

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 col-12" style="margin-top: 22px">
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
                $('select').each(function () {
                    if ($(this).hasClass("select2-hidden-accessible")) {
                        $(this).select2('destroy');
                    }
                });

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