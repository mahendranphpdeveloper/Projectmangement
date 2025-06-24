@extends('layout.adminPageControl')

@section('content')
<style>
    .icon-container {
        position: relative; /* Set the container to relative positioning */
        display: inline-block; /* Ensure it only takes up the space of its contents */
    }
    
    .plus-icon {
    position: absolute;
    top: 0;
    /* left: 0; */
    font-size: 16px !important;
    transform: translate(-50%, -50%);
    color: red;
}
    .check-icon {
    position: absolute;
    top: 0;
    /* left: 0; */
    font-size: 16px !important;
    transform: translate(-50%, -50%);
    color: green;
}
    .modal-content {
        border-radius: 8px; /* Rounded corners */
    }

    .modal-header {
        background-color: #007bff; /* Bootstrap primary color */
        color: white; /* White text color */
        border-top-left-radius: 8px; /* Rounded corners for header */
        border-top-right-radius: 8px; /* Rounded corners for header */
    }

    .modal-title {
        margin: 0; /* Remove margin */
    }

    .modal-body {
        padding: 30px; /* Increased padding */
    }

    .profile-details p {
        margin: 5px 0; /* Margin between paragraphs */
        font-size: 1.1em; /* Slightly larger text */
    }

    #view-profile-image {
        border: 2px solid #007bff; /* Border around profile image */
    }
    .experience-emp {
    background: #def7e5;
    padding: 4px;
}
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">

            @if (session('success'))
            <script>
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: { background: "#4CAF50" },  // Green for success messages
                }).showToast();
            </script>
        @endif
        

            <div class="row">
                <div class="col-12">
                    <!-- Form for Creating or Editing a Page -->
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_employee">
                                <i class="bx bx-plus"></i> Add Employee</a>
                        </form>
                    </div>
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Employees's list</h4>
                    </div>
                    <table class="table mt-3"> 
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Attendance / Credentials</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="text-center">{{ $employee->id }}</td>
                                    <td class="text-center">
                                        {{ $employee->name }}
                                        <span class="experience-emp">
                                            {{ number_format(\Carbon\Carbon::parse($employee->joining_date)->diffInYears(\Carbon\Carbon::now()), 1) }} years
                                        </span>
                                        
                                    </td>
                                    <td class="text-center">{{ $employee->designation->position_title }}</td>
                                    <td class="text-center">
                                        @if(!empty($employee->login_id) && $employee->login_id !== null)
                                        <a href="{{ route('attendence.view',['id'=>  $employee->id ]) }}" class="text-primary me-2" data-id="{{ $employee->id }}" title="View">
                                            <i class='bx bx-calendar-event bx-sm'></i> 
                                        </a>
                                        <a href="javascript:void(0)" class="text-primary me-2" title="View" 
                                        data-id="{{ $employee->id }}" data-admin-id="{{ $employee->login_id }}" data-name="{{ $employee->name }}" data-email="{{ $employee->login_email }}"  data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                                         <div class="icon-container">
                                            <i class='bx bx-lock-alt bx-sm' style="color:green"></i>
                                            <i class='bx bx-check bx-sm check-icon'></i>
                                         </div>
                                     </a> 
                                        @else
                                        <a href="javascript:void(0)" class="text-primary me-2" title="View" 
                                        data-id="{{ $employee->id }}" data-name="{{ $employee->name }}" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                         <div class="icon-container">
                                             <i class='bx bx-lock-open bx-sm' style="color:red"></i>
                                             <i class='bx bx-plus bx-sm plus-icon'></i>
                                         </div>
                                     </a>                                    
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- <a href="javascript:void(0)" class="text-primary me-2" data-id="{{ $employee->id }}" title="View" onclick="viewEmployee({{ $employee->id }})">
                                            <i class='bx bx-show bx-sm'></i> 
                                        </a> --}}
                                        <a href="{{ route('employee.show2', $employee->id) }}" class="text-primary me-2">
                                            <i class='bx bx-show bx-sm'></i> 
                                        </a>
                                        <a href="javascript:void(0)" class="text-warning me-2" data-id="{{ $employee->id }}" title="Edit" onclick="editEmployee({{ $employee->id }})">
                                            <i class='bx bx-edit bx-sm'></i>
                                        </a>
                                        <a href="javascript:void(0)" class="text-danger" data-id="{{ $employee->id }}" title="Delete" onclick="confirmDelete({{ $employee->id }})">
                                            <i class='bx bx-trash bx-sm'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>                    

                </div>
            </div>
        </div>
    </div>
