@extends('layout.adminPageControl')

@section('content')
<!-- External Styles and Script -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

<style>
    .position-text {
        background: #def7e5 !important;
        width: fit-content !important;
    }

    .timesheet-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: var(--bs-box-shadow-sm) !important;
    }

    .page-title-box h4 {
        font-size: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table thead {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .form-row {
        margin-bottom: 10px;
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

            <!-- Timesheet Form Fields -->
            <div class="row mb-3 timesheet-container">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    @if(isset($page))
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Edit Timesheet</h4>
                        </div>
                        <form action="{{ route('timesheets.update', $page->id) }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary ms-3">{{ isset($page) ? 'Update' : 'Create' }}</button>
                        </form>
                    @else
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Create Timesheet</h4>
                        </div>
                        <form action="{{ route('employee.timesheet.store') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-3 d-flex justify-content-end text-end">Create</button>
                        </form>
                    @endif
                </div>

                <div class="col-md-4">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', $page->date ?? '') }}" required>
                </div>

                <div class="col-md-4">
                    <label for="task_detail">Task Detail</label>
                    <textarea name="task_detail" class="form-control" required>{{ old('task_detail', $page->task_detail ?? '') }}</textarea>
                </div>

                <div class="col-md-4">
                    <label for="project_name">Project Name</label>
                    <input type="text" name="project_name" class="form-control" value="{{ old('project_name', $page->project_name ?? '') }}" required>
                </div>

                <div class="col-md-4">
                    <label for="starting_time">Starting Time</label>
                    <input type="time" name="starting_time" class="form-control" value="{{ old('starting_time', $page->starting_time ?? '') }}" required>
                </div>

                <div class="col-md-4">
                    <label for="ending_time">Ending Time</label>
                    <input type="time" name="ending_time" class="form-control" value="{{ old('ending_time', $page->ending_time ?? '') }}" required>
                </div>

                <div class="col-md-4">
                    <label for="task_status">Task Status</label>
                    <select name="task_status" class="form-control" required>
                        <option value="Pending" {{ (old('task_status', $page->task_status ?? '') == 'Pending') ? 'selected' : '' }}>Pending</option>
                        <option value="Completed" {{ (old('task_status', $page->task_status ?? '') == 'Completed') ? 'selected' : '' }}>Completed</option>
                        <option value="In Progress" {{ (old('task_status', $page->task_status ?? '') == 'In Progress') ? 'selected' : '' }}>In Progress</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto timesheet-container">
                    <h4>Employee Timesheets</h4>
                    <div class="card shadow-sm p-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Task Detail</th>
                                    <th>Project Name</th>
                                    <th>Starting Time</th>
                                    <th>Ending Time</th>
                                    <th>Task Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($timesheets as $timesheet)
                                    <tr>
                                        <td>{{ $timesheet->employee_name }}</td>
                                        <td>{{ $timesheet->date }}</td>
                                        <td>{{ $timesheet->task_detail }}</td>
                                        <td>{{ $timesheet->project_name }}</td>
                                        <td>{{ $timesheet->starting_time }}</td>
                                        <td>{{ $timesheet->ending_time }}</td>
                                        <td>{{ $timesheet->task_status }}</td>
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

@endsection
