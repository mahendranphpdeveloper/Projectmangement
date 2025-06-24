@extends('layout.adminPageControl')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>
 
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0" style="color: black;">
                        <i class="bx bx-task me-2"></i> Task Management for {{ $project->pro_name }}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Module Tabs -->
                    <ul class="nav nav-tabs" id="moduleTabs" role="tablist">
                        @forelse ($modules as $index => $module)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="module-{{ $module->id }}-tab" data-bs-toggle="tab" data-bs-target="#module-{{ $module->id }}" type="button" role="tab" aria-controls="module-{{ $module->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                {{ $module->name }} ({{ $module->tasks->count() }})
                            </button>
                        </li>
                        @empty
                        <li class="nav-item">
                            <span class="nav-link disabled">No modules found</span>
                        </li>
                        @endforelse
                        <li class="nav-item">
                            <button class="nav-link" id="add-module-tab" onclick="openAddModule({{ $project->id }},'{{ $project->pro_name }}')">
                                <i class="bx bx-plus"></i> Add Module
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="moduleTabContent">
                        @forelse ($modules as $index => $module)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="module-{{ $module->id }}" role="tabpanel" aria-labelledby="module-{{ $module->id }}-tab">
                            <div class="mt-3">
                              
                                <div class="card p-3 mb-4">
                                    <h6 class="text-primary fw-bold"><i class="bx bx-plus-circle me-2"></i>Add/Edit Task</h6>
                                    <form id="taskForm-{{ $module->id }}">
                                        <input type="hidden" name="task_id" id="task_id-{{ $module->id }}">
                                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                                        <div class="mb-3">
                                            <label for="taskName-{{ $module->id }}" class="form-label">Task Name</label>
                                            <input type="text" class="form-control" id="taskName-{{ $module->id }}" name="task_name" placeholder="Enter task name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="taskDescription-{{ $module->id }}" class="form-label">Task Description</label>
                                            <textarea class="form-control" id="taskDescription-{{ $module->id }}" name="task_description" placeholder="Enter task description" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="taskStatus-{{ $module->id }}" class="form-label">Task Status</label>
                                            <select class="form-control" id="taskStatus-{{ $module->id }}" name="task_status" required>
                                                <option value="Pending">Pending</option>
                                                <option value="In Progress">In Progress</option>
                                                <option value="Completed">Completed</option>
                                                <option value="On Hold">On Hold</option>
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="taskStartDate-{{ $module->id }}" class="form-label">Start Date</label>
                                                <input type="text" class="form-control flatpickr" id="taskStartDate-{{ $module->id }}" name="start_date" placeholder="Select start date">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="taskDueDate-{{ $module->id }}" class="form-label">Due Date</label>
                                                <input type="text" class="form-control flatpickr" id="taskDueDate-{{ $module->id }}" name="due_date" placeholder="Select due date">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" onclick="submitTask({{ $module->id }})">Save Task</button>
                                        <button type="button" class="btn btn-secondary" onclick="resetTaskForm({{ $module->id }})">Clear</button>
                                    </form>
                                </div>

                                <!-- Task List -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Task Name</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Start Date</th>
                                                <th>Due Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="taskList-{{ $module->id }}">
                                            @foreach ($module->tasks as $task)
                                            <tr data-task-id="{{ $task->id }}">
                                                <td>{{ $task->task_name }}</td>
                                                <td>{{ $task->task_description ?? 'N/A' }}</td>
                                                <td>{{ $task->task_status }}</td>
                                                <td>{{ $task->start_date ? \Carbon\Carbon::parse($task->start_date)->format('m/d/Y') : 'N/A' }}</td>
                                                <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('m/d/Y') : 'N/A' }}</td>

                                                <td>
                                                    <button class="btn btn-sm btn-outline-warning me-2" onclick="editTask({{ $task->id }}, {{ $module->id }})">
                                                        <i class="bx bx-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteTask({{ $task->id }}, {{ $module->id }})">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="tab-pane fade show active" id="no-modules" role="tabpanel">
                            <p class="text-muted mt-3">No modules available. Please add a module to manage tasks.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('project.index') }}" class="btn btn-secondary">Back to Projects</a>
                </div>
            </div>

            <!-- Add Module Modal -->

        </div>
    </div>
