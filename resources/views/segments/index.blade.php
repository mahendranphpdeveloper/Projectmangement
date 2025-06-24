@extends('layout.adminPageControl')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <section>
                <div class="container">
                    <h1>Segments List</h1>
              <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#segmentModal"
        onclick="showModal()" style="float: right;">Add Segment</button>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="segmentsTableBody">
                            @foreach ($segments as $segment)
                                <tr id="segment-{{ $segment->id }}">
                                    <td>{{ $segment->id }}</td>
                                    <td>{{ $segment->name }}</td>
                                    <td>
                                        <i class="bx bx-edit bx-sm" data-bs-toggle="modal"
                                            data-bs-target="#segmentModal"
                                            onclick="editSegment({{ $segment->id }})"></i>
                                        <i class='bx bx-trash bx-sm' style="color:red"
                                            onclick="deleteSegment({{ $segment->id }})"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="segmentModal" tabindex="-1" aria-labelledby="segmentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="segmentModalLabel">Add Segment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="segmentForm">
                                    @csrf
                                    <input type="hidden" id="segmentId">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Segment Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function showModal() {
    $('#segmentId').val('');
    $('#name').val('');
    $('#segmentModalLabel').text('Add Segment');
}

function editSegment(id) {
    const url = "{{ route('segment.show', ':id') }}".replace(':id', id);
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(segment) {
            $('#segmentId').val(segment.id);
            $('#name').val(segment.name);
            $('#segmentModalLabel').text('Edit Segment');
        },
        error: function(xhr) {
            console.error('Error fetching segment:', xhr);
        }
    });
}

function deleteSegment(id) {
    if (confirm('Are you sure you want to delete this segment?')) {
        const url = "{{ route('segment.destroy', ':id') }}".replace(':id', id);
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(data) {
                if (data.success) {
                    $(`#segment-${id}`).remove();
                }
            },
            error: function(xhr) {
                console.error('Error deleting segment:', xhr);
            }
        });
    }
}
$(document).ready(function() {
    $('#segmentForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting traditionally

        let id = $('#segmentId').val();
        let url = id ? "{{ route('segment.update', ':id') }}".replace(':id', id) : "{{ route('segment.store') }}";
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: method,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            data: {
                name: $('#name').val()
            },
            success: function(segment) {
                if (id) {
                    $(`#segment-${id} td:nth-child(2)`).text(segment.name);
                } else {
                    let row = `
                        <tr id="segment-${segment.id}">
                            <td>${segment.id}</td>
                            <td>${segment.name}</td>
                            <td>
                            <i class="bx bx-edit bx-sm" data-bs-toggle="modal"
                                            data-bs-target="#segmentModal"
                                            onclick="editSegment(${segment.id})"></i>
                                        <i class='bx bx-trash bx-sm' style="color:red"
                                            onclick="deleteSegment(${segment.id})"></i>
                                            </td>
                        </tr>`;
                    $('#segmentsTableBody').append(row);
                }
                $('.btn-close').click(); // Close the modal
            },
            error: function(xhr) {
                console.error('Error saving segment:', xhr);
            }
        });
    });

    });
    </script>
@endsection