</div>
<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <form id="employeeForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Full Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Personal Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="personal_email" value="{{ old('personal_email') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Office Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="office_email" value="{{ old('office_email') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderMale" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="genderMale">Male</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="genderFemale">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderOther" value="other" {{ old('gender') == 'other' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="genderOther">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" name="dob" class="form-control" id="datepicker1" value="{{ old('dob') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" name="joining_date" class="form-control" id="joiningDate" value="{{ old('joining_date') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Designation <span class="text-danger">*</span></label>
                                <select name="designation" id="designation" class="form-control" required>
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}" {{ old('designation') == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->position_title }} ({{ $designation->type }}) - {{ $designation->salary }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Address <span class="text-danger">*</span></label><br>
                                <textarea name="address" id="address" cols="55" rows="5" required>{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Bank Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="bank_name" value="{{ old('bank_name') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Account Number<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="account_no" value="{{ old('account_no') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">IFSC Code<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="ifsc" value="{{ old('ifsc') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Upload Photo <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="photoUpload" name="photo" accept=".jpg,.png,.jpeg" required>
                                <label class="input-group-text" for="photoUpload">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Supported formats: jpg, jpeg, png.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Upload ID Proof <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="idProofUpload" name="id_proof" required>
                                <label class="input-group-text" for="idProofUpload">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Supported formats: pdf, jpg, jpeg, png.</small>
                        </div>
                    </div>
                    <div class="submit-section profile-sub mt-3 d-flex justify-content-center">
                        <button class="btn btn-primary btn-custom mbb-50" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="view_employee" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Employee</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-4">
                    <img id="view-profile-image" src="/ava.jpg" alt="Profile Image" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #007bff;">
                </div>
                <div class="profile-details">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> <span id="view-name"></span></p>
                            <p><strong>Phone:</strong> <span id="view-phone"></span></p>
                            <p><strong>Personal Email:</strong> <span id="view-personal-email"></span></p>
                            <p><strong>Gender:</strong> <span id="view-gender"></span></p>
                            <p><strong>Bank Name:</strong> <span id="view-bank-name"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Office Email:</strong> <span id="view-office-email"></span></p>
                            <p><strong>Date of Birth:</strong> <span id="view-dob"></span></p>
                            <p><strong>Joining Date:</strong> <span id="view-joining-date"></span></p>
                            <p><strong>Designation:</strong> <span id="view-position"></span></p>
                            <p><strong>Account No:</strong> <span id="view-account-no"></span></p>
                        </div>
                    </div>
                    <p><strong>Salary:</strong> <span id="view-salary"></span></p>
                    <p><strong>Address:</strong> <span id="view-address"></span></p>
                    <p><strong>IFSC:</strong> <span id="view-ifsc"></span></p>
                    <p><strong>ID Document:</strong> 
                        <a id="download-prof" href="#" target="_blank" class="btn btn-primary mt-2">Download ID</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-height">
                <form id="editEmployeeForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit-employee-id">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Full Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" id="edit-name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" id="edit-phone" onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Personal Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="personal_email" id="edit-personal-email" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Office Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="office_email" id="edit-office-email" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Gender <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="edit-genderMale" value="male" required>
                                        <label class="form-check-label" for="edit-genderMale">Male</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="edit-genderFemale" value="female" required>
                                        <label class="form-check-label" for="edit-genderFemale">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="edit-genderOther" value="other" required>
                                        <label class="form-check-label" for="edit-genderOther">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" name="dob" class="form-control" id="edit-dob" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" name="joining_date" class="form-control" id="edit-joining-date" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Designation <span class="text-danger">*</span></label>
                                <select name="designation" id="edit-designation" class="form-control" required>
                                    <option value="">Select Designation</option>
                                  
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="edit-address" cols="55" rows="5" required class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="bank_name" id="edit-bank-name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">Account Number <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="account_no" id="edit-account-no" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-block mb-3">
                                <label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="ifsc" id="edit-ifsc" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Upload Photo</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="edit-photo" name="photo" accept=".jpg,.png,.jpeg">
                                <label class="input-group-text" for="edit-photo">Choose File</label>
                            </div>
                            <img id="edit-profile-image" src="/ava.jpg" alt="Profile Image" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #007bff;">
                            <small class="form-text text-muted">Supported formats: jpg, jpeg, png.</small>
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Upload ID Proof</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="edit-id-proof" name="id_proof">
                                <label class="input-group-text" for="edit-id-proof">Choose File</label>
                            </div>
                            <small class="form-text text-muted">Supported formats: pdf, jpg, jpeg, png.</small>
                        </div>
                    </div>

                    <div class="submit-section profile-sub mt-3 d-flex justify-content-center">
                        <button class="btn btn-primary btn-custom mbb-50" type="submit">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="delete_employee" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this employee?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel"><span id="employeeName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.crediencial') }}" method="post">
                    @csrf
                    <input type="hidden" id="editemployeeId" name="editemployeeId">
                    <input type="hidden" id="adminId" name="adminId">
                    <div class="mb-3">
                        <label for="email" class="form-label">Login Email</label>
                        <input type="email" class="form-control" name="email" id="loginemail" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted">use same password ignore this field!</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Credentials</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel"><span id="employeeName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.crediencial') }}" method="post">
                    @csrf
                    <input type="hidden" id="employeeId" name="employeeId">
                    <div class="mb-3">
                        <label for="email" class="form-label">Login Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Credentials</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(function (trigger) {
            trigger.addEventListener('click', function () {
                const employeeId = this.getAttribute('data-id');
                const adminId = this.getAttribute('data-admin-id');
                const employeeName = this.getAttribute('data-name');
                const employeeEmail = this.getAttribute('data-email');
                console.log("clicked");
                console.log(employeeEmail);
                if(employeeEmail){
                    document.getElementById('editemployeeId').value = employeeId;
                    document.getElementById('adminId').value = adminId;
                    document.getElementById('loginemail').value = employeeEmail;
                    document.getElementById('employeeName').innerHTML = 'Edit Credentials for ' + employeeName;
                }else{
                    document.getElementById('employeeId').value = employeeId;
                    document.getElementById('employeeName').innerHTML = 'Add Credentials for ' + employeeName;
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker1", {
            dateFormat: "Y-m-d", 
        });

        flatpickr("#joiningDate", {
            dateFormat: "Y-m-d", 
        });
    });
    $(document).ready(function() {
    $('#employeeForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        $.ajax({
            url: "{{ route('employee.store') }}", // Change this if necessary
            type: "POST",
            data: new FormData(this), // Use FormData to send files and other data
            processData: false, // Don't process data as URL encoded
            contentType: false, // Don't set content type
            success: function(response) {
                // Show success toast notification
                showToast2(response.success, "green"); // Adjust the background color as needed

                // Optionally, close the modal or reload the page
                $('#add_employee').modal('hide');
                window.location.reload(); // Reload or redirect as needed
            },
            error: function(xhr) {
                // If validation fails, show error messages
                if (xhr.status === 422) { // Validation error
                    let errorMessage = '';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessage += value[0] + '<br>'; // Concatenate error messages
                    });
                    showToast2(errorMessage, "red"); // Show error toast
                } else {
                    // Handle other potential errors
                    showToast2('An unexpected error occurred. Please try again.', "red");
                }
            }
        });
    });
});
function showToast2(message, bgColor) {
    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: bgColor,
    }).showToast();
}

