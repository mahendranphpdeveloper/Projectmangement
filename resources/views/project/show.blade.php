@extends('layout.adminPageControl')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>
    <style>
        i.bx.bx-chat.bx-sm {
            background: #1e98ff;
            color: #fff;
            padding: 16px 12px 8px 12px;
            border-radius: 50%;
        }

        i.bx.bxs-add-to-queue.bx-sm {
            background: #39ab00;
            color: #fff;
            padding: 12px 10px 8px 10px;
            border-radius: 50%;
        }

        div#sideCartSticky {
            width: 500px;
        }

        .side-cart--btn {
            position: fixed !important;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            /* padding: 10px;  */
            z-index: 9999;
            cursor: pointer;
        }

        .side-cart--btn i {
            color: white;
            font-size: 24px;
        }

        .message-type-btn {
            position: fixed !important;
            right: 15px;
            top: 62%;
            transform: translateY(-50%);
            border-radius: 50%;
            /* padding: 10px; */
            z-index: 9999;
            cursor: pointer;
        }
    </style>

    <div class="main-content">
        <div class="page-content">
            <div type="button" class="side-cart--btn position-relative outer-side-cart-i" data-bs-toggle="offcanvas"
                data-bs-target="#sideCartSticky" aria-controls="sideCartSticky" bis_skin_checked="1">
                <i class='bx bx-chat bx-sm'></i>
            </div>
            <a href="javascript:void(0)" class="text-info me-2 message-type-btn" data-project-id="{{ $project->id }}"
                data-bs-toggle="modal" data-bs-target="#messageTypeModal">
                {{-- <i class='bx bxs-file-plus '></i> --}}
                <i class='bx bxs-add-to-queue bx-sm'></i>
                <div class="container-fluid mt-5">
                    <!-- Success and Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <script>
                                    Toastify({
                                        text: "{{ $error }}",
                                        duration: 3000,
                                        close: true,
                                        gravity: "top",
                                        position: "right",
                                        backgroundColor: "#f44336", // Red for errors
                                    }).showToast();
                                </script>
                            @endforeach
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <script>
                                Toastify({
                                    text: "Changes saved successfully!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#4CAF50", // Green for success
                                }).showToast();
                            </script>
                        </div>
                    @endif

                    <!-- Page Header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                                <a href="{{ route('project.index') }}" class="btn btn-warning">
                                    <i class='bx bx-chevrons-left'></i> Back
                                </a>
                            </div>
                            <div class="page-title-box">
                                <h4 class="mb-sm-0 font-size-18">Project > {{ $project->pro_name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="sideCartSticky" aria-labelledby="sideCartSticky"
                        bis_skin_checked="1">


                        <div type="button" class="side-cart--btn position-relative inner-cart-btn"
                            data-bs-toggle="offcanvas" data-bs-target="#sideCartSticky" aria-controls="sideCartSticky"
                            bis_skin_checked="1">

                        </div>

                        <div class="offcanvas-header border-bottom" bis_skin_checked="1">
                            <h5 class="offcanvas-title fw-bold " id="offcanvasExampleLabel">{{ $project->pro_name }}</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body cart-lists" bis_skin_checked="1">
                            <div class="accordion" id="projectMessagesAccordion">
                                @foreach ($project->projectMessage as $index => $message)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button d-flex justify-content-between" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                <span>{{ $message->employee->name ?? 'Admin' }}</span>
                                                <span class="ms-auto text-muted">
                                                    {{ $message->created_at->format('Y-m-d H:i') }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}"
                                            class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#projectMessagesAccordion">
                                            <div class="accordion-body">
                                                @if ($message->message_type == 'Text')
                                                    <p>{!! $message->message !!}</p>
                                                @endif
                                                @if ($message->message_type == 'Document')
                                                    <a href="{{ asset($message->document) }}" target="_blank"
                                                        class="btn btn-outline-primary">
                                                        View Document
                                                    </a>
                                                @endif
                                                @if ($message->message_type == 'Image')
                                                    <img src="{{ asset($message->document) }}" alt="Image"
                                                        class="img-fluid" style="max-width: 300px;">
                                                @endif
                                                @if ($message->message_type == 'Video')
                                                    <video width="320" height="240" controls>
                                                        <source src="{{ asset($message->document) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif

                                                <!-- Display Audio -->
                                                @if ($message->message_type == 'Audio')
                                                    <audio controls>
                                                        <source src="{{ asset($message->document) }}" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="cart-btn" bis_skin_checked="1">
                        </div>
                    </div>
                    <!-- Project Details Card -->
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="card shadow-sm p-4">
                                <h5 class="card-title text-primary">Project Details</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Project Name</th>
                                        <td>{{ $project->pro_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ $project->pro_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Budget</th>
                                        <td>{{ number_format($project->pro_budget, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ \Carbon\Carbon::parse($project->start_date)->format('F d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ \Carbon\Carbon::parse($project->end_date)->format('F d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Review Date</th>
                                        <td>{{ \Carbon\Carbon::parse($project->review_date)->format('F d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><span class="badge bg-warning">{{ $project->status }}</span></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Client Details Card -->
                            <div class="card shadow-sm p-4 mt-4">
                                <h5 class="card-title text-primary">Client Details</h5>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Client Name</th>
                                        <td>{{ $project->client_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $project->client_email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{ $project->client_phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{ $project->client_address }}</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Project Proof Document -->
                            <div class="card shadow-sm p-4 mt-4">
                                <h5 class="card-title text-primary">Proof Document</h5>
                                @if ($project->proof)
                                    <p>
                                        <a href="{{ asset($project->proof) }}" target="_blank"
                                            class="btn btn-outline-primary">
                                            View Document
                                        </a>
                                    </p>
                                @else
                                    <p>No proof document available</p>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 p-4">
                                <div class="card shadow-sm bg-white p-4">
                                    <h5 class="card-title text-primary">Project Modules</h5>
                                    <table class="table table-bordered table-hover mt-3">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Modules Name</th>
                                                <th>Modules Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project->module as $module)
                                                <tr>
                                                    <td>{{ $module['name'] }}</td>
                                                    <td>{{ $module['description'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-4">
                                <div class="card shadow-sm bg-white p-4">
                                    <h5 class="card-title text-primary">Employee Details</h5>
                                    {{-- <div class="table-responsive mt-3"> --}}
                                    <table class="table table-bordered table-hover mt-3">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Date of Birth</th>
                                                <th>Joining Date</th>
                                                {{-- <th>Designation</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project->employees as $employee)
                                                <tr>
                                                    <td>{{ $employee['name'] }}</td>
                                                    <td>{{ $employee['phone'] }}</td>
                                                    <td>{{ $employee['office_email'] }}</td>
                                                    <td>{{ ucfirst($employee['gender']) }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($employee['dob'])->format('F d, Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee['joining_date'])->format('F d, Y') }}
                                                    </td>
                                                    {{-- <td>{{ $employee['designation'] }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <div class="modal fade" id="messageTypeModal" tabindex="-1" aria-labelledby="messageTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageTypeModalLabel">Project Message </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="messageTypeForm">
                        <input type="hidden" name="project_id" id="projectId" value="">

                        <!-- Message Type Dropdown -->
                        <div class="mb-3">
                            <label for="messageType" class="form-label">Message Type</label>
                            <select class="form-select" id="messageType" name="messageType" required>
                                <option value="" disabled selected>Select Message Type</option>
                                <option value="Text">Message</option>
                                <option value="Document">Document</option>
                                <option value="Image">Image</option>
                                <option value="Video">Video</option>
                                <option value="Audio">Audio</option>
                            </select>
                        </div>

                        <!-- Conditional Fields -->
                        <div id="textField" class="mb-3 d-none">
                            <label for="messageText" class="form-label"></label>
                            <div id="messageText" name="messageText"></div>
                            {{-- <textarea class="form-control" id="messageText" name="messageText" rows="3"></textarea> --}}
                        </div>

                        <div id="documentField" class="mb-3 d-none">
                            <label for="documentUpload" class="form-label">Upload Document</label>
                            <input type="file" class="form-control" id="documentUpload" name="document">
                        </div>

                        <div id="imageField" class="mb-3 d-none">
                            <label for="imageUpload" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="imageUpload" name="image"
                                accept="image/*">
                        </div>

                        <div id="videoField" class="mb-3 d-none">
                            <label for="videoUpload" class="form-label">Upload Video</label>
                            <input type="file" class="form-control" id="videoUpload" name="video"
                                accept="video/*">
                        </div>

                        <div id="audioField" class="mb-3 d-none">
                            <label for="audioUpload" class="form-label">Upload Audio</label>
                            <input type="file" class="form-control" id="audioUpload" name="audio"
                                accept="audio/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="messageTypeForm" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
<script>
        const editor = new FroalaEditor('#textField', {
            toolbarButtons: [
                'undo', 'redo', '|',
                'bold', 'italic', 'underline', '|',
                'paragraphFormat', 'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', '|',
                'clearFormatting', 'html'
            ],
            height: 300
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.message-type-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');
                    document.getElementById('projectId').value = projectId;
                });
            });

            document.getElementById('messageType').addEventListener('change', function() {
                const selectedType = this.value;

                // Hide all conditional fields initially
                document.getElementById('textField').classList.add('d-none');
                document.getElementById('documentField').classList.add('d-none');
                document.getElementById('imageField').classList.add('d-none');
                document.getElementById('videoField').classList.add('d-none');
                document.getElementById('audioField').classList.add('d-none');

                // Show relevant field
                if (selectedType === 'Text') document.getElementById('textField').classList.remove(
                'd-none');
                if (selectedType === 'Document') document.getElementById('documentField').classList.remove(
                    'd-none');
                if (selectedType === 'Image') document.getElementById('imageField').classList.remove(
                    'd-none');
                if (selectedType === 'Video') document.getElementById('videoField').classList.remove(
                    'd-none');
                if (selectedType === 'Audio') document.getElementById('audioField').classList.remove(
                    'd-none');
            });

            document.getElementById('messageTypeForm').addEventListener('submit', function(e) {
                e.preventDefault();

                clearErrors();

                const formData = new FormData(this);
                const projectId = document.getElementById('projectId').value;
                const seoContent = editor.html.get();
                console.log("sseoContent");
                formData.append('messageText', seoContent);
                const url = `{{ url('/') }}/admin/project-message/store`;
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ': ' + pair[1]);
                }
                fetch(url, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => {
    console.log(response);
    if (!response.ok) {
        console.error('Server error:', response.statusText);
        return response.text(); // Retrieve the raw text if JSON parsing might fail
    }
    return response.json();
})
                    .then(data => {
                        if (typeof data === 'string') {
        console.error('Unexpected response:', data); // Log any unexpected HTML response
    }
                        if (data.success) {
                            Toastify({
                                text: data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#25c161", // Green color for success
                            }).showToast();
                            document.getElementById('messageTypeForm').reset();

                            console.log('success');
                            window.location.reload();
                            const messageTypeModal = new bootstrap.Modal(document.getElementById(
                                'messageTypeModal'));
                            messageTypeModal.hide(); // This should hide the modal
                            $("#messageTypeModal").modal('hide');
                            $('#messageTypeModal').hide();
                            const backdrop = document.querySelector('.modal-backdrop');
                            if (backdrop) {
                                backdrop.classList.remove('fade', 'show');
                                backdrop.remove(); // Remove the backdrop element
                            }
                        } else {
                            // Display error Toastify
                            Toastify({
                                text: 'Error occurred: ' + data.message,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#f44336", // Red color for error
                            }).showToast();

                            // If validation errors are present
                            if (data.errors) {
                                displayErrors(data.errors);
                            }
                        }

                    })
                    .catch(error => console.error('Error:', error));
            });

            // Function to display validation errors in the form
            function displayErrors(errors) {
                for (const [key, value] of Object.entries(errors)) {
                    const inputElement = document.querySelector(`[name=${key}]`);
                    const errorContainer = document.createElement('div');
                    errorContainer.classList.add('invalid-feedback');
                    errorContainer.innerText = value[0]; // Show the first error message

                    inputElement.classList.add('is-invalid');
                    inputElement.parentElement.appendChild(errorContainer);
                }
            }

            // Function to clear existing errors before submitting
            function clearErrors() {
                const errorElements = document.querySelectorAll('.invalid-feedback');
                const inputElements = document.querySelectorAll('.is-invalid');

                errorElements.forEach(el => el.remove());
                inputElements.forEach(el => el.classList.remove('is-invalid'));
            }
        });
    </script>
@endsection
