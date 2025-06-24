@extends('layout.adminPageControl')
@section('content')
    @php
        $user = Illuminate\Support\Facades\Auth::user();
    @endphp

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body,
        html {
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
                            <h4 class="mb-sm-0 font-size-18">Clients List</h4>
                        </div>
                        
                        <div class="row mb-3 align-items-center">
                            <!-- Select2 Dropdown -->
                            <div class="col-6">
                                <select class="select2 form-control select2-multiple" 
                                multiple="multiple" 
                                name="segmentList[]" 
                                id="segmentList" 
                                data-placeholder="Advance Search..." 
                                onchange="handleSegmentChange()">
                            @if($segments)
                                @foreach ($segments as $segment)
                                    <option value="{{ $segment->name }}">{{ $segment->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        
                            </div>
                        
                            <!-- Import Form and Sample Excel Button -->
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <form id="importForm" action="{{ route('import.clients') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center me-3">
                                    @csrf
                                    <div class="form-group m-0">
                                        <input type="file" name="file" id="fileInput" class="form-control-file d-none" required>
                                        <button type="button" class="btn btn-success" onclick="document.getElementById('fileInput').click();">Import Excel</button>
                                    </div>
                                </form>
                        
                                <!-- Sample Excel Button -->
                                <a href="{{ route('download.clients') }}" class="btn btn-info ms-2">Sample Excel</a>
                            </div>
                        </div>
                        
                         
                        <div class="table-responsive">
                            <table id="contactTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Segments</th>
                                        <th>Company Name</th>
                                        <th>Website or URL</th>
                                        <th>Contact Person</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Zipcode</th>
                                        <th>Country</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="contactTableBody">
                                    @if ($clients->count())
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->segment }}</td>
                                                <td>{{ $client->company_name }}</td>
                                                <td>{{ $client->url }}</td>
                                                <td>{{ $client->contact_person }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone_number }}</td>
                                                <td>{{ $client->location }}</td>
                                                <td>{{ $client->zipcode }}</td>
                                                <td>{{ $client->country }}</td>
                                                <td>{{ $client->created_at }}</td>
                                                <td>
                                                    <i class="bx bx-edit bx-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"
                                                        onclick="editSegment({{ $client->id }})"></i>

                                                    <i class='bx bx-trash bx-sm' style="color:red"
                                                        onclick="deleteSegment({{ $client->id }})"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12">No data available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
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
                            <label for="segment" class="form-label">Segments</label>
                            <input type="text" class="form-control" name="segment" id="segmentName" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="companyName" required>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">Website or URL</label>
                            <input type="text" class="form-control" name="url" id="url" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPerson" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" id="contactPerson" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone_number" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" id="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="zipcode" class="form-label">Zipcode</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" id="country" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script> 
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the select element
            const segmentSelect = document.getElementById('segment');
            
            // Get the table and all the rows
            const contactTableBody = document.getElementById('contactTableBody');
            const rows = contactTableBody.querySelectorAll('tr');
    
            segmentSelect.addEventListener('change', function () {
                const selectedSegment = segmentSelect.value.trim().toLowerCase();
                rows.forEach(function (row) {
                    const segmentCell = row.querySelector('td:nth-child(2)'); // Get the 'Segments' column
                    const segmentText = segmentCell.textContent.toLowerCase().trim();
                    const segments = segmentText.split(',').map(segment => segment.trim());
    
                    if (selectedSegment === "" || segments.includes(selectedSegment)) {
                        row.style.display = ''; // Show the row
                    } else {
                        row.style.display = 'none'; // Hide the row
                    }
                });
            });
        });
    </script>
    
    
    <script>
        function deleteSegment(id) {
            if (confirm('Are you sure you want to delete this segment?')) {
                const url = "{{ route('delete.client', ':id') }}".replace(':id', id);
                $.ajax({
                    url: url, 
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
            const clientData = @json($clients); 

            const client = clientData.find(c => c.id === id);
            if (client) {
                document.getElementById('clientId').value = client.id;
                document.getElementById('segmentName').value = client.segment;
                document.getElementById('companyName').value = client.company_name;
                document.getElementById('url').value = client.url;
                document.getElementById('contactPerson').value = client.contact_person;
                document.getElementById('email').value = client.email;
                document.getElementById('phone').value = client.phone_number;
                document.getElementById('location').value = client.location;
                document.getElementById('zipcode').value = client.zipcode;
                document.getElementById('country').value = client.country;

                // Show the modal
                const myModal = new bootstrap.Modal(document.getElementById('editModal'));
                myModal.show();
            }
        }

        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(event.target);

            const clientId = document.getElementById('clientId').value;
            const url = "{{ route('update.client', ':id') }}".replace(':id', clientId);
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

        // Initialize DataTable on document ready
        $(document).ready(function() {
            $('#contactTable').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "paging": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "lengthMenu": [5, 10, 25, 50],
                "columnDefs": [{
                        "orderable": false,
                        "targets": [11]
                    } // Ensure this column index is correct
                ]
            });
        });
    </script>
<script>
    function handleSegmentChange() {
    // Get the select element by its ID
    const selectElement = document.getElementById('segmentList');
    
    // Get all the selected options
    const selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
    
    $.ajax({
                    url: '{{ route("filter.clients") }}', // The route that handles the filtering
                    method: 'POST',
                    data: {
                        segments: selectedOptions,
                        '_token':'{{ csrf_token() }}'
                    },
                    success: function (response) {
                        console.log(response);
                        // Update the table body with the filtered data
                        var tableBody = $('#contactTableBody');
                        tableBody.empty(); // Clear the existing table content
    
                        if (response.clients.length > 0) {
                            response.clients.forEach(function (client) {
                                tableBody.append(`
                                    <tr>
                                        <td>${client.id}</td>
                                        <td>${client.segment}</td>
                                        <td>${client.company_name}</td>
                                        <td>${client.url}</td>
                                        <td>${client.contact_person}</td>
                                        <td>${client.email}</td>
                                        <td>${client.phone_number}</td>
                                        <td>${client.location}</td>
                                        <td>${client.zipcode}</td>
                                        <td>${client.country}</td>
                                        <td>${client.created_at}</td>
                                        <td>
                                            <i class="bx bx-edit bx-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editSegment(${client.id})"></i>
                                            <i class='bx bx-trash bx-sm' style="color:red" onclick="deleteSegment(${client.id})"></i>
                                        </td>
                                    </tr>
                                `);
                            });
                        } else {
                            tableBody.append(`
                                <tr>
                                    <td colspan="12">No data available</td>
                                </tr>
                            `);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
}
</script>  
<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('importForm').submit();
        }
    });
</script>
@endsection
