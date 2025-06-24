@extends('layout.adminPageControl')
@section('content')
@php
$user =Illuminate\Support\Facades\Auth::user();
@endphp
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
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Inquiries</h4>
                    </div>
                    <div class="d-flex justify-content-around align-items-center mb-3">
                        <input type="text" id="datePicker" class="form-control" placeholder="Select Date">
                        <form id="importForm" action="{{ route('import.contacts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file" class="d-none">Import Contacts (Excel file):</label>
                                <input type="file" name="file" id="fileInput" class="form-control-file d-none" required>
                                @if ($user->admin_role == 'Admin')
                                <button type="button" class="btn btn-success" onclick="document.getElementById('fileInput').click();">Import Excel</button>
                                @endif
                            </div>
                        </form>
                        
                        @if ($user->admin_role == 'Admin')
                        <a href="{{ route('download.sample') }}" class="btn btn-info">Sample Excel</a>
                        @endif
                    </div>                    
                    <div class="table-responsive">
                        <table id="contactTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                     <th>Follow-up</th>  
                                    <th>Date of inquiry</th>
                                    <th>Client Name</th>
                                    <th>Contact Details</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Category</th>
                                    @if ($user->admin_role == 'Admin')
                                    <th>Action</th>
                                   @endif
                                    {{-- <th>Action</th>   --}}
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
                                        <td>{{ $item->category }}</td>
                                        @if ($user->admin_role == 'Admin')
                                        <td>  <i class="bx bx-edit bx-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal"
                                        onclick="editSegment({{ $item->id }})"></i>
                                    <i class='bx bx-trash bx-sm' style="color:red"
                                        onclick="deleteSegment({{ $item->id }})"></i>
                                    </td>
                                    @endif
                                        {{-- <td><a href="{{route('client.follow', ['id' => $item->id ])}}" class="btn btn-primary">follow</a></td> --}}
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Client Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" id="clientId">
                    <div class="mb-3">
                        <label for="segment" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="segment" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="companyName" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="url" class="form-label">Website or URL</label>
                        <input type="text" class="form-control" name="url" id="url" required>
                    </div> --}}
                    {{-- <div class="mb-3">
                        <label for="contactPerson" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" id="contactPerson" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" id="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="zipcode" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" id="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Service</label>
                        <input type="text" class="form-control" name="service" id="service" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Content</label>
                        <textarea name="content" id="content" cols="70" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
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
    flatpickr("#datePicker", {
        mode: "range",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
        if (selectedDates.length === 2) {
                let startDate = selectedDates[0];
                let endDate = selectedDates[1];
                
                let startDateStr = flatpickr.formatDate(startDate, "Y-m-d");
                let endDateStr = flatpickr.formatDate(endDate, "Y-m-d");
                console.log("startDateStr : " + startDateStr);
                console.log("endDateStr : " + endDateStr);
                $.ajax({
                    url: "{{ route('inquiries.filter') }}",
                    method: "POST",
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    data: { startDate: startDateStr, endDate: endDateStr },
                    success: function(data) {
                        let tableBody = $('#contactTableBody');
                        tableBody.empty();  // Clear the table

                        data.forEach(function(item) {
                            let row = `<tr>
                                <td>${item.id}</td>
                                <td><a href="{{ url('/')}}/admin/followup/${item.id}" class="btn btn-primary">follow</a></td>
                                <td>${new Date(item.created_at).toLocaleString()}</td>
                                <td>${item.name}</td>
                                <td>${item.phone_number}</td>
                                <td>${item.email}</td>
                                <td>${item.location}</td>
                                <td>${item.category}</td>
                                
                            </tr>`;
                            tableBody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status);
                        console.error("AJAX Error:", xhr);
                        console.error("AJAX Error:", error);
                    }
                });
            }
        }
    });
    
</script>
<!-- Your Custom Script -->
<script>
            function deleteSegment(id) {
            if (confirm('Are you sure you want to delete this segment?')) {
                const url = "{{ route('delete.inquiries', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url, // Ensure this URL matches your Laravel route
                    type: 'DELETE', // Use DELETE method
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // Include CSRF token
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }
        }

        function editSegment(id) {
            const clientData = @json($contact); // Pass PHP data to JavaScript

            const client = clientData.find(c => c.id === id);
            if (client) {
                console.log("client");
                console.log(client);
                document.getElementById('clientId').value = client.id;
                document.getElementById('name').value = client.name;
                document.getElementById('last_name').value = client.last_name;
                document.getElementById('companyName').value = client.company_name;
                document.getElementById('phone_number').value = client.phone_number;
                document.getElementById('email').value = client.email;
                document.getElementById('location').value = client.location;
                document.getElementById('category').value = client.category;
                document.getElementById('service').value = client.service;
                document.getElementById('content').value = client.content;

                // Show the modal
                const myModal = new bootstrap.Modal(document.getElementById('editModal'));
                myModal.show();
            }
        }

        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(event.target);

            const clientId = document.getElementById('clientId').value;
            const url = "{{ route('update.inquiries', ':id') }}".replace(':id', clientId);
            $.ajax({
                url: url, // Ensure this route is correct and accessible
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false, // Prevent jQuery from setting the content type
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content') // Include CSRF token for Laravel
                },
                success: function(response) {
                    console.log(response);
                    const myModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                    myModal.hide();
                    window.location.reload();
                },
                error: function(xhr) {
                    console.error('Error fetching segment:', xhr);
                }
            });
        });
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
    document.getElementById('fileInput').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('importForm').submit();
        }
    });
</script>
@endsection
