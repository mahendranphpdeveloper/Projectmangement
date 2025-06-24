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

            <div id="chartContainer" style="height: 400px; width: 100%; background-color:#fff;"></div>
            <div id="attendanceDetails" class="mt-4"></div>
        </div>
    </div>
</div>

<script>
window.onload = function () {
    var presentDataPoints = [];
    var absentDataPoints = [];
    var leaveDataPoints = [];
    var sundayPoints = [];
    var workingDaysDataPoints = [];

    @foreach($monthlyAttendanceCount as $attendance)
        var year = {{ $attendance->year }};
        var month = {{ $attendance->month }};
        var presentCount = {{ $attendance->present_count }};
        var absentCount = {{ $attendance->absent_count }};
        var leaveCount = {{ $attendance->leave_count }};
        var sundayCount = {{ $attendance->sunday_count }};
        var totalWorkingDays = {{ $attendance->total_working_days }};
        
        var monthLabel = new Date(year, month - 1).toLocaleString('default', { month: 'long' });

        presentDataPoints.push({ label: monthLabel, y: presentCount, month: month, year: year });
        absentDataPoints.push({ label: monthLabel, y: absentCount, month: month, year: year });
        leaveDataPoints.push({ label: monthLabel, y: leaveCount, month: month, year: year });
        sundayPoints.push({ label: monthLabel, y: sundayCount, month: month, year: year });
        workingDaysDataPoints.push({ label: monthLabel, y: totalWorkingDays, month: month, year: year });
    @endforeach

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        axisY: {
            includeZero: true,
            title: "Number of Days"
        },
        legend: {
            cursor: "pointer",
            verticalAlign: "center",
            horizontalAlign: "right",
            itemclick: toggleDataSeries
        },
        data: [
            {
                type: "column",
                name: "Present Days",
                indexLabel: "{y}",
                showInLegend: true,
                dataPoints: presentDataPoints,
                color: "#28a745",
                click: showDetails
            },
            {
                type: "column",
                name: "Leave Days",
                indexLabel: "{y}",
                showInLegend: true,
                dataPoints: leaveDataPoints,
                color: "#dc3545",
                click: showDetails
            },
            {
                type: "column",
                name: "Total Sundays",
                indexLabel: "{y}",
                showInLegend: true,
                dataPoints: sundayPoints,
                color: "#FDCE3E",
                click: showDetails
            },
            {
                type: "column",
                name: "Total Working Days",
                indexLabel: "{y}",
                showInLegend: true,
                dataPoints: workingDaysDataPoints,
                color: "#007bff",
                click: showDetails
            }
        ]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

    function showDetails(e) {
        var month = e.dataPoint.month;
        var year = e.dataPoint.year;
        var attendanceRecords = @json($attendances); 
        var tableRows = '';
        var i = 1;
        attendanceRecords.forEach(record => { 
            const recordDate = new Date(record.attendance_date); 
            const recordYear = recordDate.getFullYear();
            const recordMonth = recordDate.getMonth() + 1;
            if (recordYear === year && recordMonth === month) {
                tableRows += `
                    <tr>
                        <td>${i}</td>
                        <td>${record.attendance_date}</td>
                        <td>${record.check_in || 'N/A'}</td>
                        <td>Present</td>
                    </tr>
                `;
                i++;
            }
            
        });          
        document.getElementById("attendanceDetails").innerHTML = `
            <div class="row">
                <div class="col-12" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 class="text-center">Attendance Details for ${e.dataPoint.label} ${year}</h4>
                    <div class="row mb-3 mt-3">
                        <div class="col-3"><strong>Present Days:</strong> ${presentDataPoints.find(dp => dp.month === month && dp.year === year).y}</div>
                        <div class="col-3"><strong>Absent Days:</strong> ${absentDataPoints.find(dp => dp.month === month && dp.year === year).y}</div>
                        <div class="col-3"><strong>Leave Days:</strong> ${leaveDataPoints.find(dp => dp.month === month && dp.year === year).y}</div>
                        <div class="col-3"><strong>Total Working Days:</strong> ${workingDaysDataPoints.find(dp => dp.month === month && dp.year === year).y}</div>
                    </div>
                    <h5 class="mt-4 text-center">Detailed Attendance Records</h5>
                    <table class="table table-bordered table-striped mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Check-in Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${tableRows || '<tr><td colspan="3" class="text-center">No records available for this month.</td></tr>'}
                        </tbody>
                    </table>
                </div>
            </div>
        `;
        $('html, body').animate({
    scrollTop: $('#attendanceDetails').offset().top
}, 500, 'swing');
    }
}
</script>

@endsection
