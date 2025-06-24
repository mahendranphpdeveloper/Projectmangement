@extends('layout.adminPageControl')

@section('content')
<!-- External Styles and Script -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

<style>
    .position-text {
        background: #def7e5 !important;
        width: fit-content !important;
    }

    .timesheet-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: var(--bs-box-shadow-sm) !important;
    }

    .page-title-box h4 {
        font-size: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table thead {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .form-row {
        margin-bottom: 10px;
    }
</style>

<div class="main-content">
    <div class="page-content">
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

            <!-- Timesheet Form Fields -->
            <div class="row mb-3 timesheet-container">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Leave Form</h4>
                        </div>
                        <form action="{{ route('apply.leave') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <button type="submit" class="btn btn-primary ms-3 d-flex justify-content-end text-end">Send</button>
                </div>

                <div class="col-md-4">
                    <input class="form-control mb-4 mt-4" value="Leave Application" disabled>
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control flatpickr" value="" required>
                </div>

                <div class="col-md-8">
                    <label for="task_detail">Task Detail</label>
                    <textarea name="leave_details" class="form-control" rows="6" required></textarea>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".flatpickr", {
            mode: "range", 
            dateFormat: "Y-m-d", 
            defaultDate: [new Date(), new Date()], 
            allowInput: true,
            minDate: new Date(), 
        });
        const dateInput = document.getElementById('date');
        dateInput.addEventListener('paste', function(e) {
            e.preventDefault(); // Prevent paste
            alert('Pasting is not allowed in this field.'); 
        });
    });
</script>
@endsection
