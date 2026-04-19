@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <a href="{{ route('profile.view') }}" class="waves-effect waves-light btn btn-outline btn-secondary btn-circle mt-2 btn-sm">
                    <span class="mdi mdi-arrow-left font-size-14">
                </a>
                <!-- Basic Forms -->
                <div class="row">
                    <div class="col-md-12 col-12 mx-auto mt-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit <i>{{ $editData->name }}</i> profile</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <form method="POST" action="{{ route('profile.store', $editData->id) }}"
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
                                                                                    src="{{ (!empty($editData->image)) ? url('upload/user_images/' . $editData->image) : url('upload/no_image.jpg') }}"
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
                                                                                    src="{{ (!empty($editData->cover_image)) ? url('upload/user_images/' . $editData->cover_image) : asset('backend/images/gallery/full/10.jpg') }}"
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
                                                                        class="form-control" disabled>
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
                                                                    <input type="text" name="mobile" class="form-control"
                                                                        id="mobile" value="{{ $editData->mobile }}"
                                                                        required />
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
                                                                            name="gender" id="gender_male" value="male" {{ strtolower($editData->gender) == 'male' ? 'checked' : '' }}
                                                                            required />
                                                                        <label class="form-check-label" for="gender_male">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="gender_female" value="female"
                                                                            {{ strtolower($editData->gender) == 'female' ? 'checked' : '' }} required />
                                                                        <label class="form-check-label" for="gender_female">
                                                                            Female
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="gender" id="gender_other" value="other" {{ strtolower($editData->gender) == 'other' ? 'checked' : '' }}
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
                                                        @php
                                                            // Parse the existing address string
                                                            $address_lines = [];
                                                            if (!empty($editData->address)) {
                                                                $address_lines = array_filter(explode("\n", $editData->address));
                                                            }

                                                            // Extract individual address components
                                                            $recipient_name = $address_lines[0] ?? '';
                                                            $house_building = $address_lines[1] ?? '';
                                                            $street_colony = $address_lines[2] ?? '';
                                                            $landmark = '';
                                                            $city = '';
                                                            $pincode = '';
                                                            $state = '';
                                                            $country = 'India';

                                                            // If there are more than 3 lines, parse them further
                                                            if (count($address_lines) > 3) {
                                                                for ($i = 3; $i < count($address_lines); $i++) {
                                                                    $line = trim($address_lines[$i]);
                                                                    
                                                                    // Check if line contains city and pincode (format: "City - PINCODE")
                                                                    if (preg_match('/^(.+?)\s*-\s*(\d{6})$/', $line, $matches)) {
                                                                        $city = trim($matches[1]);
                                                                        $pincode = trim($matches[2]);
                                                                    }
                                                                    // Check if line contains state and country (format: "State, Country")
                                                                    elseif (strpos($line, ',') !== false) {
                                                                        $parts = explode(',', $line);
                                                                        $state = trim($parts[0]);
                                                                        $country = trim($parts[1] ?? 'India');
                                                                    }
                                                                    // Otherwise, treat as landmark
                                                                    else {
                                                                        if (empty($landmark)) {
                                                                            $landmark = $line;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        @endphp

                                                        <div class="col-12">
                                                            <div class="form-group mb-4">
                                                                <h5>
                                                                    Recipient Name
                                                                </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="address_recipient_name"
                                                                        class="form-control" value="{{ $recipient_name }}" placeholder="" required />
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
                                                                        class="form-control" value="{{ $house_building }}" placeholder="" required />
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
                                                                        class="form-control" value="{{ $street_colony }}" placeholder="" required />
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
                                                                        class="form-control" value="{{ $landmark }}" placeholder="" />
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
                                                                        class="form-control" value="{{ $city }}" placeholder="" required />
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
                                                                        class="form-control" value="{{ $pincode }}" placeholder="6-Digit PIN Code"
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
                                                                    <select name="address_state" id="address_state"
                                                                        class="form-control" required>
                                                                        <option value="" selected="" disabled="">Select State</option>
                                                                        <option value="{{ $state }}" {{ !empty($state) ? 'selected' : '' }}>{{ $state }}</option>
                                                                    </select>
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
                                                                        class="form-control" value="{{ $country }}" required />
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
        $(document).ready(function () {
            // Profile Image Preview
            $('#profile_image_input').on('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        $('#profile_image_preview').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Cover Image Preview
            $('#cover_image_input').on('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        $('#cover_image_preview').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Initialize intlTelInput for mobile field
            const mobileInput = document.querySelector("#mobile");
            if (mobileInput && window.intlTelInput) {
                window.intlTelInput(mobileInput, {
                    initialCountry: "in",
                    allowDropdown: false,
                    preferredCountries: ["in"],
                    separateDialCode: true,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.10.1/build/js/utils.js"
                });
            }
        });
    </script>
@endsection