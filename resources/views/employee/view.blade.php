@extends('layout.adminPageControl') 
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
<style>
.position-text {
	background: #def7e5 !important;
	width: fit-content !important;
}
    </style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">
            <!-- Success and Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <script>
                            Toastify({
                                text: "{{ $error }}",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#f44336", // Red for errors
                            }).showToast();
                        </script>
                    @endforeach
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <script>
                        Toastify({
                            text: "Changes saved successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                    </script>
                </div>
            @endif

            <!-- Page Header -->
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                        <a href="{{ route('employee.index') }}" class="btn btn-warning mb-3">
                            <i class='bx bx-chevrons-left'></i> Back
                        </a>
                    </div>
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Profile > {{ $employee->name }}</h4>
                    </div>
                </div>
            </div>

            <!-- Employee Details Card -->
            <div class="row">
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="card shadow-sm p-4">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-primary mt-5">Employee Details</h5>
                            <img src="{{ url('/storage/') }}/{{ $employee->photo }}" alt="" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #007bff;">
                        </div>
                        <table class="table table-borderless">
                           
                            <tr>
                                <th>Employee Name</th>
                                <td>{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td class="position-text">{{ $employee->designation->position_title }}</td>
                            </tr>
                            <tr>
                                <th>Salary</th>
                                <td>{{ number_format($employee->designation->salary, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ \Carbon\Carbon::parse($employee->dob)->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Join Date</th>
                                <td>{{ \Carbon\Carbon::parse($employee->joining_date)->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Personal Email</th>
                                <td>{{ $employee->personal_email }}</td>
                            </tr>
                            <tr>
                                <th>Office Email</th>
                                <td>{{ $employee->office_email }}</td>
                            </tr>
                            <tr>
                                <th>Gender </th>
                                <td>{{ $employee->gender }}</td>
                            </tr>
                            <tr>
                                <th>Bank Name </th>
                                <td>{{ $employee->bank_name }}</td>
                            </tr>
                            <tr>
                                <th>Bank Account </th>
                                <td>{{ $employee->account_no }}</td>
                            </tr>
                            <tr>
                                <th>Bank IFSC </th>
                                <td>{{ $employee->ifsc }}</td>
                            </tr>
                            <tr>
                                <th>Address </th>
                                <td>{{ $employee->address }}</td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 p-4">
                        <div class="card shadow-sm bg-white p-4">
                            <h5 class="card-title text-primary">Project List</h5>
                            <table class="table table-bordered table-hover mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Project Type</th>
                                        <th>Project Budget</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee->projects as $project)
                                        <tr>
                                            <td>{{ $project->pro_name }}</td>
                                            <td>{{ $project->pro_type }}</td>
                                            <td>{{ $project->pro_budget }}</td>
                                            <td>
                                                <span class="badge {{ $project->pro_status == 'Completed' ? 'bg-success' : ($project->pro_status == 'In Progress' ? 'bg-info' : 'bg-danger') }}">
                                                    {{ $project->pro_status }}
                                                </span>
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
    </div>
</div>
@endsection
