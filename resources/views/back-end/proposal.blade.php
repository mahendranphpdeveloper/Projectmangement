@extends('layout.adminPageControl')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    .flatpickr-input[readonly] {
    cursor: pointer;
    width: 25%;
}

    .full-screen {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border: 2px solid transparent;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }
    .full-screen img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
    }
    .selected {
        border: 2px solid #007BFF;
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
    }
    select.form-select.status-select {
    width: max-content;
    margin: 7px 16px;
    background: #4af9ff;
}
/* Container for the tab list */
.nav-tabs {
    border-bottom: 2px solid #ddd; /* Light border under the tabs */
    margin-bottom: 20px; /* Space below the tabs */
}

/* Each tab item */
.nav-tabs .nav-item {
    margin-bottom: -1px; /* Align the tabs to the bottom border */
}

/* Each tab link */
.nav-tabs .nav-link {
    background-color: #f8f9fa; /* Light background color for inactive tabs */
    border: 1px solid #ddd; /* Light border around each tab */
    border-radius: 5px 5px 0 0; /* Rounded corners on the top */
    padding: 10px 20px; /* Padding for a more spacious tab */
    color: #555; /* Text color for inactive tabs */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition on hover */
}

.nav-tabs .nav-link.active {
    background-color: #000000;
    border-color: #000000;
    color: #fff;
}

/* Hover effect for tabs */
.nav-tabs .nav-link:hover {
    background-color: #e2e6ea; /* Background color on hover */
    color: #007bff; /* Text color on hover */
}

/* Focus effect for tabs (keyboard navigation) */
.nav-tabs .nav-link:focus {
    outline: none; /* Remove default focus outline */
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); /* Custom focus outline */
}

</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center mb-3">
                        <h3>Sent Proposal List</h3>
                    </div>
                    <div class="table-responsive">
                        <table id="contactTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Follow-up</th>  
                                    <th>Date of Inquiry</th>
                                    <th>Client Name</th>
                                    <th>Contact Details</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="contactTableBody">
                                @if(isset($contact))
                                @foreach ($contact as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><a href="{{route('client.follow', ['id' => $item->id ])}}" class="btn btn-primary">follow</a></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td><select class="form-select status-select-for-proposal" data-client-id="{{ $item->id }}">
                                            <option value="" selected>Not Send</option>
                                            <option value="Completed">Send</option>
                                        </select></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function() {
    $('#contactTable').DataTable({
        "order": [[ 0, "desc" ]],
        "paging": true,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "lengthMenu": [5, 10, 25, 50],
        "columnDefs": [
            { "orderable": false, "targets": [2, 6] }
        ],
    });
});
</script>
<script>
    $(document).ready(function() {
        $('.status-select-for-proposal').on('change', function() {
            var clientId = $(this).data('client-id'); // Get client ID from data attribute
            var status = $(this).val(); // Get the selected status

            $.ajax({
                url: '{{ route("client.proposalUpadate") }}', // Route to the update status method
                type: 'POST',
                data: {
                    client_id: clientId,
                    status: status,
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    if(response.success) {
                        Toastify({
                            text: response.message || "Client status updated successfully.", // Use response message
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#28a745",
                            stopOnFocus: true,
                        }).showToast();
                        window.location.reload();
                    } else {
                        Toastify({
                            text: response.message || "Error updating status.",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f10606",
                            stopOnFocus: true,
                        }).showToast();
                    }
                },
                error: function(xhr) {
                    Toastify({
                        text: "An error occurred. Please try again.",
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
    });
</script>
@endsection
