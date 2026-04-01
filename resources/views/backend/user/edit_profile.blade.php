@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('profile.view') }}" class="btn btn-outline btn-secondary mt-2 btn-sm">
                    <i class="fa fa-arrow-left mr-2"></i> Back
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-12 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit user profile</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('profile.update', $editData->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <!-- Basic info Section -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="mb-3 mt-3">Basic Information</h5>
                                                        </div>
                                                        <!-- Image Upload Section -->
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <!-- Profile Image -->
                                                                <div class="col-md-3 my-auto">
                                                                    <div class="form-group">
                                                                        <label class="image-upload-container">
                                                                            <input type="file" id="profile_image_input"
                                                                                class="profile_image_input"
                                                                                name="profile_image" accept="image/*">
                                                                            <div class="image-wrapper">
                                                                                <img id="profile_image_preview"
                                                                                    src="{{ $editData->profile_image ? url('upload/user_images/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                                                                    alt="Profile Image"
                                                                                    class="profile_image_preview img-fluid">
                                                                                <div class="upload-overlay">
                                                                                    <i class="fa fa-camera img-icon"></i>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <!-- Cover Image -->
                                                                <div class="col-md-9">
                                                                    <div class="form-group">
                                                                        <label class="image-upload-container-cover">
                                                                            <input type="file" id="cover_image_input"
                                                                                class="cover_image_input" name="cover_image"
                                                                                accept="image/*">
                                                                            <div class="image-wrapper-cover">
                                                                                <img id="cover_image_preview"
                                                                                    src="{{ $editData->cover_image ? url('upload/user_images/' . $editData->cover_image) : asset('backend/images/gallery/full/10.jpg') }}"
                                                                                    alt="Cover Image"
                                                                                    class="cover_image_preview img-fluid">
                                                                                <div class="upload-overlay-cover">
                                                                                    <i class="fa fa-camera img-icon"></i>
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    User Role <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <select name="user_type" id="user_type" required
                                                                        class="form-control">
                                                                        <option value="" selected="" disabled="">
                                                                            Select Role
                                                                        </option>
                                                                        <option value="super_admin" {{ $editData->user_type == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                                                        <option value="admin" {{ $editData->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                                                        <option value="user" {{ $editData->user_type == 'user' ? 'selected' : '' }}>User</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    User Name
                                                                    <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="name" class="form-control"
                                                                        value="{{ $editData->name }}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Email Field <span class="text-danger">*</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="email" name="email" class="form-control"
                                                                        value="{{ $editData->email }}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    User Mobile
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                                                        value="{{ $editData->mobile }}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <h5>
                                                                    Gender
                                                                </h5>
                                                                <div class="controls d-flex gap-3 align-items-center mt-3">
                                                                    <div class="form-check pl-0">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="gender_male" value="male" {{ $editData->gender == 'Male' ? 'checked' : '' }}
                                                                            required />
                                                                        <label class="form-check-label" for="gender_male">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="gender_female" value="female"
                                                                            {{ $editData->gender == 'Female' ? 'checked' : '' }} required />
                                                                        <label class="form-check-label" for="gender_female">
                                                                            Female
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="gender_other" value="other" {{ $editData->gender == 'Other' ? 'checked' : '' }}
                                                                            required />
                                                                        <label class="form-check-label" for="gender_other">
                                                                            Other
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Address Section -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="mb-3 mt-3">Address Information</h5>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Recipient Name
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_recipient_name"
                                                                        class="form-control" placeholder="" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    House/Flat Number, Building Name
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_house_building"
                                                                        class="form-control" placeholder="" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Street Name, Colony Name, Area Name
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_street_colony"
                                                                        class="form-control" placeholder="" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Landmark <span class="text-muted">(optional but
                                                                        recommended)</span>
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_landmark"
                                                                        class="form-control" placeholder="" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    City Name
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_city"
                                                                        class="form-control" placeholder="" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    PIN Code
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_pincode"
                                                                        class="form-control" placeholder="6-Digit PIN Code"
                                                                        pattern="[0-9]{6}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    State
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_state"
                                                                        class="form-control" placeholder="" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Country
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_country"
                                                                        class="form-control" value="India" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 mx-auto mt-4">
                                                    <div class="text-xs-right">
                                                        <input type="submit" class="btn btn-success btn-block"
                                                            value="Update" />
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Profile Image Preview
            const profileImageInput = document.getElementById('profile_image_input');
            if (profileImageInput) {
                profileImageInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (event) {
                            const preview = document.getElementById('profile_image_preview');
                            if (preview) {
                                preview.src = event.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Cover Image Preview
            const coverImageInput = document.getElementById('cover_image_input');
            if (coverImageInput) {
                coverImageInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (event) {
                            const preview = document.getElementById('cover_image_preview');
                            if (preview) {
                                preview.src = event.target.result;
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Initialize intlTelInput for mobile field
            const mobileInput = document.querySelector("#mobile");
            if (mobileInput && window.intlTelInput) {
                window.intlTelInput(mobileInput, {
                    initialCountry: "in",
                    allowDropdown:false,
                    preferredCountries: ["in"],
                    separateDialCode: true,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.1/build/js/utils.js"
                });
            }
        });
    </script>
@endsection