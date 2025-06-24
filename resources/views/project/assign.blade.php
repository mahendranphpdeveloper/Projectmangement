@extends('layout.adminPageControl')

@section('content')

<style>
    :root {
        --spacing: 1.5rem;
        --radius: 10px;
    }

    /* Employee Card Styling */
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }

    .employee-card {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: calc(33.333% - 20px); /* Three cards per row */
        max-width: 400px;
        transition: all 0.3s ease-in-out;
        border: 1px solid #e3e6f0;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .employee-card {
            width: calc(50% - 20px); /* Two cards per row on medium screens */
        }
    }

    @media (max-width: 480px) {
        .employee-card {
            width: 100%; /* One card per row on small screens */
        }
    }

    .employee-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .employee-card h5 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #343a40;
        margin-bottom: 5px;
    }

    .employee-card p.position-text {
        font-size: 0.9rem;
        color: #0b6b30;
        background: #d1ecf1;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
    }

    /* Tree View Styling */
    .tree {
        margin-left: 0;
        padding-left: 0;
        list-style-type: none;
    }
    .tree li {
    display: block;
    position: relative;
    padding-left: calc(2 * var(--spacing) - var(--radius) - 2px);
    margin-top: 10px;
    margin-right: 37px;
}

    .tree ul {
        margin-left: calc(var(--radius) - var(--spacing));
        padding-left: 0;
    }

    .tree ul li {
        border-left: 2px solid #ddd;
    }

    .tree ul li:last-child {
        border-color: transparent;
    }

    .tree ul li::before {
        content: '';
        display: block;
        position: absolute;
        top: calc(var(--spacing) / -2);
        left: -2px;
        width: calc(var(--spacing) + 2px);
        height: calc(var(--spacing) + 1px);
        border: solid #ddd;
        border-width: 0 0 2px 2px;
    }

    .tree summary {
    display: block;
    color: #0b6b30;
    cursor: pointer;
}

    .tree summary::marker,
    .tree summary::-webkit-details-marker {
        display: none;
    }

    .tree summary:focus {
        outline: none;
    }

    .tree summary:focus-visible {
        outline: 1px dotted #000;
    }

    .tree li::after,
    .tree summary::before {
        content: '';
        display: block;
        position: absolute;
        top: calc(var(--spacing) / 2 - var(--radius));
        left: calc(var(--spacing) - var(--radius) - 1px);
        width: calc(2 * var(--radius));
        height: calc(2 * var(--radius));
        border-radius: 50%;
        background: #ddd;
    }

    .tree summary::before {
        z-index: 1;
        background-color: #28a745; 
    border-color: #28a745;    
    box-shadow: 0 0 0 4px rgba(40, 167, 69, 0.3); 
    }

    .tree details[open] > summary::before {
        background-position: calc(-2 * var(--radius)) 0;
    }

    /* Checkbox Styling */
    .checkbox-container {
        display: flex;
        align-items: center;
        gap: 8px;
        padding-left: 20px;
    }
    details {
    margin-left: 5px;
}
/* Styling the checkbox container */
.checkbox-container input[type="checkbox"] {
    width: 22px;
    height: 22px;
    position: absolute;
    margin-right: 0px;
    left: 14px;
    z-index: 1;
    top: 3px;
    margin-right: 8px;
    cursor: pointer;
    appearance: none;
    border-radius: 50%;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.checkbox-container input[type="checkbox"]:checked {
    background-color: #28a745; 
    border-color: #28a745;    
    box-shadow: 0 0 0 4px rgba(40, 167, 69, 0.3); 
}

.checkbox-container input[type="checkbox"]:checked::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 12px;
    height: 12px;
    /* background-color: #0b6b30; */
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

.checkbox-container input[type="checkbox"]:checked + label {
    color: #28a745;  /* Change label color to green when checkbox is checked */
}


    .module-status.active {
        background-color: #0b6b30; /* Green */
    }

    .module-status.pending {
        background-color: #ffc107; /* Yellow */
    }

    .module-status.completed {
        background-color: #007bff; /* Blue */
    }

    .module-status.on-hold {
        background-color: #dc3545; /* Red */
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">
            <div class="card-container">
                @foreach($employees as $employee)
                    <div class="employee-card" onclick="toggleProjects(this)">
                        <h5>{{ $employee->name }}</h5>
                        <p class="position-text">{{ $employee->designation->position_title ?? 'No designation' }}</p>
                        <div class="project-list">
                            <h6 class="mt-3">Projects Assigned:</h6>
                            @if($employee->projects->isNotEmpty())
                                <ul class="tree">
                                    @foreach($employee->projects as $project)
                                        <li>
                                            <details>
                                                <summary>{{ $project->pro_name }}</summary>
                                                <ul>
                                                    @foreach($project->module as $module)
                                                    <li>
                                                        <div class="checkbox-container">
                                                            <!-- This checkbox is pre-checked if the employee is already assigned to the module -->
                                                            <input type="checkbox" class="module-checkbox" name="modules[]" 
                                                                   data-project-id="{{ $project->id }}" data-employee-id="{{ $employee->id }}" 
                                                                   value="{{ $module->id }}" 
                                                                   id="module-{{ $module->id }}-{{ $project->id }}-{{ $employee->id }}" 
                                                                   {{ $employee->id == $module->employee_id ? 'checked' : '' }}>
                                                            <label for="module-{{ $module->id }}-{{ $project->id }}-{{ $employee->id }}">{{ $module->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                
                                                </ul>
                                            </details>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <em>No projects assigned</em>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function toggleProjects(card) {
    const projectList = card.querySelector('.project-list');
    projectList.style.display = (projectList.style.display === 'block' || projectList.style.display === '') ? 'none' : 'block';
}

document.querySelectorAll('.employee-card .project-list').forEach(projectList => {
    projectList.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});
$('.checkbox-container input[type="checkbox"]').on('change', function() {
    var moduleId = $(this).val(); // Get the module ID
    var isChecked = $(this).prop('checked'); // Whether checkbox is checked
    var projectId = $(this).data('project-id'); // Get the project ID
    var employeeId = $(this).data('employee-id'); // Get the employee ID

    console.log(isChecked);
    var url = `{{ route('assign.modules') }}`;

    // Send the AJAX request
    $.ajax({
        url: url, // This is the route you defined for assignment
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}', // CSRF Token
            module_id: moduleId,
            is_checked: isChecked,
            project_id: projectId,
            employee_id: employeeId
        },
        success: function(response) {
            
        Toastify({
            text: response.message,
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4CAF50",
        }).showToast();
        
    },
    error: function(xhr, status, error) {
        console.error(error);
        Toastify({
            text: xhr.responseJSON.message || "Something went wrong. Please try again!",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#dc3545",
        }).showToast();
    }
    });
});

</script>

@endsection
