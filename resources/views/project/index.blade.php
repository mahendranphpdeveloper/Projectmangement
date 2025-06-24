@extends('layout.adminPageControl')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>
    <style>
        .icon-container {
            position: relative;
            /* Set the container to relative positioning */
            display: inline-block;
            /* Ensure it only takes up the space of its contents */
            margin-right: 12px;
            cursor: pointer;
        }

        .plus-icon {
            color: green;
        }

        /* Modal Header */
        .modal-header.bg-primary.text-white {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #474747;
        }

        /* Search Bar */
        #employeeSearch {
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-size: 0.95rem;
        }

        /* Employee Card Styling */
        .employee-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #fff;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .employee-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-4px);
        }

        /* Profile Image Styling */
        .employee-image img {
            border: 2px solid #ccc;
            transition: border 0.3s ease;
        }

        .employee-image img:hover {
            border: 2px solid #007bff;
        }

        /* Checkbox Customization */
        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 0;
            margin-right: 0.3rem;
        }


        .check-icon {
            position: absolute;
            top: 0;
            /* left: 0; */
            font-size: 16px !important;
            transform: translate(-50%, -50%);
            color: green;
        }
        .count-of-modules {
            position: absolute;
            top: 0px;
            margin: 4px;
            font-size: 10px !important;
            transform: translate(-50%, -50%);
            color: green;
        }

        .multi-select {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .multi-select select {
            display: none;
        }

        .table th {
            /* font-weight: 500 !important; */
            /* font-size: smaller; */
        }

        .multi-select .selected-options {
            border: 1px solid #ccc;
            padding: 10px;
            cursor: pointer;
            display: flex;
            flex-wrap: wrap;
            min-height: 40px;
            align-items: center;
        }

        .multi-select .selected-options span {
            background-color: #007bff;
            color: white;
            padding: 5px;
            margin-right: 5px;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .multi-select .options {
            display: none;
            position: absolute;
            width: 100%;
            border: 1px solid #ccc;
            background-color: white;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1;
        }

        .multi-select .options div {
            padding: 10px;
            cursor: pointer;
        }

        .multi-select .options div:hover {
            background-color: #f1f1f1;
        }

        .multi-select.active .options {
            display: block;
        }

        .module-content {
            padding: 0px 30px;
        }

        .module-button {
            display: flex;
            flex-direction: row;
            width: 200px;
            flex-wrap: nowrap;
            align-content: stretch;
            justify-content: flex-end;
            align-items: baseline;
        }
    </style>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid mt-5">
                <!-- Success Message -->
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
                                    backgroundColor: "#f44336", // Red color for errors
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
                                backgroundColor: "#4CAF50", // Green success color
                            }).showToast();
                        </script>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                            <a href="{{ route('add.project') }}" class="btn btn-primary">
                                <i class="bx bx-plus"></i> Add Project
                            </a>
                        </div>
                        {{-- <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addProjectModal">
                                <i class="bx bx-plus"></i> Add Project
                            </a>
                        </div> --}}
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Project List</h4>
                        </div>

                        <table class="table table-bordered table-hover mt-3">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Project Name</th>
                                    <th>Type</th>
                                    <th>Budget</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td><a href="{{ route('project.show', $project->id) }}">{{ $project->pro_name }}</a>
                                        </td>
                                        <td>{{ $project->pro_type }}</td>
                                        <td>{{ $project->pro_budget }}</td>
                                        <td>{{ $project->pro_status }}</td>
                                        <td class="text-center">
                                            <div class="icon-container" title="Modules">
                                                <i class='bx bx-layer bx-sm'
                                                onclick="openAddModule({{ $project->id }},'{{ $project->pro_name }}')"></i>
                                                <span class="count-of-modules">{{ $project->module->count() }}</span>
                                            </div>
                                            <div class="icon-container" title="Tasks">
                                                <i class='bx bx-list-check bx-sm' onclick="openTaskManagementPage({{ $project->id }}, '{{ $project->pro_name }}')"></i>
                                               
                                            </div>
                                            <div class="icon-container" title="Assign Project">

                                                <i class='bx bx-user bx-sm plus-icon'
                                                    onclick="openEmployeeAssignModal('{{ $project->id }}')"></i>
                                                <i class='{{ $project->employees->isNotEmpty() ? 'bx bx-check bx-sm check-icon' : 'bx bx-plus bx-sm check-icon' }}'
                                                    onclick="openEmployeeAssignModal('{{ $project->id }}')"></i>
                                            </div>

                                            <a href="javascript:void(0)" title="Add Project Message"
                                                class="text-info me-2 message-type-btn"
                                                data-project-id="{{ $project->id }}" data-bs-toggle="modal"
                                                data-bs-target="#messageTypeModal">
                                                {{-- <i class='bx bxs-file-plus '></i> --}}
                                                <i class='bx bxs-add-to-queue bx-sm'></i>
                                            </a>
                                            {{-- <a href="{{ route('project.show', $project->id) }}" class="text-primary me-2">
                                            <i class='bx bx-show bx-sm'></i> 
                                        </a> --}}
                                            <a href="javascript:void(0)" title="Edit Project"
                                                class="text-warning btn-sm edit-btn" data-id="{{ $project->id }}"
                                                data-name="{{ $project->name }}" data-type="{{ $project->type }}"
                                                data-budget="{{ $project->budget }}"
                                                data-status="{{ $project->pro_status }}"
                                                data-employees="{{ json_encode($project) }}"
                                                data-emp="{{ json_encode($project->employees) }}">
                                                <i class="bx bx-edit bx-sm"></i>
                                            </a>
                                            <form title="Delete Project" id="delete-form-{{ $project->id }}"
                                                action="{{ route('project.destroy', $project->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="text-danger btn-sm"
                                                    onclick="if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ $project->id }}').submit(); }">
                                                    <i class="bx bx-trash bx-sm"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Employee Assignment Modal -->
                <div class="modal fade" id="addProjectModule" tabindex="-1" aria-labelledby="addProjectModuleLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-gradient-primary text-white">
                                <h5 class="modal-title" id="addProjectModuleLabel">
                                    <i class="bx bx-layer me-2"></i> Project Modules - <span id="pro_module_name"></span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close">0
                                </button>
                            </div>
                            <input type="hidden" name="moduleId" id="moduleId">
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Form to Add/Edit Module -->
                                <div class="card p-3 mb-4 shadow-sm">
                                    <h6 class="text-primary fw-bold"><i class="bx bx-plus-circle me-2"></i>Add New Module
                                    </h6>
                                    <form id="projectModuleForm">
                                        <input type="hidden" name="pro_module_id" id="pro_module_id">

                                        <!-- Module Name -->
                                        <div class="mb-3">
                                            <label for="moduleName" class="form-label">Module Name</label>
                                            <input type="text" class="form-control" id="moduleName" name="module_name"
                                                placeholder="Enter module name" required>
                                        </div>

                                        <!-- Module Description -->
                                        <div class="mb-3">
                                            <label for="moduleDescription" class="form-label">Module Description</label>
                                            <textarea class="form-control" id="moduleDescription" name="module_description" placeholder="Enter module description"
                                                rows="3" required></textarea>
                                        </div>

                                        <button type="button"
                                            class="btn btn-primary d-flex justify-content-center text-center"
                                            onclick="submitModule()">Add Module</button>
                                    </form>
                                </div>

                                <div class="card shadow-sm">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 text-primary fw-bold"><i class="bx bx-list-ul me-2"></i>Existing
                                            Modules</h6>
                                        <button class="btn btn-sm btn-link text-secondary"
                                            onclick="toggleModuleList()">Show/Hide</button>
                                    </div>

                                    <div class="card-body p-0" id="moduleListContainer">
                                        <ul class="list-group list-group-flush" id="moduleList">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div class="module-content">
                                                    <strong>Module Name</strong> - <span class="text-muted">Module
                                                        description goes here.</span>
                                                </div>
                                                <div class="module-button">
                                                    <button class="btn btn-sm btn-outline-warning me-2"
                                                        onclick="editModule(moduleId)">
                                                        <i class="bx bx-edit-alt"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteModule(moduleId)">
                                                        <i class="bx bx-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </li>
                                            <!-- Additional items will be inserted here dynamically -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="employeeAssignModal" tabindex="-1"
                    aria-labelledby="employeeAssignModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="employeeAssignModalLabel">Assign Employees to Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Search Bar -->
                                <div class="mb-3">
                                    <input type="text" id="employeeSearch" class="form-control shadow-sm"
                                        placeholder="🔍 Search for employees...">
                                </div>
                                <input type="hidden" name="pro_id" id="pro_id">
                                <!-- Employee List as Cards -->
                                <div class="employee-list row g-3" id="employeeList"
                                    style="max-height: 400px; overflow-y: auto;">
                                    @foreach ($employees as $employee)
                                        <div class="col-md-4">
                                            <div class="employee-card p-3 text-center shadow-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="{{ $employee->name }}">
                                                <div class="employee-image mb-2">
                                                    <img src="{{ asset('/storage/' . $employee->photo ?? 'assets/images/default-avatar.png') }}"
                                                        alt="Profile Image" class="rounded-circle"
                                                        style="width: 60px; height: 60px;">
                                                </div>
                                                <h6 class="employee-name">{{ $employee->name }}</h6>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input class="form-check-input employee-checkbox" type="checkbox"
                                                        value="{{ $employee->id }}" id="employee_{{ $employee->id }}">
                                                    <label class="form-check-label"
                                                        for="employee_{{ $employee->id }}">Select</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="submitEmployeeAssignment()">Assign
                                    Selected</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="messageTypeModal" tabindex="-1" aria-labelledby="messageTypeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="messageTypeModalLabel">Project Message </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="messageTypeForm">
                                    <input type="hidden" name="project_id" id="projectId" value="">

                                    <!-- Message Type Dropdown -->
                                    <div class="mb-3">
                                        <label for="messageType" class="form-label">Message Type</label>
                                        <select class="form-select" id="messageType" name="messageType" required>
                                            <option value="" disabled selected>Select Message Type</option>
                                            <option value="Text">Message</option>
                                            <option value="Document">Document</option>
                                            <option value="Image">Image</option>
                                            <option value="Video">Video</option>
                                            <option value="Audio">Audio</option>
                                        </select>
                                    </div>

                                    <!-- Conditional Fields -->
                                    <div id="textField" class="mb-3 d-none">
                                        <label for="messageText" class="form-label"></label>
                                        <div id="messageText" name="messageText"></div>
                                        {{-- <textarea class="form-control" id="messageText" name="messageText" rows="3"></textarea> --}}
                                    </div>

                                    <div id="documentField" class="mb-3 d-none">
                                        <label for="documentUpload" class="form-label">Upload Document</label>
                                        <input type="file" class="form-control" id="documentUpload" name="document">
                                    </div>

                                    <div id="imageField" class="mb-3 d-none">
                                        <label for="imageUpload" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="imageUpload" name="image"
                                            accept="image/*">
                                    </div>

                                    <div id="videoField" class="mb-3 d-none">
                                        <label for="videoUpload" class="form-label">Upload Video</label>
                                        <input type="file" class="form-control" id="videoUpload" name="video"
                                            accept="video/*">
                                    </div>

                                    <div id="audioField" class="mb-3 d-none">
                                        <label for="audioUpload" class="form-label">Upload Audio</label>
                                        <input type="file" class="form-control" id="audioUpload" name="audio"
                                            accept="audio/*">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" form="messageTypeForm" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg"> <!-- Use modal-lg for larger width -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProjectLabel">Add Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="projectForm" action="{{ route('project.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST" id="formMethod">
                                    <input type="hidden" id="projectId" name="id">

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pro_name" class="form-label">Project Name</label>
                                            <input type="text" class="form-control" id="pro_name" name="pro_name"
                                                value="{{ old('pro_name') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pro_type" class="form-label">Project Type</label>
                                            <select class="form-select" id="pro_type" name="pro_type">
                                                <option value="">--Select Website Type--</option>
                                                @if (isset($services))
                                                    @foreach ($services as $type)
                                                        <option value="{{ $type->service }}"
                                                            {{ old('pro_type') == $type->service ? 'selected' : '' }}>
                                                            {{ $type->service }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="text" class="form-control flatpickr" id="start_date"
                                                name="start_date" value="{{ old('start_date') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="end_date" class="form-label">Deadline</label>
                                            <input type="text" class="form-control flatpickr" id="end_date"
                                                name="end_date" value="{{ old('end_date') }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pro_budget" class="form-label">Budget</label>
                                            <input type="number" step="0.01" class="form-control" id="pro_budget"
                                                name="pro_budget" value="{{ old('pro_budget') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="client_name" class="form-label">Client Name</label>
                                            <input type="text" class="form-control" id="client_name"
                                                name="client_name" value="{{ old('client_name') }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="client_email" class="form-label">Client Email</label>
                                            <input type="email" class="form-control" id="client_email"
                                                name="client_email" value="{{ old('client_email') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="client_phone" class="form-label">Client Phone</label>
                                            <input type="text" class="form-control" id="client_phone"
                                                name="client_phone" value="{{ old('client_phone') }}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="client_address" class="form-label">Client Address</label>
                                            <input type="text" class="form-control" id="client_address"
                                                name="client_address" value="{{ old('client_address') }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="review_date" class="form-label">Review Date</label>
                                            <input type="text" class="form-control flatpickr" id="review_date"
                                                value="{{ old('review_date') }}" name="review_date">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="pro_status" class="form-label">Status</label>
                                            <select class="form-select" id="pro_status" name="pro_status">
                                                <option value="">--Select Status--</option>
                                                <option value="Not Started"
                                                    {{ old('pro_status') == 'Not Started' ? 'selected' : '' }}>Not Started
                                                </option>
                                                <option value="Started"
                                                    {{ old('pro_status') == 'Started' ? 'selected' : '' }}>Started</option>
                                                <option value="Pending"
                                                    {{ old('pro_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="In Progress"
                                                    {{ old('pro_status') == 'In Progress' ? 'selected' : '' }}>In Progress
                                                </option>
                                                <option value="Completed"
                                                    {{ old('pro_status') == 'Completed' ? 'selected' : '' }}>Completed
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="proof" class="form-label">Proof (Upload File)</label>
                                            <input type="file" class="form-control" id="proof" name="proof">
                                        </div>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="saveProjectBtn">Save Project</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProjectLabel">Edit Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProjectForm" action="{{ route('project.upgrade') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="POST" id="editFormMethod">
                            <input type="hidden" id="editProjectId" name="id">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_pro_name" class="form-label">Project Name</label>
                                    <input type="text" class="form-control" id="edit_pro_name" name="pro_name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_pro_type" class="form-label">Project Type</label>
                                    <select class="form-select" id="edit_pro_type" name="pro_type" required>
                                        <option value="">--Select Website Type--</option>
                                        @if (isset($services))
                                            @foreach ($services as $type)
                                                <option value="{{ $type->service }}">{{ $type->service }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_start_date" class="form-label">Start Date</label>
                                    <input type="text" class="form-control flatpickr" id="edit_start_date"
                                        name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_end_date" class="form-label">Deadline</label>
                                    <input type="text" class="form-control flatpickr" id="edit_end_date"
                                        name="end_date" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_pro_budget" class="form-label">Budget</label>
                                    <input type="number" step="0.01" class="form-control" id="edit_pro_budget"
                                        name="pro_budget" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_client_name" class="form-label">Client Name</label>
                                    <input type="text" class="form-control" id="edit_client_name" name="client_name"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_client_email" class="form-label">Client Email</label>
                                    <input type="email" class="form-control" id="edit_client_email"
                                        name="client_email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_client_phone" class="form-label">Client Phone</label>
                                    <input type="text" class="form-control" id="edit_client_phone"
                                        name="client_phone" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_client_address" class="form-label">Client Address</label>
                                    <input type="text" class="form-control" id="edit_client_address"
                                        name="client_address" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_review_date" class="form-label">Review Date</label>
                                    <input type="text" class="form-control flatpickr" id="edit_review_date"
                                        name="review_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="edit_pro_status" class="form-label">Status</label>
                                    <select class="form-select" id="edit_pro_status" name="pro_status" required>
                                        <option value="">--Select Status--</option>
                                        <option value="Not Started">Not Started</option>
                                        <option value="Started">Started</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="edit_proof" class="form-label">Proof (Upload File) <a href=""
                                            class="edit_proof_doc" target="_blank"><i class="bx bx-show">
                                            </i></a></label>
                                    <input type="file" class="form-control" id="edit_proof" name="proof">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateProjectBtn">Update Project</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleModuleList() {
            const moduleListContainer = document.getElementById("moduleListContainer");
            if (moduleListContainer.style.display === "none") {
                moduleListContainer.style.display = "block"; // Show the module list
            } else {
                moduleListContainer.style.display = "none"; // Hide the module list
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('projectModuleForm').addEventListener('submit', function(e) {
                e.preventDefault();
                submitModule();
            });
        });

        function fetchModules(projectId) {
            fetch(`{{ url('/') }}/admin/modules/${projectId}`)
                .then(response => response.json())
                .then(data => {
                    modules = data;
                    renderModuleList();
                })
                .catch(error => console.error('Error fetching modules:', error));
        }

        function renderModuleList() {
            const moduleList = document.getElementById('moduleList');
            moduleList.innerHTML = '';

            modules.forEach(module => {
                const moduleItem = document.createElement('li');
                moduleItem.className = 'list-group-item d-flex justify-content-between align-items-center';
                moduleItem.innerHTML = `
            <div  class="module-content">
                <strong>${module.name}</strong> - <span class="text-muted">${module.description}</span>
            </div>
            <div class="module-button">
                <button class="btn btn-sm btn-outline-warning me-2" onclick="editModule(${module.id})">
                    <i class="bx bx-edit-alt"></i> Edit
                </button>
                <button class="btn btn-sm btn-outline-danger" onclick="deleteModule(${module.id})">
                    <i class="bx bx-trash"></i> Delete
                </button>
            </div>
        `;
                moduleList.appendChild(moduleItem);
            });
        }

        function submitModule() {
            const moduleName = document.getElementById('moduleName').value;
            const project_id = document.getElementById('pro_module_id').value;
            const moduleDescription = document.getElementById('moduleDescription').value;
            const moduleId = document.getElementById('moduleId').value;

            if (moduleName && moduleDescription) {
                const data = {
                    project_id: project_id,
                    name: moduleName,
                    description: moduleDescription
                };

                let method = 'POST';
                let url = `{{ url('/') }}/admin/modules`;

                if (moduleId) {
                    method = 'PUT';
                    url = `{{ url('/') }}/admin/modules/${moduleId}`;
                }

                fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(module => {
                        if (method === 'POST') {
                            modules.push(module);
                        } else {
                            const index = modules.findIndex(mod => mod.id === module.id);
                            modules[index] = module;
                        }
                        const submitButton = document.querySelector('#projectModuleForm button');
                        submitButton.textContent = 'Add Module';
                        renderModuleList();

                        document.getElementById('moduleName').value = '';
                        document.getElementById('moduleDescription').value = '';
                        document.getElementById('moduleId').value = '';

                        Toastify({
                            text: method === 'POST' ? 'Module added successfully!' :
                                'Module updated successfully!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4caf50",
                        }).showToast();
                    })
                    .catch(error => {
                        console.error('Error:', error);

                        Toastify({
                            text: 'Failed to save module. Please try again.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f44336",
                        }).showToast();
                    });
            } else {
                alert("Please fill out both fields.");
            }
        }

        function editModule(id) {
            const module = modules.find(mod => mod.id === id);
            if (module) {
                document.getElementById('pro_module_id').value = module.project_id;
                document.getElementById('moduleName').value = module.name;
                document.getElementById('moduleDescription').value = module.description;
                document.getElementById('moduleId').value = module.id;

                const submitButton = document.querySelector('#projectModuleForm button');
                submitButton.textContent = 'Update Module'; 
            }
        }

        // Delete a module
        function deleteModule(id) {
            fetch(`{{ url('/') }}/admin/modules/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Module deleted successfully') {
                        Toastify({
                            text: 'Module deleted successfully!',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4caf50", // Green color for success
                        }).showToast();

                        modules = modules.filter(mod => mod.id !== id);
                        renderModuleList();
                    } else {
                        Toastify({
                            text: 'Failed to delete module. Please try again.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f44336", // Red color for error
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Error deleting module:', error);

                    Toastify({
                        text: 'Failed to delete module. Please try again.',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f44336", // Red color for error
                    }).showToast();
                });
        }




        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });

        document.getElementById('employeeSearch').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const employeeCards = document.querySelectorAll('.employee-card');

            employeeCards.forEach(card => {
                const employeeName = card.querySelector('.employee-name').textContent.toLowerCase();
                if (employeeName.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        function openAddModule(projectId, projectname) {
            $('#pro_module_id').val(projectId);
            $('#pro_module_name').html(projectname);
            fetchModules(projectId);
            const modal = new bootstrap.Modal(document.getElementById('addProjectModule'));
            modal.show();
        }

        function openEmployeeAssignModal(projectId) {
            $('#pro_id').val(projectId);

            $('.employee-checkbox').prop('checked', false);

            $.ajax({
                url: `{{ url('/') }}/admin/projects/${projectId}/assigned-employees`,
                method: 'GET',
                success: function(response) {
                    response.assignedEmployees.forEach(employeeId => {
                        $(`#employee_${employeeId}`).prop('checked', true);
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching segment:', xhr);
                }
            });
            const modal = new bootstrap.Modal(document.getElementById('employeeAssignModal'));
            modal.show();
        }



        function submitEmployeeAssignment() {
            const selectedEmployees = Array.from(document.querySelectorAll('.employee-checkbox:checked'))
                .map(input => input.value);

            var id = $('#pro_id').val();
            const url = `{{ route('assign.employees', ':id') }}`.replace(':id', id);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        project_id: id,
                        employee_ids: selectedEmployees
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#25c161", // Green
                        }).showToast();
                        bootstrap.Modal.getInstance(document.getElementById('employeeAssignModal')).hide();
                        window.location.reload();
                    } else {
                        Toastify({
                            text: 'Failed to assign employees. Please try again.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f44336", // Green 
                        }).showToast();
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        const editor = new FroalaEditor('#textField', {
            toolbarButtons: [
                'undo', 'redo', '|',
                'bold', 'italic', 'underline', '|',
                'paragraphFormat', 'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', '|',
                'clearFormatting', 'html'
            ],
            height: 300
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.message-type-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');
                    document.getElementById('projectId').value = projectId;
                });
            });

            document.getElementById('messageType').addEventListener('change', function() {
                const selectedType = this.value;

                document.getElementById('textField').classList.add('d-none');
                document.getElementById('documentField').classList.add('d-none');
                document.getElementById('imageField').classList.add('d-none');
                document.getElementById('videoField').classList.add('d-none');
                document.getElementById('audioField').classList.add('d-none');

                if (selectedType === 'Text') document.getElementById('textField').classList.remove(
                    'd-none');
                if (selectedType === 'Document') document.getElementById('documentField').classList.remove(
                    'd-none');
                if (selectedType === 'Image') document.getElementById('imageField').classList.remove(
                    'd-none');
                if (selectedType === 'Video') document.getElementById('videoField').classList.remove(
                    'd-none');
                if (selectedType === 'Audio') document.getElementById('audioField').classList.remove(
                    'd-none');
            });

            document.getElementById('messageTypeForm').addEventListener('submit', function(e) {
                e.preventDefault();

                // Clear previous error
                clearErrors();

                const formData = new FormData(this);
                const projectId = document.getElementById('projectId').value;
                const seoContent = editor.html.get();
                console.log("sseoContent");
                formData.append('messageText', seoContent);
                const url = `{{ url('/') }}/admin/project-message/store`;
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Toastify({
                                text: data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#25c161", // Green 
                            }).showToast();
                            document.getElementById('messageTypeForm').reset();

                            console.log('success');
                            const messageTypeModal = new bootstrap.Modal(document.getElementById(
                                'messageTypeModal'));
                            messageTypeModal.hide(); 
                            $("#messageTypeModal").modal('hide');
                            $('#messageTypeModal').hide();
                            const backdrop = document.querySelector('.modal-backdrop');
                            if (backdrop) {
                                backdrop.classList.remove('fade', 'show');
                                backdrop.remove(); 
                            }
                        } else {
                            Toastify({
                                text: 'Error occurred: ' + data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#f44336", // Red 
                            }).showToast();

                            if (data.errors) {
                                displayErrors(data.errors);
                            }
                        }

                    })
                    .catch(error => console.error('Error:', error));
            });
            function displayErrors(errors) {
                for (const [key, value] of Object.entries(errors)) {
                    const inputElement = document.querySelector(`[name=${key}]`);
                    const errorContainer = document.createElement('div');
                    errorContainer.classList.add('invalid-feedback');
                    errorContainer.innerText = value[0]; 

                    inputElement.classList.add('is-invalid');
                    inputElement.parentElement.appendChild(errorContainer);
                }
            }

            function clearErrors() {
                const errorElements = document.querySelectorAll('.invalid-feedback');
                const inputElements = document.querySelectorAll('.is-invalid');

                errorElements.forEach(el => el.remove());
                inputElements.forEach(el => el.classList.remove('is-invalid'));
            }
        });


        let selectedEmployees = [];
        document.querySelectorAll('.edit-btn').forEach(function(editButton) {
            editButton.addEventListener('click', function(e) {
                e.preventDefault();
                const startDatePicker = flatpickr("#edit_start_date");
                const endDatePicker = flatpickr("#edit_end_date");
                const reviewDatePicker = flatpickr("#edit_review_date");
                document.getElementById('editProjectLabel').textContent = 'Edit Project';

                const employees = JSON.parse(editButton.getAttribute('data-employees'))
                const emp = JSON.parse(editButton.getAttribute('data-emp'));

                document.getElementById('editProjectId').value = employees.id;
                document.getElementById('edit_pro_name').value = employees.pro_name;
                startDatePicker.setDate(employees.start_date, true);
                endDatePicker.setDate(employees.end_date, true);
                reviewDatePicker.setDate(employees.review_date, true);
                document.getElementById('edit_client_name').value = employees.client_name;
                document.getElementById('edit_client_email').value = employees.client_email;
                document.getElementById('edit_client_phone').value = employees.client_phone;
                document.getElementById('edit_client_address').value = employees.client_address;
                document.getElementById('edit_pro_type').value = employees.pro_type;
                document.getElementById('edit_pro_budget').value = employees.pro_budget;
                document.getElementById('edit_pro_status').value = employees.pro_status;
                document.querySelector('.edit_proof_doc').href = `{{ url('/') }}/` + employees.proof;

                $('#edit_employee_id').val(employees).trigger('change');

                const editModal = new bootstrap.Modal(document.getElementById('editProjectModal'));
                editModal.show();
            });
        });
        function removeEditOption(valueId) {
            selectedEmployees = selectedEmployees.filter(id => id !== valueId); 

            const selectedOptionsDiv = document.getElementById('editCategorySelectOptions');
            selectedOptionsDiv.innerHTML = ''; 
            selectedEmployees.forEach(employeeId => {
                const employeeName = document.querySelector(`.option[data-value="${employeeId}"]`)
                .textContent; 
                const selectedOption = document.createElement('span');
                selectedOption.setAttribute('data-value', employeeId);
                selectedOption.innerText = employeeName;

                selectedOption.onclick = function() {
                    removeEditOption(employeeId); 
                };

                selectedOptionsDiv.appendChild(selectedOption);
            });

            document.getElementById('edit_employee_id').value = selectedEmployees.join(','); 
        }

        const editSelectedOptionsDiv = document.querySelector('#editCategorySelect .selected-options');
        const editOptionsDiv = document.querySelector('#editCategorySelect .options');
        let editSelectedValues = [];

        const selectedOptionsDiv = document.querySelector('.selected-options');
        const optionsDiv = document.querySelector('.options');
        let selectedValues = [];
        const employeeIdsInput = document.getElementById('employee_id');

        function toggleDropdown() {
            document.getElementById("categorySelect").classList.toggle("active");
        }

        function updateSelectedOptions() {
            selectedOptionsDiv.innerHTML = '';

            selectedValues.forEach(value => {
                const optionSpan = document.createElement('span');
                optionSpan.textContent = value.name;
                optionSpan.setAttribute('data-value', value.id);
                optionSpan.onclick = function() {
                    console.log("id remove");
                    console.log(value.id);
                    removeOption(value.id);
                };
                selectedOptionsDiv.appendChild(optionSpan);
            });

            employeeIdsInput.value = JSON.stringify(selectedValues.map(option => option.id));
        }

        function loadSelectedCategories(preSelectedCategories) {
            selectedValues = preSelectedCategories.map(category => ({
                id: category.id,
                name: category.name
            }));
            updateSelectedOptions();
        }

        function removeOption(id) {
            const index = selectedValues.findIndex(option => option.id === id);
            if (index !== -1) {
                selectedValues.splice(index, 1);
                updateSelectedOptions();
            }
        }

        optionsDiv.addEventListener('click', function(e) {
            const clickedOption = e.target;
            if (clickedOption.dataset.value) {
                const value = clickedOption.dataset.value;
                const text = clickedOption.textContent;
                const alreadySelected = selectedValues.find(option => option.id === value);
                if (alreadySelected) {
                    removeOption(value);
                } else {
                    selectedValues.push({
                        id: value,
                        name: text
                    });
                    updateSelectedOptions();
                }
            }
        });

        document.addEventListener('click', function(e) {
            const isClickInside = document.getElementById("categorySelect").contains(e.target);
            if (!isClickInside) {
                document.getElementById("categorySelect").classList.remove("active");
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const preSelectedCategories = []; 
            loadSelectedCategories(preSelectedCategories);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".flatpickr", {
                dateFormat: "Y-m-d", 
            });

            $('#employee_id').select2({
                placeholder: "Select Employees",
                allowClear: true
            });

            const modal = new bootstrap.Modal(document.getElementById('addProjectModal'));
            const form = document.getElementById('projectForm');
            const saveBtn = document.getElementById('saveProjectBtn');
            const modalTitle = document.getElementById('addProjectLabel');
            const projectIdInput = document.getElementById('projectId');
            const nameInput = document.getElementById('pro_name');
            const typeInput = document.getElementById('pro_type');
            const budgetInput = document.getElementById('pro_budget');
            const statusSelect = document.getElementById('pro_status');

            document.querySelector('.btn-primary').addEventListener('click', function() {
                modalTitle.textContent = 'Add Project';
                form.action = "{{ route('project.store') }}";
                projectIdInput.value = '';
                nameInput.value = '';
                typeInput.value = '';
                budgetInput.value = '';
                statusSelect.value = 'Pending';
                $('#employee_id').val(null).trigger('change');
                saveBtn.textContent = 'Save Project';
                modal.show();
            });

            document.querySelectorAll('.edit-btn').forEach(function(editButton) {
                editButton.addEventListener('click', function(e) {
                    e.preventDefault();

                    modalTitle.textContent = 'Edit Project';
                    projectIdInput.value = editButton.getAttribute('data-id');
                    nameInput.value = editButton.getAttribute('data-name');
                    typeInput.value = editButton.getAttribute('data-type');
                    budgetInput.value = editButton.getAttribute('data-budget');
                    statusSelect.value = editButton.getAttribute('data-status');
                    $('#employee_id').val(JSON.parse(editButton.getAttribute('data-employees')))
                        .trigger('change'); // Load selected employees
                    form.action = `{{ route('project.update', '') }}/${projectIdInput.value}`;
                    document.getElementById('formMethod').value = 'PATCH';
                    saveBtn.textContent = 'Update Project';
                    modal.show();
                });
            });

            saveBtn.addEventListener('click', function() {
                form.submit();
            });
        });

            function openTaskManagementPage(projectId, projectName) {
                window.location.href = "{{ route('tasks.manage', ['project' => ':id']) }}".replace(':id', projectId);
            }
    </script>

    
@endsection
