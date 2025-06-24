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
                    <!-- Form for Creating or Editing a Page -->
                    <div class="row mb-3 align-items-center">
                        @if(isset($page))
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Edit Page</h4>
                        </div>
                            <form action="{{ route('pages.update', $page->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                        @else
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Create New Page</h4>
                        </div>
                            <form action="{{ route('pages.store') }}" method="POST">
                                @csrf
                        @endif
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $page->name ?? '') }}" required>
                            </div>
                        
                            <div class="col-md-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="active" {{ (old('status', $page->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ (old('status', $page->status ?? '') == 'deactive') ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>
                        
                            <div class="col-md-4 d-flex justify-content-start align-items-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($page) ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </div>
                              
                        </form>
                    </div>
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18">Pages List</h4>
                    </div>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Page</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($pages as $pg)
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ $pg->name }}</td>
                                    <td>
                                       <a target="_blank" href="{{ route('home.slug', ['slug' => $pg->slug]) }}">
                                        <i class="bx bx-show bx-sm"></i>
                                       </a>
                                       <a href="{{route('pagesection.index',['slug' => $pg->slug ])}}">
                                        <i class="bx bx-edit bx-sm"></i>
                                       </a>
                                  </td>
                                    <td>{{ $pg->status }}</td>
                                    <td>
                                        <a class="btn btn-info openModalBtn" data-id="{{ $pg->id }}" data-name="{{ $pg->name }}">Duplicate</a>
                                        <a href="{{ route('pages.edit', $pg->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('pages.destroy', $pg->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page? All related sections will also be deleted. This action cannot be undone.');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <div id="loadingOverlay" style="display:none; position:fixed; top:0; right:0; width:100%; height:100%;flex-wrap:wrap;justify-content:center; background:rgba(0,0,0,0.5); z-index: 9999; text-align: center;">
            <img src="{{ asset('assets/duplicate.gif') }}" alt="Loading..." style="margin-top: 5%;background: aliceblue;"/>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="duplicateModal" tabindex="-1" aria-labelledby="duplicateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="duplicateModalLabel">Duplicate Page from <strong class="dup-name"></strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nameForm">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Page Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Page name">
                    </div>
                    <div class="mb-3">
                    <select name="d-status" id="d-status" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                    </select>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitName">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const duplicateModal = new bootstrap.Modal(document.getElementById('duplicateModal'));
        const submitNameBtn = document.getElementById('submitName');
        const nameInput = document.getElementById('nameInput');
        const modalTitleName = document.querySelector('.dup-name'); 
    
        let currentId = null;
    
        document.body.addEventListener('click', function (event) {
            if (event.target.classList.contains('openModalBtn')) {
                currentId = event.target.getAttribute('data-id');
                const pageName = event.target.getAttribute('data-name');
                modalTitleName.textContent = pageName;
                duplicateModal.show();
            }
        });
    
        submitNameBtn.addEventListener('click', (e) => {
            document.getElementById('loadingOverlay').style.display = 'flex';
    
            const enteredName = nameInput.value.trim();
            const status = document.getElementById('d-status').value.trim();
            const url = "{{ route('page.duplicate') }}";
            if (enteredName) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        'name': enteredName,
                        'currentId': currentId,
                        'status': status,
                        '_token': '{{ csrf_token() }}' 
                    },
                    success: function(response) {
                        console.log('Response:', response);
                        Toastify({
                            text: response.message, 
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: { background: "#4CAF50" }, 
                        }).showToast();
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        let error = xhr.responseJSON?.message || "An error occurred";
                        Toastify({
                            text: "Failed to add review: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            style: { background: "#F44336" }, 
                        }).showToast();
                    },
                    complete: function() {
                        document.getElementById('loadingOverlay').style.display = 'none';
                        window.location.reload();
                    }

                });
                duplicateModal.hide();
            } else {
                document.getElementById('loadingOverlay').style.display = 'none';
            }
        });
    });
    </script>
    

@endsection
