@extends('layout.adminPageControl')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

    .col-lg-10.col-md-10.mx-auto {
        background: #ffffff;
        padding: 40px;
        margin-bottom: 50px;
    }

    .multisteps-form__progress {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
    }

    .multisteps-form__progress-btn {
        transition-property: all;
        transition-duration: 0.15s;
        transition-timing-function: linear;
        transition-delay: 0s;
        position: relative;
        padding-top: 20px;
        color: rgba(108, 117, 125, 0.7);
        text-indent: -9999px;
        border: none;
        background-color: transparent;
        outline: none !important;
        cursor: pointer;
    }

    @media (min-width: 500px) {
        .multisteps-form__progress-btn {
            text-indent: 0;
        }
    }

    .multisteps-form__progress-btn:before {
        position: absolute;
        top: 0;
        left: 50%;
        display: block;
        width: 13px;
        height: 13px;
        content: '';
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
        border: 2px solid currentColor;
        border-radius: 50%;
        background-color: #fff;
        box-sizing: border-box;
        z-index: 3;
    }

    .multisteps-form__progress-btn:after {
        position: absolute;
        top: 5px;
        left: calc(-50% - 13px / 2);
        transition-property: all;
        transition-duration: 0.15s;
        transition-timing-function: linear;
        transition-delay: 0s;
        display: block;
        width: 100%;
        height: 2px;
        content: '';
        background-color: currentColor;
        z-index: 1;
    }

    .multisteps-form__progress-btn:first-child:after {
        display: none;
    }

    .multisteps-form__progress-btn.js-active {
        color: #007bff;
    }

    .multisteps-form__progress-btn.js-active:before {
        -webkit-transform: translateX(-50%) scale(1.2);
        transform: translateX(-50%) scale(1.2);
        background-color: currentColor;
    }

    .multisteps-form__form {
        position: relative;
    }

    .multisteps-form__panel {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 0;
        opacity: 0;
        visibility: hidden;
    }

    .multisteps-form__panel.js-active {
        height: auto;
        opacity: 1;
        visibility: visible;
    }

    .multisteps-form__panel[data-animation="fade"] {
        -webkit-animation: fadeInRight 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        animation: fadeInRight 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }

    .multisteps-form__panel[data-animation="fade"].js-active {
        -webkit-animation: fadeInLeft 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        animation: fadeInLeft 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }



    /*---- CUSTOM ANIMATION ----*/

    .fadeInRight {
        -webkit-animation: fade-in-right 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        animation: fade-in-right 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }

    @-webkit-keyframes fadeInRight {
        0% {
            -webkit-transform: translateX(50px);
            transform: translateX(50px);
            opacity: 0;
        }

        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeInRight {
        0% {
            -webkit-transform: translateX(50px);
            transform: translateX(50px);
            opacity: 0;
        }

        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }


    .fadeInLeft {
        -webkit-animation: fade-in-left 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        animation: fade-in-left 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }

    @-webkit-keyframes fadeInLeft {
        0% {
            -webkit-transform: translateX(-50px);
            transform: translateX(-50px);
            opacity: 0;
        }

        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeInLeft {
        0% {
            -webkit-transform: translateX(-50px);
            transform: translateX(-50px);
            opacity: 0;
        }

        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

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

<div class="main-content">
    <div class="page-content">
        <div type="button" class="side-cart--btn position-relative outer-side-cart-i" data-bs-toggle="offcanvas"
            data-bs-target="#sideCartSticky" aria-controls="sideCartSticky" bis_skin_checked="1">
            <i class='bx bx-chat bx-sm'></i>
        </div>

        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                        <a href="{{ route('project.index') }}" class="btn btn-warning">
                            <i class='bx bx-chevrons-left'></i> Back
                        </a>
                    </div>
                    <div class="content">
                        <div class="content__inner">
                            <div class="container overflow-hidden">
                                <div class="multisteps-form">
                                    <div class="row">
                                        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                                            <div class="multisteps-form__progress">
                                                <button class="multisteps-form__progress-btn js-active" type="button"
                                                    title="project">Project Details</button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                    title="module"> Module</button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                    title="employee"> Emplpoyee</button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                    title="corrections"> Corrections </button>
                                                <button class="multisteps-form__progress-btn" type="button"
                                                    title="document">Document </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-8 m-auto">
                                            <form class="multisteps-form__form">
                                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                                                    data-animation="fade">
                                                    <h3 class="multisteps-form__title">Your User Info</h3>
                                                    <div class="multisteps-form__content">
                                                        First Slide
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary ml-auto js-btn-next"
                                                                type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                                    data-animation="fade">
                                                    <h3 class="multisteps-form__title">Your Address</h3>
                                                    <div class="multisteps-form__content">
                                                        Second Slide
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button"
                                                                title="Prev">Prev</button>
                                                            <button class="btn btn-primary ml-auto js-btn-next"
                                                                type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                                    data-animation="fade">
                                                    <h3 class="multisteps-form__title">Your Order Info</h3>
                                                    <div class="multisteps-form__content">
                                                        Third Slide
                                                        <div class="row">
                                                            <div class="button-row d-flex mt-4 col-12">
                                                                <button class="btn btn-primary js-btn-prev"
                                                                    type="button" title="Prev">Prev</button>
                                                                <button class="btn btn-primary ml-auto js-btn-next"
                                                                    type="button" title="Next">Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                                    data-animation="scaleIn">
                                                    <h3 class="multisteps-form__title">Additional Message</h3>
                                                    <div class="multisteps-form__content">
                                                        Fourth Slide
                                                        <div class="button-row d-flex mt-4">
                                                            <button class="btn btn-primary js-btn-prev" type="button"
                                                                title="Prev">Prev</button>
                                                            <button class="btn btn-success ml-auto" type="button"
                                                                title="Send">Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Project Setup</h4>
                    </div>
                </div>
            </div>
            <!-- Step-by-Step Form -->
            <form id="projectForm" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <input type="hidden" id="projectId" name="id">

                <!-- Step 1: Save Project -->
                <div class="step" id="step1">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 mx-auto">
                            <div class="d-flex justify-content-center mb-3">
                                <h4>Save Project</h4>
                            </div>
                            <form id="projectForm" action="{{ route('project.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="POST" id="formMethod">
                                <input type="hidden" id="projectId" name="id">

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="pro_name" class="form-label">Project Name</label>
                                        <input type="text" class="form-control" id="pro_name" name="pro_name"
                                            value="{{ old('pro_name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pro_type" class="form-label">Project Type</label>
                                        <select class="form-select" id="pro_type" name="pro_type">
                                            <option value="">--Select Website Type--</option>
                                            @if (isset($services))
                                            @foreach ($services as $type)
                                            <option value="{{ $type->service }}"
                                                {{ old('pro_type') == $type->service ? 'selected' : '' }}>
                                                {{ $type->service }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="text" class="form-control flatpickr" id="start_date"
                                            name="start_date" value="{{ old('start_date') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date" class="form-label">Deadline</label>
                                        <input type="text" class="form-control flatpickr" id="end_date"
                                            name="end_date" value="{{ old('end_date') }}" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="pro_budget" class="form-label">Budget</label>
                                        <input type="number" step="0.01" class="form-control" id="pro_budget"
                                            name="pro_budget" value="{{ old('pro_budget') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="client_name" class="form-label">Client Name</label>
                                        <input type="text" class="form-control" id="client_name"
                                            name="client_name" value="{{ old('client_name') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="client_email" class="form-label">Client Email</label>
                                        <input type="email" class="form-control" id="client_email"
                                            name="client_email" value="{{ old('client_email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="client_phone" class="form-label">Client Phone</label>
                                        <input type="text" class="form-control" id="client_phone"
                                            name="client_phone" value="{{ old('client_phone') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="client_address" class="form-label">Client Address</label>
                                        <input type="text" class="form-control" id="client_address"
                                            name="client_address" value="{{ old('client_address') }}" required>
                                    </div>
                                   <div class="col-md-6">
                                        <label for="review_date" class="form-label">Review Date</label>
                                        <input type="text" class="form-control flatpickr" id="review_date"
                                            name="review_date" value="{{ old('review_date') }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="pro_status" class="form-label">Status</label>
                                        <select class="form-select" id="pro_status" name="pro_status">
                                            <option value="">--Select Status--</option>
                                            <option value="Not Started"
                                                {{ old('pro_status') == 'Not Started' ? 'selected' : '' }}>Not Started
                                            </option>
                                            <option value="Started"
                                                {{ old('pro_status') == 'Started' ? 'selected' : '' }}>Started</option>
                                            <option value="Pending"
                                                {{ old('pro_status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="In Progress"
                                                {{ old('pro_status') == 'In Progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            <option value="Completed"
                                                {{ old('pro_status') == 'Completed' ? 'selected' : '' }}>Completed
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="proof" class="form-label">Proof (Upload File)</label>
                                        <input type="file" class="form-control" id="proof" name="proof">
                                    </div>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary" id="saveProjectBtn">Save Project</button>
                                    <button type="button" class="btn btn-primary next-step"
                                        data-next="step2">Next</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

                <!-- Step 2: Add Modules or Skip -->
                <div class="step" id="step2" style="display: none;">
                    <h3>Step 2: Add Modules or Skip</h3>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="modules" class="form-label">Add Modules (Optional)</label>
                            <textarea class="form-control" id="modules" name="modules" rows="3">{{ old('modules') }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary prev-step"
                            data-prev="step1">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="step3">Next</button>
                    </div>
                </div>

                <!-- Step 3: Add Employee or Skip -->
                <div class="step" id="step3" style="display: none;">
                    <h3>Step 3: Add Employee or Skip</h3>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="employees" class="form-label">Assign Employees (Optional)</label>
                            <select class="form-select" id="employees" name="employees[]" multiple>
                                @if (isset($employees))
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary prev-step"
                            data-prev="step2">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="step4">Next</button>
                    </div>
                </div>

                <!-- Step 4: Select To-Do List or Add Corrections -->
                <div class="step" id="step4" style="display: none;">
                    <h3>Step 4: Select To-Do List or Add Corrections</h3>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="todo_list" class="form-label">To-Do List (Optional)</label>
                            <textarea class="form-control" id="todo_list" name="todo_list" rows="3">{{ old('todo_list') }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary prev-step"
                            data-prev="step3">Previous</button>
                        <button type="button" class="btn btn-primary next-step" data-next="step5">Next</button>
                    </div>
                </div>

                <!-- Step 5: Upload Project Documents with Permissions -->
                <div class="step" id="step5" style="display: none;">
                    <h3>Step 5: Upload Project Documents with Permissions</h3>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="project_documents" class="form-label">Upload Documents (Optional)</label>
                            <input type="file" class="form-control" id="project_documents"
                                name="project_documents[]" multiple>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary prev-step" data-prev="step4">Previous</button>
                    <button type="submit" class="btn btn-success">Save Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Step Navigation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const steps = document.querySelectorAll('.step');
        const nextButtons = document.querySelectorAll('.next-step');
        const prevButtons = document.querySelectorAll('.prev-step');

        nextButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step');
                const nextStepId = this.getAttribute('data-next');
                const nextStep = document.getElementById(nextStepId);

                currentStep.style.display = 'none';
                nextStep.style.display = 'block';
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', function() {
                const currentStep = this.closest('.step');
                const prevStepId = this.getAttribute('data-prev');
                const prevStep = document.getElementById(prevStepId);

                currentStep.style.display = 'none';
                prevStep.style.display = 'block';
            });
        });
    });
</script>
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
                        console.error('Unexpected response:',
                            data); // Log any unexpected HTML response
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
    const DOMstrings = {
        stepsBtnClass: 'multisteps-form__progress-btn',
        stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
        stepsBar: document.querySelector('.multisteps-form__progress'),
        stepsForm: document.querySelector('.multisteps-form__form'),
        stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
        stepFormPanelClass: 'multisteps-form__panel',
        stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
        stepPrevBtnClass: 'js-btn-prev',
        stepNextBtnClass: 'js-btn-next'
    };


    const removeClasses = (elemSet, className) => {

        elemSet.forEach(elem => {

            elem.classList.remove(className);

        });

    };

    const findParent = (elem, parentClass) => {

        let currentNode = elem;

        while (!currentNode.classList.contains(parentClass)) {
            currentNode = currentNode.parentNode;
        }

        return currentNode;

    };

    const getActiveStep = elem => {
        return Array.from(DOMstrings.stepsBtns).indexOf(elem);
    };

    const setActiveStep = activeStepNum => {

        removeClasses(DOMstrings.stepsBtns, 'js-active');

        DOMstrings.stepsBtns.forEach((elem, index) => {

            if (index <= activeStepNum) {
                elem.classList.add('js-active');
            }

        });
    };

    const getActivePanel = () => {

        let activePanel;

        DOMstrings.stepFormPanels.forEach(elem => {

            if (elem.classList.contains('js-active')) {

                activePanel = elem;

            }

        });

        return activePanel;

    };

    const setActivePanel = activePanelNum => {

        removeClasses(DOMstrings.stepFormPanels, 'js-active');

        DOMstrings.stepFormPanels.forEach((elem, index) => {
            if (index === activePanelNum) {

                elem.classList.add('js-active');

                setFormHeight(elem);

            }
        });

    };

    const formHeight = activePanel => {

        const activePanelHeight = activePanel.offsetHeight;

        DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

    };

    const setFormHeight = () => {
        const activePanel = getActivePanel();

        formHeight(activePanel);
    };

    DOMstrings.stepsBar.addEventListener('click', e => {

        const eventTarget = e.target;

        if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
            return;
        }

        const activeStep = getActiveStep(eventTarget);

        setActiveStep(activeStep);

        setActivePanel(activeStep);
    });

    DOMstrings.stepsForm.addEventListener('click', e => {

        const eventTarget = e.target;

        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList
                .contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }

        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
            activePanelNum--;

        } else {

            activePanelNum++;

        }

        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);

    });

    window.addEventListener('load', setFormHeight, false);

    window.addEventListener('resize', setFormHeight, false);


    const setAnimationType = newType => {
        DOMstrings.stepFormPanels.forEach(elem => {
            elem.dataset.animation = newType;
        });
    };
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr('.flatpickr', {
            dateFormat: 'Y-m-d', // Output format for MySQL
            altInput: true, // Show user-friendly format
            altFormat: 'm/d/Y', // Display format for user
            allowInput: true // Allow manual input
        });
    });
</script>
@endsection