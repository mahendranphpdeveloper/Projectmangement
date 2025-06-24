@extends('layout.adminPageControl')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <style>
        /* Container for the switch */
.switch-container {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 32px;
}

/* Hide the default checkbox */
.status-switch {
    opacity: 0;
    width: 0;
    height: 0;
}

/* Style the label to create the switch background */
.switch-label {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    border-radius: 24px;
    cursor: pointer;
    transition: background-color 0.2s;
}

/* The round button inside the switch */
.switch-button {
    position: absolute;
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 2px;
    background-color: white;
    border-radius: 50%;
    transition: 0.4s;
}

/* When the checkbox is checked, move the button to the right */
.status-switch:checked + .switch-label .switch-button {
    transform: translateX(26px);
}

/* Background color change when the checkbox is checked */
.status-switch:checked + .switch-label {
    background-color: #4caf50;
}

/* Background color when unchecked */
.switch-label {
    background-color: #ccc;
}

        .draggable {
            cursor: move; /* Cursor for rows that can be dragged */
        }

        .highlight {
            background-color: #f0f0f0; /* Highlight color for dragged rows */
        }

        /* Specific cursor for edit and delete icons */
        .bx {
            cursor: pointer; /* Cursor for icons to indicate they are clickable */
        }

        .bx-edit, .bx-trash {
            pointer-events: auto; /* Ensure icons are clickable */
        }
    </style>
    <div class="main-content">
        <div class="page-content">
            <div>Page > {{ $page->name??'' }}</div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">{{ $page->name ?? '' }} Page Sections</h4>
                        </div>
                        <div class="d-flex justify-content-end align-items-end mb-3">
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                                Add Section
                            </button> --}}
                        </div>
                        <div class="row mb-3 align-items-center">
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="segmentsTableBody">
                                    @foreach ($sections as $section)
                                        <tr id="segment-{{ $section->id }}" class="draggable" draggable="true">
                                            <td>{{ $section->id }}</td>
                                            <td>
                                                <a href="{{ route('section.choose', ['id' => $page->id]) }}#{{ Illuminate\Support\Str::slug($section->title, '-') }}">
                                                    {{ $section->title }}
                                                </a>                                                
                                            </td>
                                                                                        {{-- <td>
                                                <i class="bx bx-edit bx-sm" data-bs-toggle="modal"
                                                   data-bs-target="#editSectionModal"
                                                   data-section-id="{{ $section->id }}"
                                                   data-title="{{ $section->title }}"></i>
                                                <i class='bx bx-trash bx-sm' style="color:red"
                                                   data-section-id="{{ $section->id }}"></i>
                                            </td> --}}
                                            <td>
                                                <div class="switch-container">
                                                    <input type="checkbox" 
                                                           class="status-switch" 
                                                           id="switch-{{ $section->id }}" 
                                                           data-section-id="{{ $section->id }}" 
                                                           data-status="{{ $section->status }}" 
                                                           {{ $section->status == 0 ? 'checked' : '' }}>
                                                    <label for="switch-{{ $section->id }}" class="switch-label">
                                                        <span class="switch-button"></span>
                                                    </label>
                                                </div>
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
    </div
    <!-- Add Section Modal -->
    <div class="modal fade" id="addSectionModal" tabindex="-1" aria-labelledby="addSectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionModalLabel">Add Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSectionForm">
                        <input type="hidden" name="page_id" value="{{ $page->id }}">
                        <div class="mb-3">
                            <label for="addSectionTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="addSectionTitle" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Section Modal -->
    <div class="modal fade" id="editSectionModal" tabindex="-1" aria-labelledby="editSectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectionModalLabel">Edit Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSectionForm">
                        <input type="hidden" id="editSectionId">
                        <div class="mb-3">
                            <label for="editSectionTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="editSectionTitle" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Section</button>
                    </form>
                </div>
            </div>
        </div>
    </div>>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const segmentsTableBody = document.getElementById('segmentsTableBody');
let draggedRow = null;

