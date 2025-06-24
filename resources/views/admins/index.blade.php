@extends('layout.adminPageControl')

@section('content')
<style>
    input#admin_role {
        background: #a2a2a2;
    }
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    table th, table td {
        text-align: center;
        padding: 10px;
    }
    table thead th {
        background-color: #f8f9fa;
    }
    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    table tbody tr:hover {
        background-color: #e9ecef;
    }
    a.btn {
        margin-right: 10px;
    }
    button.btn-danger {
        border: none;
        background-color: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    button.btn-danger:hover {
        background-color: #c82333;
    }

    .golden-color {
        color: goldenrod;
    }

</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Employee Login Credentials</h3>
                        {{-- <a href="{{ route('admins.create') }}" class="btn btn-success">Add Admin</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                @if($admin->admin_role == 'Admin')
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td style="color: goldenrod;">
                                        {{ $admin->admin_role }} 
                                        <i class="bx bxs-star" style="color: goldenrod;"></i>
                                    </td>
                                    
                                    <td>
                                        {{-- <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm disabled" aria-disabled="true">Edit</a> --}}
                                            <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->admin_role }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>
@endsection
