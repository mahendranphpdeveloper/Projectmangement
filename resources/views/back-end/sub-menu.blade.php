@extends('layout.adminPageControl')
@section('content')

<style>
    .large-edit {
        font-size: 15px;
        color: #555;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18"> {{ isset($menu->menu) ? $menu->menu : '' }} <i class='bx bx-chevron-right'></i>  Sub Menu Table</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-id=" {{ isset($menu->id) ? $menu->id : '' }}" data-bs-toggle="modal" data-bs-target="#firstmodal">
                            Add New Sub Menu
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Menu</th>
                                            <th>Sort Order</th>
                                            <th>Created Date</th>
                                            <th>Delete</th> <!-- Added Delete Column -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subMenus as $subMenu)
                                        <tr>
                                            <td>{{ $subMenu->id }}</td>
                                            <td>{{ $subMenu->menu }}</td>
                                            <td>{{ $subMenu->sortOrder }}</td>
                                            <td>{{ $subMenu->created_at }}</td>
                                            <td>
                                                <!-- <button type="button" class="btn btn-warning bx bx-edit" data-id="{{ $subMenu->id }}" data-menu="{{ $subMenu->menu_name }}" data-sort="{{ $subMenu->sort_order }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> -->
                                                
                                            <i class="bx bx-edit bx-sm" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $subMenu->id }}" data-menu="{{ $subMenu->menu }}" data-sort="{{ $subMenu->sortOrder }}"></i>
                                            <i class='bx bx-trash bx-sm' style="color:red" data-id="{{ $subMenu->id }}"></i>
                                            </td> <!-- Added Delete Button -->
                                        </tr>
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
    
    <!-- Add Modal -->
    <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="firstModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="firstModalLabel">Add Sub Menu Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form with Input Fields -->
                    <form action="{{ route('sub-menu.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="menuID" id="menuId">
                        <div class="mb-3">
                            <label for="menuName" class="form-label">Sub Menu</label>
                            <input type="text" class="form-control" id="menuName" name="menuName" placeholder="Enter Sub Menu Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="sortOrder" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="sortOrder" name="sortOrder" value="{{ $menuCount ?? 0 }}" placeholder="Enter Sort Order" required>
                        </div>
                        <div class="modal-footer">
                            <!-- Buttons -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="saveChanges">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Sub Menu Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form with Input Fields -->
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="menuId">
                        <div class="mb-3">
                            <label for="editMenuName" class="form-label">Sub Menu</label>
                            <input type="text" class="form-control" id="editMenuName" name="menuName" placeholder="Enter Sub Menu Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSortOrder" class="form-label">Sort Order</label>
                            <input type="number" class="form-control" id="editSortOrder" name="sortOrder" placeholder="Enter Sort Order" required>
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
        $('button[data-bs-target="#firstmodal"]').on('click', function() {
            const menuId = $(this).data('id');
            $('#menuId').val(menuId.trim());
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Populate edit modal with data
        $('.bx-edit').on('click', function() {
            const id = $(this).data('id');
            const menu = $(this).data('menu');
            const sortOrder = $(this).data('sort');

            $('#editForm').attr('action', `/sub-menu/${id}`);
            $('#menuId').val(id);
            $('#editMenuName').val(menu);
            $('#editSortOrder').val(sortOrder);
        });

        // Handle edit form submission
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Toastify({
                        text: response.message || "Menu updated successfully.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#28a745",
                        stopOnFocus: true,
                    }).showToast();

                    $('#editModal').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    const response = xhr.responseJSON;
                    console.error(response);

                    Toastify({
                        text: response.message || "An error occurred. Please try again.",
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
        const $row = $(this).closest('tr'); // Capture the row reference
        console.log(id);  // For debugging, to ensure you're getting the right ID

        if (confirm('Are you sure you want to delete this sub menu?')) {
            $.ajax({
                url: `/sub-menu/${id}`,  // Use ID in URL for better RESTful practice
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Set CSRF token in headers
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
