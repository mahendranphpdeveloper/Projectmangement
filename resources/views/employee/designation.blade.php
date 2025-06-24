@extends('layout.adminPageControl')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="col-lg-4 float-end ms-auto d-flex mt-2 justify-content-end">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_designation">
                            <i class="bx bx-plus"></i> Add Designation</a>
                    </div>
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Designation list</h4>
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Position Title</th>
                                <th>Salary</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($designations as $designation)
                            <tr>
                                <td>{{ $designation->id }}</td>
                                <td>{{ $designation->position_title }}</td>
                                <td>{{ $designation->salary }}</td>
                                <td>{{ ucfirst($designation->type) }}</td>
                                <td>
                                
                                    <a  href="javascript:void(0)"  class="text-warning btn-sm edit-btn" 
                                            data-id="{{ $designation->id }}"
                                            data-title="{{ $designation->position_title }}"
                                            data-salary="{{ $designation->salary }}"
                                            data-type="{{ $designation->type }}"><i class='bx bx-edit bx-sm'></i></a>
                                    <form action="{{ route('designation.destroy', $designation->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a type="submit"  href="javascript:void(0)"  class="text-danger btn-sm" onclick="return confirm('Are you sure?')"><i class='bx bx-trash bx-sm'></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Loading Overlay -->
        <div id="loadingOverlay" style="display:none; position:fixed; top:0; right:0; width:100%; height:100%; flex-wrap:wrap; justify-content:center; background:rgba(0,0,0,0.5); z-index:9999; text-align:center;">
            <img src="{{ asset('assets/duplicate.gif') }}" alt="Loading..." style="margin-top:5%; background:aliceblue;" />
        </div>
    </div>
</div>

<!-- Add/Edit Designation Modal -->
<div class="modal fade" id="add_designation" tabindex="-1" aria-labelledby="addDesignationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDesignationLabel">Add Designation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="designationForm" action="{{ route('designation.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="POST" id="formMethod">
                    <input type="hidden" id="designationId" name="id">

                    <!-- Position Title Input -->
                    <div class="mb-3">
                        <label for="positionTitle" class="form-label">Position Title</label>
                        <input type="text" class="form-control" id="positionTitle" name="position_title" required>
                    </div>

                    <!-- Salary Input -->
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" required>
                    </div>

                    <!-- Type Select -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="Intern">Intern</option>
                            <option value="Trainee">Trainee </option>
                            <option value="Junior">Junior</option>
                            <option value="Mid-Level">Mid-Level</option>
                            <option value="Senior">Senior</option>
                            <option value="Lead">Lead</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveDesignationBtn">Save Designation</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('add_designation'));
        const form = document.getElementById('designationForm');
        const saveBtn = document.getElementById('saveDesignationBtn');
        const modalTitle = document.getElementById('addDesignationLabel');
        const designationIdInput = document.getElementById('designationId');
        const positionTitleInput = document.getElementById('positionTitle');
        const salaryInput = document.getElementById('salary');
        const typeSelect = document.getElementById('type');

        // Open Add Designation Modal
        document.querySelector('.btn-primary').addEventListener('click', function() {
            modalTitle.textContent = 'Add Designation';
            form.action = "{{ route('designation.store') }}";
            document.getElementById('formMethod').value = 'POST';
            designationIdInput.value = '';
            positionTitleInput.value = '';
            salaryInput.value = '';
            typeSelect.value = 'start';
            saveBtn.textContent = 'Save Designation';
            modal.show();
        });

        // Handle Edit Button Click
        document.querySelectorAll('.edit-btn').forEach(function(editButton) {
            editButton.addEventListener('click', function(e) {
                e.preventDefault();

                modalTitle.textContent = 'Edit Designation';
                designationIdInput.value = editButton.getAttribute('data-id');
                positionTitleInput.value = editButton.getAttribute('data-title');
                salaryInput.value = editButton.getAttribute('data-salary');
                typeSelect.value = editButton.getAttribute('data-type');
                form.action = `{{ route('designation.upgrade',['id' => '/']) }}/${designationIdInput.value}`;
                document.getElementById('formMethod').value = 'POST';
                saveBtn.textContent = 'Update Designation';
                modal.show();
            });
        });

        // Submit form on Save button click
        saveBtn.addEventListener('click', function() {
            form.submit();
        });
    });
</script>
@endsection