function viewEmployee(employeeId) {
    $.ajax({
        url: `{{ url('/') }}/admin/employee/` + employeeId, 
        method: 'GET',
        success: function(data) {
            console.log("data", data);
            $('#view-profile-image').attr('src', data.photo ? `{{ url('/storage/') }}/` + data.photo : `{{ url('/') }}/ava.jpg`); 

            $('#view-name').text(data.name);
            $('#view-phone').text(data.phone);
            $('#view-personal-email').text(data.personal_email);
            $('#view-office-email').text(data.office_email);
            $('#view-gender').text(data.gender);
            $('#view-dob').text(data.dob);
            $('#view-joining-date').text(data.joining_date);
            $('#view-position').text(data.designation.position_title);
            $('#view-salary').text(data.salary);
            $('#view-address').text(data.address);
            $('#view-bank-name').text(data.bank_name);
            $('#view-account-no').text(data.account_no);
            $('#view-ifsc').text(data.ifsc);
            
            $('#download-prof').attr('href', data.id_proof ? `{{ url('/storage/') }}/` + data.id_proof : '#').toggle(!!data.id_proof);
            $('#view_employee').modal('show');
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}

function editEmployee(employeeId) {
    $.ajax({
        url: `{{ url('/') }}/admin/employee/` + employeeId, // Make sure to define this route
        method: 'GET',
        success: function(data) {
            $('#edit-employee-id').val(data.id);
                $('#edit-name').val(data.name);
                $('#edit-phone').val(data.phone);
                $('#edit-personal-email').val(data.personal_email);
                $('#edit-office-email').val(data.office_email);
                $('#edit-genderMale').prop('checked', data.gender === 'male');
                $('#edit-genderFemale').prop('checked', data.gender === 'female');
                $('#edit-genderOther').prop('checked', data.gender === 'other');
                $('#edit-dob').val(data.dob);
                $('#edit-joining-date').val(data.joining_date);
                var designations = @json($designations);
                $('#edit-designation').empty();
                $('#edit-designation').append('<option value="">Select Designation</option>');
                designations.forEach(designation => {
                    const isSelected = designation.id === data.designation ? 'selected' : '';
                    $('#edit-designation').append(
                        `<option value="${designation.id}" ${isSelected}>${designation.position_title}</option>`
                    );
                });
                $('#edit-profile-image').attr('src', data.photo ? `{{ url('/storage/') }}/` + data.photo : `{{ url('/') }}/ava.jpg`); 
                $('#edit-address').val(data.address);
                $('#edit-bank-name').val(data.bank_name);
                $('#edit-account-no').val(data.account_no);
                $('#edit-ifsc').val(data.ifsc);
                $('#edit_employee').modal('show');
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });

    $('#editEmployeeForm').on('submit', function(event) {
    event.preventDefault(); 
    var formData = new FormData(this); // Use FormData to include file uploads
    $.ajax({
        url: `{{ url('/') }}/admin/employee/` + employeeId,
        method: 'POST',
        data: formData, // Send FormData instead of serialized form
        contentType: false, // Required for file uploads
        processData: false, // Prevent jQuery from converting the data to a query string
        success: function(response) {
            console.log(response);
            $('#edit_employee').modal('hide');
            // location.reload(); 
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});

}

let employeeIdToDelete;

function confirmDelete(employeeId) {
    employeeIdToDelete = employeeId; 
    $('#confirm-delete').data('id', employeeIdToDelete);
    $('#delete_employee').modal('show');
}
$('#confirm-delete').on('click', function() {
        const employeeIdToDelete = $(this).data('id'); // Ensure employeeIdToDelete is set before opening the modal

        $.ajax({
            url: `{{ url('/') }}/admin/employee/` + employeeIdToDelete, // Define this route to delete employee
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                $('#delete_employee').modal('hide');
                location.reload(); 
            },
            error: function(xhr) {
                console.error(xhr.responseText); 
            }
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const duplicateModal = new bootstrap.Modal(document.getElementById('duplicateModal'));
        const submitNameBtn = document.getElementById('submitName');
        const nameInput = document.getElementById('nameInput');
        const modalTitleName = document.querySelector('.dup-name'); 
    
        let currentId = null;
    
        document.body.addEventListener('click', function (event) {
            if (event.target.classList.contains('openModalBtn')) {
                currentId = event.target.getAttribute('data-id');
                const pageName = event.target.getAttribute('data-name');
                modalTitleName.textContent = pageName;
                duplicateModal.show();
            }
        });
    
        submitNameBtn.addEventListener('click', (e) => {
            document.getElementById('loadingOverlay').style.display = 'flex';
    
            const enteredName = nameInput.value.trim();
            const status = document.getElementById('d-status').value.trim();
            const url = "{{ route('page.duplicate') }}";
            if (enteredName) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        'name': enteredName,
                        'currentId': currentId,
                        'status': status,
                        '_token': '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        Toastify({
                            text: response.message, 
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: { background: "#4CAF50" }, 
                        }).showToast();
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        let error = xhr.responseJSON?.message || "An error occurred";
                        Toastify({
                            text: "Failed to add review: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: { background: "#F44336" }, 
                        }).showToast();
                    },
                    complete: function() {
                        document.getElementById('loadingOverlay').style.display = 'none';
                        window.location.reload();
                    }

                });
                duplicateModal.hide();
            } else {
                document.getElementById('loadingOverlay').style.display = 'none';
            }
        });
    });
    </script>
      <script>
        function isNumberKey(evt) {
            //var e = evt || window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode != 46 && charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

@endsection
