@extends('layout.adminPageControl')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    
    <style>
        .draggable {
            cursor: move;
        }

        .highlight {
            background-color: #f0f0f0;
            /* Highlight color for dragged rows */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            border-bottom: 2px solid #ddd;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table td i {
            cursor: pointer;
        }

        .bx-edit {
            color: #007bff;
            /* Blue color for edit */
        }

        .bx-edit:hover {
            color: #0056b3;
        }

        .bx-trash:hover {
            color: #b30000;
            /* Darker red for hover */
        }

        /* Style for drag-and-drop rows */
        .draggable {
            transition: background-color 0.2s ease;
        }

        .draggable:hover {
            background-color: #e0e0e0;
        }
    </style>
    
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box ">
                            <h4 class="mb-sm-0 font-size-18">Get Touch Us</h4>
                        </div>
                        <div class="row mb-3 align-items-end justify-content-end">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#segmentModal">Add New</button>
                            </div>
                        </div>
                        

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title 1</th>
                                    <th>Title 2</th>
                                    <th>Title 3</th>
                                    <th>Brands</th>
                                    <th>Content</th>
                                    <th>Sort Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="recordList">
                                @foreach ($records as $record)
                                <tr data-id="{{ $record->id }}" class="draggable">
                                    <td>{{ $record->title1 }}</td>
                                    <td>{{ $record->title2 }}</td>
                                    <td>{{ $record->title3 }}</td>
                                    <td>{{ $record->brands }}</td>
                                    <td>{{ $record->content }}</td>
                                    <td>{{ $record->sort_order }}</td>
                                    <td>
                                        <i class="bx bx-edit" onclick="openEditModal({{ $record->id }})"></i>
                                        <i class="bx bx-trash" onclick="deleteRecord({{ $record->id }})"></i>
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

    <!-- Edit Modal -->
    <div class="modal fade" id="segmentModal" tabindex="-1" aria-labelledby="segmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="segmentModalLabel">Edit Segment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="segmentId"> <!-- Hidden field for the segment ID -->
                    <div class="mb-3">
                        <label for="segmentTitle" class="form-label">Title 1</label>
                        <input type="text" class="form-control" id="segmentTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="segmentTitle2" class="form-label">Title 2</label>
                        <input type="text" class="form-control" id="segmentTitle2" required>
                    </div>
                    <div class="mb-3">
                        <label for="segmentTitle3" class="form-label">Title 3</label>
                        <input type="text" class="form-control" id="segmentTitle3" required>
                    </div>
                    <div class="mb-3">
                        <label for="segmentBrands" class="form-label">Brands</label>
                        <input type="text" class="form-control" id="segmentBrands" required>
                    </div>
                    <div class="mb-3">
                        <label for="segmentContent" class="form-label">Content</label>
                        <textarea class="form-control" id="segmentContent" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="segmentSortOrder" class="form-label">Sort Order</label>
                        <input type="text" class="form-control" id="segmentSortOrder" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSegment()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Open edit modal with pre-filled data
        function openEditModal(id) {
            $.get(`/admin/get-touch/${id}`, function(data) {
                $('#segmentId').val(data.id);
                $('#segmentTitle').val(data.title1);
                $('#segmentTitle2').val(data.title2);
                $('#segmentTitle3').val(data.title3);
                $('#segmentBrands').val(data.brands);
                $('#segmentContent').val(data.content);
                $('#segmentSortOrder').val(data.sort_order);
                $('#segmentModal').modal('show');
            });
        }

        // Save changes in the edit modal
        function saveSegment() {
            let id = $('#segmentId').val();
            let data = {
                title1: $('#segmentTitle').val(),
                title2: $('#segmentTitle2').val(),
                title3: $('#segmentTitle3').val(),
                brands: $('#segmentBrands').val(),
                content: $('#segmentContent').val(),
                sort_order: $('#segmentSortOrder').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };
            console.log("yeeees");
            $.ajax({
                url: `/admin/get-touch/${id}`,
                type: 'POST',
                data: data,
                success: function(response) {
                    Toastify({
                        text: response.success,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#4CAF50", // Green for success
                    }).showToast();
                    location.reload();  // Reload the page to see changes
                },
                error: function(xhr) {
                    console.log(xhr);
                    let error = xhr.responseJSON.message || "An error occurred";
                    Toastify({
                        text: "Failed to update: " + error,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#F44336", // Red for error
                    }).showToast();
                }
            });
        }

        // Delete record
        function deleteRecord(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    url: `/admin/get-touch/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Toastify({
                            text: response.success,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                        location.reload();  // Reload to see updated list
                    },
                    error: function(xhr) {
                        let error = xhr.responseJSON.message || "An error occurred";
                        Toastify({
                            text: "Failed to delete: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336", // Red for error
                        }).showToast();
                    }
                });
            }
        }
    </script>
@endsection