segmentsTableBody.addEventListener('click', function (e) {
    if (e.target.classList.contains('bx-edit')) {
        const sectionId = e.target.getAttribute('data-section-id');
        editSegment(sectionId);
    }

    if (e.target.classList.contains('bx-trash')) {
        const sectionId = e.target.getAttribute('data-section-id');
        deleteSegment(sectionId);
    }
});

segmentsTableBody.addEventListener('dragstart', function (e) {
    const row = e.target.closest('tr');
    if (row) {
        draggedRow = row;
        draggedRow.classList.add('highlight');
        console.log('Drag started for row:', draggedRow.id); 
    } else {
        console.error('Drag started but no row found.');
    }
});

segmentsTableBody.addEventListener('dragover', function (e) {
    e.preventDefault();
    const currentRow = e.target.closest('tr');
    if (currentRow && currentRow !== draggedRow) {
        currentRow.classList.add('highlight'); 
    }
});

segmentsTableBody.addEventListener('dragleave', function (e) {
    const currentRow = e.target.closest('tr');
    if (currentRow) {
        currentRow.classList.remove('highlight');
    }
});

segmentsTableBody.addEventListener('drop', function (e) { 
    e.preventDefault();
    const targetRow = e.target.closest('tr');

    if (!targetRow || !targetRow.closest('tbody') || !draggedRow) {
        console.error("Invalid row(s) detected:", { targetRow, draggedRow });
        return; 
    }

    console.log('Drop event: targetRow ID:', targetRow.id);
    
    if (targetRow !== draggedRow) {
        const draggedRowIndex = Array.from(segmentsTableBody.rows).indexOf(draggedRow);
        const targetRowIndex = Array.from(segmentsTableBody.rows).indexOf(targetRow);

        if (targetRowIndex > draggedRowIndex) {
            segmentsTableBody.insertBefore(draggedRow, targetRow.nextSibling);
        } else {
            segmentsTableBody.insertBefore(draggedRow, targetRow); 
        }

        const newOrderId = targetRow.id.split('-')[1];
        const oldOrderId = draggedRow.id.split('-')[1]; 
        
        updateOrder(oldOrderId, newOrderId);
    }

    if (draggedRow) {
        draggedRow.classList.remove('highlight');
        draggedRow = null; 
    }
});


            function updateOrder(draggedId, targetId) {
                fetch("{{ route('sortorder.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ draggedId: draggedId, targetId: targetId })
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(error => {
                            console.error("AJAX Error:", error);
                            showToast(error.message, "#F44336"); // Red for error
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                    showToast("Order updated successfully!", "#4CAF50"); // Green for success
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Failed to update order:', error);
                    showToast("Failed to update order: " + error, "#F44336"); // Red for error
                });
            }

            function showToast(message, bgColor) {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: bgColor,
                }).showToast();
            }
        });
    </script>
     <script>
         document.addEventListener('DOMContentLoaded', function () {
             const segmentsTableBody = document.getElementById('segmentsTableBody');
 
             // Event delegation for edit and delete icons
             segmentsTableBody.addEventListener('click', function (e) {
                 if (e.target.classList.contains('bx-edit')) {
                     const sectionId = e.target.getAttribute('data-section-id');
                     const title = e.target.getAttribute('data-title');
 
                     // Populate the edit form with current data
                     document.getElementById('editSectionId').value = sectionId;
                     document.getElementById('editSectionTitle').value = title;
                 }
 
                 if (e.target.classList.contains('bx-trash')) {
                     const sectionId = e.target.getAttribute('data-section-id');
                     deleteSegment(sectionId);
                 }
             });
 
             document.getElementById('addSectionForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission
    const title = document.getElementById('addSectionTitle').value;
    const pageId = document.querySelector('input[name="page_id"]').value;

    console.log("Adding section with title: ", title, " and page ID: ", pageId); // Debug log

    if (!title || !pageId) {
        showToast("Please fill in all fields.", "#F44336");
        return; // Exit if validation fails
    }

    const url = "{{ route('sections.store') }}"; 
    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": '{{ csrf_token() }}' // Log token for debugging
        },
        body: JSON.stringify({ title: title, page_id: pageId })
    })
    .then(response => {
        console.log('Response received: ', response); // Log response
        return response.json();
    })
    .then(data => {
        console.log('Data returned: ', data); // Log returned data
        if (data.success) {
            addRow(data.section);
            showToast("Section added successfully!", "#4CAF50");
            $('#addSectionModal').modal('hide');
            window.location.reload();
        } else {
            showToast(data.message, "#F44336");
        }
    })
    .catch(error => {
        console.error('Failed to add section:', error); // Log errors
        showToast("Failed to add section: " + error.message, "#F44336");
    });
});