</div>


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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    function openAddModule(projectId, projectname) {

        $('#pro_module_id').val(projectId);
        $('#pro_module_name').html(projectname);
        console.log(projectId);
        console.log('vars');
        fetchModules(projectId);

        const modal = new bootstrap.Modal(document.getElementById('addProjectModule'));
        modal.show();
    }

    function fetchModules(projectId) {
        console.log('projectId');
        fetch(`{{ url('/') }}/admin/modules/${projectId}`)
            .then(response => response.json())
            .then(data => {
                modules = data;
                renderModuleList();
            })
            .catch(error => console.error('Error fetching modules:', error));
    }



    // Format Date (Y-m-d to m/d/Y)
    function formatDate(date) {
        if (!date) return '';
        const [year, month, day] = date.split('-');
        return `${month}/${day}/${year}`;
    }


    function submitModule() {
        console.log('dfasf');
        const moduleName = document.getElementById('moduleName').value;
        const project_id = document.getElementById('pro_module_id').value;
        const moduleDescription = document.getElementById('moduleDescription').value;
        const moduleId = document.getElementById('moduleId').value;
        console.log(moduleName);
        console.log(moduleDescription);
        console.log('jkglkhj');

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
                        text: method === 'POST' ? 'Module added successfully!' : 'Module updated successfully!',
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
                        backgroundColor: "#4caf50", // Red color for error
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

        function submitTask(moduleId) {
                const taskId = $(`#task_id-${moduleId}`).val();
                let url = "{{ route('modules.tasks.store', ['module' => '__MODULE_ID__']) }}".replace('__MODULE_ID__', moduleId);
                let method = 'POST';

                if (taskId) {
                    url = "{{ route('modules.tasks.update', ['module' => '__MODULE_ID__', 'task' => '__TASK_ID__']) }}"
                        .replace('__MODULE_ID__', moduleId)
                        .replace('__TASK_ID__', taskId);
                    method = 'PUT';
                }


        console.log('dfgdfh');
        const formData = {
            _token: '{{ csrf_token() }}',
            task_name: $(`#taskName-${moduleId}`).val(),
            task_description: $(`#taskDescription-${moduleId}`).val(),
            task_status: $(`#taskStatus-${moduleId}`).val(),
            start_date: $(`#taskStartDate-${moduleId}`).val(),
            due_date: $(`#taskDueDate-${moduleId}`).val(),
        };

        $.ajax({
            url: url,
            method: method,
            data: formData,
            success: function(response) {
                if (response.success) {
                    loadTasks(moduleId);
                    resetTaskForm(moduleId);
              
                    
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4caf50", // Red color for error
                }).showToast();
                }
            },
            error: function(xhr) {
             
                
                Toastify({
                    text: xhr.responseJSON?.message ,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336", // Red color for error
                }).showToast();
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.flatpickr', {
            dateFormat: 'm/d/Y',
            allowInput: true
        });

        // Fetch tasks when a tab is activated
        $('#moduleTabs').on('shown.bs.tab', function(e) {
            const targetTab = $(e.target);
            const moduleId = targetTab.attr('id').replace('module-', '').replace('-tab', '');
            if (moduleId !== 'add-module-tab') {
                loadTasks(moduleId);
            }
        });

        // Load tasks for the initially active tab
        const activeTab = $('#moduleTabs .nav-link.active');
        if (activeTab.length) {
            const initialModuleId = activeTab.attr('id').replace('module-', '').replace('-tab', '');
            if (initialModuleId !== 'add-module-tab') {
                loadTasks(initialModuleId);
            }
        }
    });

        function resetTaskForm(moduleId) {
        $(`#taskForm-${moduleId}`)[0].reset();
        $(`#task_id-${moduleId}`).val('');
    }

    // Load Tasks
    function loadTasks(moduleId) {
        $.ajax({
            url: "{{ route('modules.tasks.index', ['module' => '__MODULE_ID__']) }}".replace('__MODULE_ID__', moduleId),
            method: 'GET',
            success: function(response) {
                const taskList = $(`#taskList-${moduleId}`);
                taskList.empty();
                if (response.length === 0) {
                    taskList.append('<tr><td colspan="6" class="text-muted">No tasks found.</td></tr>');
                } else {
                    response.forEach(task => {
                        taskList.append(`
                            <tr data-task-id="${task.id}">
                                <td>${task.task_name}</td>
                                <td>${task.task_description || 'N/A'}</td>
                                <td>${task.task_status}</td>
                                <td>${task.start_date ? formatDate(task.start_date) : 'N/A'}</td>
                                <td>${task.due_date ? formatDate(task.due_date) : 'N/A'}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-warning me-2" onclick="editTask(${task.id}, ${moduleId})">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="deleteTask(${task.id}, ${moduleId})">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                    });
                }
            },
            error: function(xhr) {
                alert('Error loading tasks: ' + xhr.responseJSON?.message || 'Unknown error');
                
            }
        });
    }
</script>




<script>
    // CSRF Token Setup

    // Open Task Management Page
    function openTaskManagementPage(projectId, projectName) {
        window.location.href = `/projects/${projectId}/tasks`;
    }

    // Initialize Flatpickr and Tab Event Listener


    // Submit Task

    // Reset Task Form


    // Edit Task
  function editTask(taskId, moduleId) {
    const editUrl = "{{ route('modules.tasks.edit', ['module' => '__MODULE_ID__', 'task' => '__TASK_ID__']) }}"
        .replace('__MODULE_ID__', moduleId)
        .replace('__TASK_ID__', taskId);

    $.ajax({
        url: editUrl,
        method: 'GET',
        success: function(task) {
            $(`#task_id-${moduleId}`).val(task.id);
            $(`#taskName-${moduleId}`).val(task.task_name);
            $(`#taskDescription-${moduleId}`).val(task.task_description);
            $(`#taskStatus-${moduleId}`).val(task.task_status);
            $(`#taskStartDate-${moduleId}`).val(task.start_date ? formatDate(task.start_date) : '');
            $(`#taskDueDate-${moduleId}`).val(task.due_date ? formatDate(task.due_date) : '');
        },
        error: function(xhr) {
            alert('Error loading task: ' + (xhr.responseJSON?.message || 'Unknown error'));
        }
    });
}


    // Delete Task
    function deleteTask(taskId, moduleId) {
    if (confirm('Are you sure you want to delete this task?')) {
        const deleteUrl = "{{ route('modules.tasks.destroy', ['module' => '__MODULE_ID__', 'task' => '__TASK_ID__']) }}"
            .replace('__MODULE_ID__', moduleId)
            .replace('__TASK_ID__', taskId);

        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    loadTasks(moduleId); // Reload task list
                
                    
                Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4caf50", // Red color for error
                }).showToast();
                }
            },
            error: function(xhr) {
               
                  Toastify({
                    text: response.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336", // Red color for error
                }).showToast();
            }
        });
    }
}



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


    // Submit Module
</script>


@endsection