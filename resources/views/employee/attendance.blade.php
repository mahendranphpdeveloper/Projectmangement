@extends('layout.adminPageControl')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-around align-items-center">
                        <h2 class="text-primary">Monthly Attendance Overview</h2>
                        @if($attendances->isNotEmpty())
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $attendances[0]->employee->photo) }}" alt="Employee Image" class="img-fluid rounded-circle border border-primary" style="width: 100px; height: 100px;">
                                <h4 class="mt-2">{{ $attendances[0]->employee->name }}</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
