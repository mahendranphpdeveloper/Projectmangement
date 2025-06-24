@extends('layout.adminPageControl')
@section('content')

<style>
    .large-edit {
        font-size: 15px;
        /* Adjust size as needed */
        color: #555;
        /* Change color to your preference */
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Project Type Table</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#firstmodal">
                            Add Project Type
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Project Type</th>
                                            <th>Sort Order</th>
                                            {{-- <th>Created Date </th> --}}
                                            {{-- <th>Sub Menu </th> --}}
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
                                        @php
                                        $i =1;
                                        @endphp
                                        @foreach ($menu as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->service }}</td>
                                            <td>{{ $item->sortOrder }}</td>
                                            {{-- <td>{{ $item->created_at->format('Y-m-d H:i') }}</td> --}}
                                            {{-- <td><a href="{{route('submenu',['id' => $item->id])}}">
                                            <div class="d-flex">Sub Menu<i class='bx bx-subdirectory-right bx-sm'></i></div>
                                            <!-- <i class='bx bx-menu bx-sm'></i> -->
                                            </a></td> --}}
                                            <td>
                                                <i class="bx bx-edit bx-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id }}" data-menu="{{ $item->service }}" data-sort="{{ $item->sortOrder }}"></i>
                                                <i class='bx bx-trash bx-sm' style="color:red" data-id="{{ $item->id }}"></i>
                                            </td>
                                        </tr>
                                        @php
                                        $i++
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    
    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="firstModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="firstModalLabel">Add Project Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form with Input Fields -->
                    <form action="{{route('service.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="menuName" class="form-label">Project Type</label>
                            <input type="text" class="form-control" id="menuName" name="menuName" placeholder="Enter Menu Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="sortOrder" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="sortOrder" name="sortOrder" value="{{ $menuCount ?? 0 }}" placeholder="Enter Sort Order" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveChanges">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Project Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form with Input Fields -->
                    <form id="editForm" action="" method="POST"> <!-- Action will be updated dynamically -->
                        @csrf                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" id="menuId" name="id"> <!-- Hidden ID field -->
                        <div class="mb-3">
                            <label for="editMenuName" class="form-label">Project Type</label>
                            <input type="text" class="form-control" id="editMenuName" name="menuName" placeholder="Enter Menu Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSortOrder" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="editSortOrder" name="sortOrder" placeholder="Enter Sort Order" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <!-- Buttons -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveChanges">Save Changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
       $(document).ready(function() {
    $('.bx-edit').on('click', function() {
        const id = $(this).data('id');
        const menu = $(this).data('menu');
        const sortOrder = $(this).data('sort');

        const link = `/admin/service/${id}`;

        // Set the form action URL
        $('#editForm').attr('action', link);

        // Populate the form fields with data
        $('#menuId').val(id);
        $('#editMenuName').val(menu);
        $('#editSortOrder').val(sortOrder);
    });

    // Handle form submission
    $('#editForm').on('submit', function(e) {
        e.preventDefault(); 

        // Serialize form data
        const formData = $(this).serialize(); 

        const id = $('#menuId').val();
        const url = "{{route('service.update',['service' => ':id'])}}".replace(':id',id);

        $.ajax({
            url: url, // Use the form action URL
            type: 'PUT', // Change to 'PUT' for updating a resource
            data: formData + '&_token={{ csrf_token() }}',
            success: function(response) {
                // Show success message
                Toastify({
                    text: response.message || "Service updated successfully.", // Use response message
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#28a745",
                    stopOnFocus: true,
                }).showToast();

                $('#editModal').modal('hide'); // Hide the modal
                location.reload(); // Optionally reload the page to see changes
            },
            error: function(xhr) {
                // Handle error
                const response = xhr.responseJSON;
                console.error(response);

                Toastify({
                    text: response.message || "An error occurred. Please try again.", // Use response message
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f10606",
                    stopOnFocus: true,
                }).showToast();
            }
        });
    });

$('.bx-trash').on('click', function() {
        const id = $(this).data('id');
        const $row = $(this).closest('tr');
        console.log("id = " + id);  

        if (confirm('Are you sure you want to delete this service? this also delete the all under subService!')) {
            $.ajax({
                url: "{{route('service.destroy',['service' => ':id'])}}".replace(':id',id),  
                type: 'DELETE',
                data:{
                    id: id,
                    _token: '{{csrf_token()}}'
                }, 
                success: function(response) {
                    // Remove the row from the table on successful delete
                    $row.remove();
                    
                    Toastify({
                        text: response.message || "Item deleted successfully.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#28a745",  // Change to green for success
                        stopOnFocus: true,
                    }).showToast(); // Display success message
                },
                error: function(xhr, status, error) {
                    // Extract and log the detailed error information
                    console.log('Error Details:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error
                    });

                    // Display a more detailed error message to the user
                    let errorMessage = 'An error occurred while trying to delete the item.';

                    // Check if there is a response text
                    if (xhr.responseText) {
                        try {
                            // Try to parse the response text as JSON
                            const response = JSON.parse(xhr.responseText);
                            errorMessage = response.message || errorMessage;
                        } catch (e) {
                            // If parsing fails, use the raw response text
                            errorMessage = xhr.responseText || errorMessage;
                        }
                    }

                    Toastify({
                        text: errorMessage || "An error occurred. Please try again.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f10606",  // Red for error
                        stopOnFocus: true,
                    }).showToast();
                }
            });
        }
    });
    });
</script>
@if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    Toastify({
                        text: "{{ $error }}",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f10606",
                        stopOnFocus: true,
                    }).showToast();
                </script>
            @endforeach
        @endif
@if (session('success'))
<script>
    Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#28a745",
        stopOnFocus: true,
    }).showToast();
</script>
@endif
@endsection