document.getElementById('editSectionForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const id = document.getElementById('editSectionId').value;
    const title = document.getElementById('editSectionTitle').value;

    console.log("Updating section with ID: ", id, " to title: ", title); // Debug log

    if (!title) {
        showToast("Please fill in the title.", "#F44336");
        return; // Exit if validation fails
    }
    const url = "{{ route('sections.update',[':id']) }}".replace(':id',id); 
    fetch(url, {
        method: "PUT",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": '{{ csrf_token() }}'
        },
        body: JSON.stringify({ title: title })
    })
    .then(response => {
        console.log('Response received: ', response); // Log response
        return response.json();
    })
    .then(data => {
        if (data.success) {
            updateRow(id, title);
            showToast("Section updated successfully!", "#4CAF50");
            $('#editSectionModal').modal('hide');
            window.location.reload();
        } else {
            showToast(data.message, "#F44336");
        }
    })
    .catch(error => {
        console.error('Failed to update section:', error);
        showToast("Failed to update section: " + error.message, "#F44336");
    });
});

function addRow(section) {
    const newRow = `
        <tr id="segment-${section.id}" class="draggable" draggable="true">
            <td>${section.id}</td>
            <td>${section.title}</td>
            <td>
                <i class="bx bx-edit bx-sm" data-bs-toggle="modal" data-bs-target="#editSectionModal"
                   data-section-id="${section.id}" data-title="${section.title}"></i>
                <i class='bx bx-trash bx-sm' style="color:red" data-section-id="${section.id}" onclick="deleteSegment(${section.id})"></i>
            </td>
        </tr>`;
    segmentsTableBody.insertAdjacentHTML('beforeend', newRow);
}

function updateRow(id, title) {
    const row = document.getElementById(`segment-${id}`);
    row.querySelector('td:nth-child(2)').innerText = title;
}

function deleteSegment(sectionId) {
    if (confirm("Are you sure you want to delete this section?")) {
        const url = "{{ route('sections.destroy',[':id']) }}".replace(':id',sectionId); 
        fetch(url, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": '{{ csrf_token() }}'
            },
        })
        .then(response => {
        console.log('Response received: ', response); // Log response
        return response.json();
    })
        .then(data => {
            console.log(data); // Log data returned from server
            if (data.success) {
                document.getElementById(`segment-${sectionId}`).remove();
                showToast("Section deleted successfully!", "#4CAF50");
            } else {
                showToast(data.message, "#F44336");
            }
        })
        .catch(error => {
            console.error('Failed to delete section:', error);
            showToast("Failed to delete section: " + error.message, "#F44336");
        });
    }
}

function showToast(message, bgColor) {
    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: bgColor,
    }).showToast();
}

         });
     </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
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
    $(document).ready(function() {
        // Handle switch toggle event
        $('.status-switch').on('change', function() {
            var checkbox = $(this);
            var sectionId = checkbox.data('section-id');
            var newStatus = checkbox.is(':checked') ? 0 : 1;  // Active if checked, Deactive if unchecked

            // Send an AJAX request to update the status
            $.ajax({
                url: '{{ route("section.updateStatus") }}',  // Add your update route here
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    section_id: sectionId,
                    status: newStatus
                },
                success: function(response) {
                    if (response.success) {
                        showToast2('Status updated successfully!','green');
                    } else {
                        showToast2('Failed to update status!','yellow');
                    }
                },
                error: function() {
                    showToast2('An error occurred while updating the status!','red');
                }
            });
        });
    });
</script>

@endsection
