@extends('layout.adminPageControl')
@section('content')
@php
    $user =Illuminate\Support\Facades\Auth::user();
@endphp
<style>
    img.project-image {
    width: 150px;
}
    </style>
<div class="main-content">
    @if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}", // Success message from session
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#28a745", // Green background for success
            stopOnFocus: true,
        }).showToast();
    </script>
@endif

@if (session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}", // Error message from session
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#f10606", // Red background for error
            stopOnFocus: true,
        }).showToast();
    </script>
@endif

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Projects control panel</h4>

                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div> -->
                                    <div class="d-flex justify-content-end mb-3">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add Project</button>
                                    </div>                                    

                                </div>
                            </div>
                        </div>
                        <div class="row" id="projectContainer">
                            @foreach($projectControls as $project)
                            <div class="col-xl-4 project-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-primary-subtle font-size-24">
                                                    <img src="{{ asset($project->pro_image ?? 'assets/images/default.png') }}" class="project-image" alt="">
                                                </span>
                                            </div>
                                            <p class="font-16 text-muted mb-2 project-name">{{ $project->pro_name }}</p>
                                            <h5>
                                                <a href="{{ $project->pro_link }}" class="text-primary" target="_blank">{{ $project->project->pro_name }}</a>
                                            </h5>
                                            <div class="mt-3">
                                                <a href="{{ route('project.show', $project->project->id) }}"><i class='bx bx-show bx-sm me-1'></i></a>
                                                <i class="bx bx-edit bx-sm" onclick="openEditModal({{ json_encode($project) }})"></i>
                                                
                                                @if ($user->admin_role == 'Admin')
                                                <form action="{{ route('projects.control.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background:none;border:none;">
                                                        <i class="bx bx-trash bx-sm"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form  action="{{ route('projects.control.store2') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="pro_name" class="form-label">Project Name</label>
                                        <input type="text" id="pro_name" name="pro_name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pro_name" class="form-label">Choose Project</label>
                                        @if ($notChoosedProjects->isEmpty())
                                        <p>No other projects available.</p>
                                    @else
                                        <select name="project_id" id="project_id" class="form-control" required>
                                            <option value="">--select project--</option>
                                            @foreach ($notChoosedProjects as $project)
                                                <option value="{{ $project->id }}">{{ $project->pro_name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    
                                    </div>
                                    <div class="mb-3">
                                        <label for="pro_link" class="form-label">Project Link</label>
                                        <input type="text" id="pro_link" name="pro_link" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pro_image" class="form-label">Project Image URL</label>
                                        <input type="file" id="pro_image" name="pro_image" accept=".jpg,.png,.jpeg" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Project Modal -->
<!-- Edit Project Modal -->
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProjectForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_pro_id" name="project_id">
                    
                    <!-- Project Name -->
                    <div class="mb-3">
                        <label for="edit_pro_name" class="form-label">Project Name</label>
                        <input type="text" id="edit_pro_name" name="pro_name" class="form-control" required>
                    </div>

                    <!-- Project Selection Dropdown -->
                    <div class="mb-3">
                        <label for="edit_project_id" class="form-label">Choose Project</label>
                        <select name="project_id" id="edit_project_id" class="form-control" required>
                            <option value="">--select project--</option>
                            @foreach ($projects as $projectOption)
                            <option value="{{ $projectOption->id }}">{{ $projectOption->pro_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Project Link -->
                    <div class="mb-3">
                        <label for="edit_pro_link" class="form-label">Project Link</label>
                        <input type="text" id="edit_pro_link" name="pro_link" class="form-control" required>
                    </div>

                    <!-- Project Image -->
                    <div class="mb-3">
                        <label for="edit_pro_image" class="form-label">Project Image URL</label>
                        <input type="file" id="edit_pro_image" name="pro_image" accept=".jpg,.png,.jpeg" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


                </div>

<script>
    // JavaScript for filtering projects
    document.getElementById('search').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const projectCards = document.querySelectorAll('.project-card');

        projectCards.forEach(card => {
            const projectName = card.querySelector('.project-name').textContent.toLowerCase();
            if (projectName.includes(searchValue)) {
                card.style.display = 'block'; // Show card if it matches
            } else {
                card.style.display = 'none'; // Hide card if it doesn't match
            }
        });
    });
</script>
                <script>
                    function openEditModal(project) {
                        console.log(project);
                
                        // Set form action URL dynamically for updating the project
                        document.getElementById('editProjectForm').action = `{{ url('/') }}/admin/projects/control/${project.id}`;
                
                        // Set the form fields with the project data
                        document.getElementById('edit_pro_id').value = project.id;
                        document.getElementById('edit_pro_name').value = project.pro_name;
                        document.getElementById('edit_pro_link').value = project.pro_link;
                        
                        // Set the selected project in the dropdown
                        const projectSelect = document.getElementById('edit_project_id');
                        projectSelect.value = project.project_id; // Set the correct project_id
                        
                        // Show the edit modal
                        new bootstrap.Modal(document.getElementById('editProjectModal')).show();
                    }
                </script>
                
                
<script>
document.getElementById('addProjectForm').addEventListener('submit', function (event) {
    event.preventDefault();

    let formData = new FormData(this);
    
    fetch("{{ route('projects.control.store2') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close the modal
            let modal = bootstrap.Modal.getInstance(document.getElementById('addProjectModal'));
            modal.hide();
            
            // Clear form fields
            document.getElementById('addProjectForm').reset();

            // Dynamically add the new project card at the beginning
            const projectRow = document.querySelector('.row');
            const newCard = document.createElement('div');
            newCard.classList.add('col-xl-4');
            newCard.innerHTML = `
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="avatar-sm mx-auto mb-4">
                                <span class="avatar-title rounded-circle bg-primary-subtle font-size-24">
                                    <img src="${data.project.pro_image}" class="project-image" alt="">
                                </span>
                            </div>
                            <p class="font-16 text-muted mb-2">${data.project.pro_name}</p>
                            <h5><a href="${data.project.pro_link}" class="text-dark" target="_blank">${data.project.pro_name}</a></h5>
                            <div class="mt-3">
                                <a href="javascript:void(0);" class="btn btn-primary">Edit</a>
                                <form action="javascript:void(0);" method="POST" style="display:inline;">
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            projectRow.prepend(newCard);
        }
    })
    .catch(error => console.error('Error:', error));
});

 </script>   
            @endsection
            