@extends('layout.adminPageControl')
@section('content')
<style>
    input#admin_role {
    background: #a2a2a2;
}
    </style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-4">Create Admin</h1>
                    <form action="{{ route('admins.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="col-md-4">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-4">
                                <label for="admin_role" class="form-label">Role:</label>
                                <input type="text" class="form-control" id="admin_role" name="admin_role" value="SubAdmin" readonly>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a class="btn btn-info" href="{{ route('admins.index') }}">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    @endsection
