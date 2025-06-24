@extends('layout.adminPageControl')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.4.1/tagify.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.4.1/tagify.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/css/froala_editor.pkgd.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/3.2.7/js/froala_editor.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

    <style>
        .draggable {
            cursor: move;
        }

        .textarea-label {
            display: block;
            margin-bottom: 5px;
            /* Space between the label and textarea */
        }
        .fr-box.fr-basic.fr-top .fr-wrapper a {
    display: none !important;
}
        .full-width-textarea {
            width: 100%;
            /* Full width */
            box-sizing: border-box;
            /* Include padding and border in the element's total width */
            /* Optional: Add some padding for better UX */
            padding: 10px;
            /* Optional: Add a border and border radius for styling */
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #fr-logo {
            float: left;
            outline: none;
            display: none !important;
        }

        .container-fluid.mt-5 {
            background: #e2ecfa;
            padding: 22px;
        }

        .page-content {
            background: #fff;
        }

        .highlight {
            background-color: #f0f0f0;
            /* Highlight color for dragged rows */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            border-bottom: 2px solid #ddd;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table td i {
            cursor: pointer;
        }

        .bx-edit {
            color: #007bff;
            /* Blue color for edit */
        }

        .bx-edit:hover {
            color: #0056b3;
        }

        .bx-trash:hover {
            color: #b30000;
            /* Darker red for hover */
        }

        /* Style for drag-and-drop rows */
        .draggable {
            transition: background-color 0.2s ease;
        }

        .draggable:hover {
            background-color: #e0e0e0;
        }

        hr {
            border: none;
            height: 2px;
            /* Thicker line */
            background: linear-gradient(to right, #f8f8fb, #000000, #f8f8fb);
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .image-add-input {
            display: none;
        }

        .uploaded-images {
            display: flex;
            flex-wrap: nowrap;
            /* Disable wrapping */
            gap: 10px;
            overflow-x: auto;
            /* Enable horizontal scroll */
            white-space: nowrap;
            /* Ensure items stay in a single line */
            padding-bottom: 10px;
            /* Space for scroll bar */
        }

        .uploaded-image-item {
            position: relative;
            display: inline-block;
        }

        .uploaded-image-item img {
            display: block;
            max-width: 100px;
            height: auto;
        }

        .uploaded-image-item .btn-danger {
            position: absolute;
            top: 0;
            right: 0;
        }

        .uploaded-images {
            overflow-x: auto;
            scrollbar-width: none;
        }

        .uploaded-images::-webkit-scrollbar {
            display: none;
        }
    </style>

    <div class="main-content">
        <div class="page-content">
            <div>Page > {{ $page->name ?? '' }}</div>

            <div class="container-fluid mt-5" id="logo-section">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Clinet Logo Section</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-12">
                                <form id="logosection">
                                    @csrf
                                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $page->id }}">
                                    <div class="row">

                                        <div class="col-md-5">
                                            <label for="client_name">Title 1:</label>
                                            <input type="text" class="form-control" id="title1" name="title1"
                                                onchange="saveLogoData()" value="{{ $logo->title1 ?? '' }}" required>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="client_role">Title 2:</label>
                                            <input type="text" class="form-control" id="title2" name="title2"
                                                value="{{ $logo->title2 ?? '' }}" onchange="saveLogoData()" required>
                                        </div>

                                    </div>
                                    <label for="company_name">Form Title:</label>
                                    <input type="text" class="form-control" id="form_title" name="form_title"
                                        value="{{ $logo->form_title ?? '' }}" onchange="saveLogoData()" required>
                                </form>
                                <form action="{{ route('logos.store') }}" method="POST" enctype="multipart/form-data"
                                    class="dropzone mt-2" id="logoDropzone">
                                    @csrf
                                    <input type="file" name="images[]" class="image-add-input" multiple>
                                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $page->id }}">
                                    <div class="dz-message">
                                        Drag & Drop your files here or click to upload.
                                    </div>
                                </form>
                                <div class="uploaded-images mt-3">
                                    @if (isset($clientlogos))
                                        @foreach ($clientlogos as $logo)
                                            <div class="uploaded-image-item" id="logo-{{ $logo->id }}">
                                                <img src="{{ asset('storage/logos/' . $logo->image) }}" alt="Uploaded Image"
                                                    width="100">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteLogo({{ $logo->id }})">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="year-of-experience">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Years of Expertise Section</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <input type="hidden" class="recordId" value="">
                            <div class="row ms-1">
                                <div class="col-md-2">
                                    <label for="years">Years:</label>
                                    <input type="text" class="form-control get-touch-us-form title1" value="">
                                </div>
                                <div class="col-md-4">
                                    <label>Title 1:</label>
                                    <input type="text" class="form-control get-touch-us-form title3" value="">
                                </div>
                                <div class="col-md-6">
                                    <label>Title 2:</label>
                                    <input type="text" class="form-control get-touch-us-form title2" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="years">Years:</label>
                                    <input type="text" class="form-control get-touch-us-form years" id="years"
                                        value="">
                                    <small class="form-text text-muted"> &nbsp;e.g., "5,Some text".</small>
                                </div>
                                <div class="col-md-3">
                                    <label for="clients">Clients:</label>
                                    <input type="text" class="form-control get-touch-us-form clients" id="clients"
                                        value="">
                                    <small class="form-text text-muted"> &nbsp;e.g., "5,Some text".</small>
                                </div>
                                <div class="col-md-3">
                                    <label for="projects">Projects:</label>
                                    <input type="text" class="form-control get-touch-us-form projects" id="projects"
                                        value="">
                                    <small class="form-text text-muted"> &nbsp;e.g., "5,Some text".</small>
                                </div>
                                <div class="col-md-3">
                                    <label for="reviews">Reviews:</label>
                                    <input type="text" class="form-control get-touch-us-form reviews" id="reviews"
                                        value="">
                                    <small class="form-text text-muted"> &nbsp;e.g., "5,Some text".</small>
                                    <input type="hidden" class="parent_id" id="parent_id" name="parent_id"
                                        value="{{ $page->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="recent-projects">
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3 align-items-center">
                            <div class="col-12">
                                <form id="recentProjectForm">
                                    <input type="hidden" id="projectId" name="id">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="re_content" class="textarea-label">Recent Projects Description:</label>
                                            <textarea name="re_content" id="re_content" rows="3" class="full-width-textarea">{{ $recentProjectContent->content??'' }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="page-title-box pb-2">
                                        <h4 class="mb-sm-0 font-size-18">Recent Projects</h4>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" id="parent_id" name="parent_id"
                                            value="{{ $page->id }}">
                                        <div class="col-md-6">
                                            <label for="client_name">Project Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>

                                            <label for="client_role">Project Description:</label>
                                            <input type="text" class="form-control" id="description"
                                                name="description" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="company_name">Project Link:</label>
                                            <input type="text" class="form-control" id="link" name="link"
                                                required>

                                            <label for="review_content">Project Image:</label>
                                            <input type="file" class="form-control" id="image" name="image">

                                            <img id="currentImage" src="" alt="Current Project Image"
                                                style="display:none; margin-top: 10px; max-width: 100px;">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3" id="submitButton">Add
                                        Project</button>
                                </form>

                            </div>
                        </div>
                        <div class="row mt-3" id="recentProjectContainer">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-bordered" id="recentProjectContainer">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Project Discription</th>
                                                <th>Project Link</th>
                                                <th>Project Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="google-reviews">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Google Reviews</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-12">
                                <form id="reviewForm">
                                    <div class="row ms-1">
                                        <div class="col-md-6">
                                            <input type="hidden" id="parent_id" name="parent_id"
                                                value="{{ $page->id }}">
                                            <div class="form-group">
                                                <label for="company_name">Company Name:</label>
                                                <input type="text" class="form-control" id="company_name"
                                                    name="company_name" required>
                                            </div>


                                            <div class="form-group">
                                                <label for="client_role">Client URL:</label>
                                                <input type="text" class="form-control" id="client_role"
                                                    name="client_role" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label for="stars_count">Stars Count (1-5):</label>
                                                <select class="form-control" id="stars_count" name="stars_count"
                                                    required>
                                                    <option value="" disabled selected>Select stars</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Stars</option>
                                                    <option value="3">3 Stars</option>
                                                    <option value="4">4 Stars</option>
                                                    <option value="5">5 Stars</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="client_image">Client Image:</label>
                                                <input type="file" class="form-control" id="client_image"
                                                    name="client_image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="review_content">Review Content:</label>
                                    <textarea class="form-control" id="review_content" name="review_content" required></textarea>

                                    <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                                </form>

                            </div>
                        </div>
                        <div class="row mt-3" id="reviewsContainer">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <table class="table table-bordered" id="reviewsContainer">
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Company URL</th>
                                                <th>Review Content</th>
                                                <th>Stars Count</th>
                                                <th>Client Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="seo-package">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">SEO Section</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <input type="hidden" id="parent_id" name="parent_id" value="{{ $page->id }}">
                            <div class="col-3">
                                <label for="seo_name">Title:</label>
                                <input type="text" class="form-control" id="seo_name" name="seo_name"
                                    value="{{ $seo->title ?? '' }}" required>
                                <label for="seo_image">Image:</label>
                                <input type="file" class="form-control" id="seo_image" name="seo_image"
                                    accept="image/*">
                                <input type="hidden" id="seo_id" name="seo_id" value="{{ $seo->id ?? '' }}">
                                <img id="imagePreview"
                                    src="{{ $seo && $seo->image ? asset('/storage/' . $seo->image) : asset('/path/to/default/image.png') }}"
                                    alt="Uploaded Image" width="100" style="margin-top: 10px;">
                            </div>
                            <div class="col-8">
                                <label for="seo_content">Content:</label>
                                <div id="editor2">{!! $seo->content ?? '' !!}</div>
                                <input type="hidden" id="seo_content" name="seo_content"
                                    value="{{ $seo->content ?? '' }}" required>
                            </div>
                        </div>
                        <button type="button" id="saveButton2" class="btn btn-primary mt-3">Save</button>
                    </div>

                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="price-package">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Pricing Package</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="table-responsive">
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            @if (count($price) > 0)
                                                @foreach ($price[0] as $key => $val)
                                                    @php
                                                        if (
                                                            in_array($key, [
                                                                'id',
                                                                'section_id',
                                                                'parent_id',
                                                                'updated_at',
                                                                'created_at',
                                                            ])
                                                        ) {
                                                            continue;
                                                        }
                                                    @endphp
                                                    <th>{{ ucfirst($key) }}</th>
                                                @endforeach
                                            @endif
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="segmentsTableBody">
                                        @if (isset($price))
                                            @foreach ($price as $item)
                                                <tr data-id="{{ $item->id }}">
                                                    <td>{{ $item->future }}</td>
                                                    <td>{{ $item->basic }}</td>
                                                    <td>{{ $item->medium }}</td>
                                                    <td>{{ $item->enterprice }}</td>
                                                    <td>{{ $item->advanced }}</td>
                                                    <td>
                                                        <button class="edit-row btn btn-primary">Edit</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr>
                                            <td><input type="text" class="future" placeholder="Future"></td>
                                            <td><input type="text" class="basic" placeholder="Basic"></td>
                                            <td><input type="text" class="medium" placeholder="Medium"></td>
                                            <td><input type="text" class="enterprice" placeholder="Enterprise"></td>
                                            <td><input type="text" class="advanced" placeholder="Advanced"></td>
                                            <td>
                                                <input type="hidden" id="parent_id" name="parent_id"
                                                    value="{{ $page->id }}">
                                                <button id="add-row" class="btn btn-success">Add Row</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid mt-5" id="payment-terms">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Payment Terms Section</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-12">
                                <form id="paymentsection">
                                    @csrf
                                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $page->id }}">
                                    <input type="hidden" id="paymentTermId" name="paymentTermId"
                                        value="{{ $paymentTerm->id ?? '' }}"> <!-- Use your actual ID here -->
                                    <label for="payment_content">Payment Content:</label>
                                    <div id="editor">{!! $paymentTerm->content ?? '' !!}</div>
                                    <input type="hidden" id="payment_content" name="payment_content" required>
                                    <button type="button" id="saveButton" class="btn btn-primary mt-3">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{-- <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Portfolios</h4>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <form id="createPortfolioForm" method="POST" action="{{ route('portfolios.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <select name="type" class="form-control" id="type" required>
                                            <option value="">Select Type</option>
                                            <option value="Static">Static</option>
                                            <option value="Dynamic">Dynamic</option>
                                            <option value="Web Application">Web Application</option>
                                            <option value="Logo">Logo</option>
                                            <option value="Brochure">Brochure</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="file" name="image" class="form-control"
                                            accept=".jpg,.png,.jpeg" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="link" class="form-control" placeholder="Link"
                                            required>
                                    </div>
                                    <div class="col">
                                        <select name="status" class="form-control" id="portfoliostatus" required>
                                            <option value="">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Add Portfolio</button>
                            </form>


                            <!-- Display Portfolios -->
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portfolios as $portfolio)
                                        <tr data-id="{{ $portfolio->id }}">
                                            <td>{{ $portfolio->id }}</td>
                                            <td>{{ $portfolio->type }}</td>
                                            <td><img src="{{ asset('images/' . $portfolio->image) }}" alt=""
                                                    style="width: 50px;"></td>
                                            <td>{{ $portfolio->link }}</td>
                                            <td>{{ $portfolio->status }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm editPortfolioModal"
                                                    data-id="{{ $portfolio->id }}">Edit</button>
                                                <form action="{{ route('portfolios.destroy', $portfolio->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr> --}}
        </div>
    </div>
    <div class="modal fade" id="segmentModal" tabindex="-1" aria-labelledby="segmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="segmentModalLabel">Edit Segment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="segmentId">
                    <div class="mb-3">
                        <label for="segmentTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="segmentTitle" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveSegment()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editPortfolioModal" tabindex="-1" aria-labelledby="editPortfolioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editPortfolio" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPortfolioModalLabel">Edit Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editPortfolioId">
                        <div class="mb-3">
                            <label for="editType" class="form-label">Type</label>
                            <select name="type" class="form-control" id="editType" required>
                                <option value="Static">Static</option>
                                <option value="Dynamic">Dynamic</option>
                                <option value="Web Application">Web Application</option>
                                <option value="Logo">Logo</option>
                                <option value="Brochure">Brochure</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="editImage">
                            <img id="existingImage" src="" alt="" style="width: 50px;">
                        </div>
                        <div class="mb-3">
                            <label for="editLink" class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" id="editLink" required>
                        </div>
                        <div class="col">
                            <label for="editStatus" class="form-label">Status</label>
                            <select name="status" class="form-control" id="editStatus" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hash = window.location.hash;
            if (hash) {
                const targetId = hash.substring(1);
                const element = document.getElementById(targetId);

                if (element) {
                    const headerOffset = 100;
                    const elementPosition = element.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.scrollY - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                } else {
                    console.warn("Element not found for ID:", targetId);
                }
            } else {
                console.warn("No hash in URL, cannot scroll to an element.");
            }
        });
    </script>


    <script>
        document.getElementById('recentProjectForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            const projectId = document.getElementById('projectId').value;
            const url = projectId ? `{{ route('recent-projects.update', '') }}/${projectId}` :
                "{{ route('recent-projects.store') }}";

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Response data:", data);
                    if (data.success) {
                        loadProjects();
                        Toastify({
                            text: projectId ? "Project updated successfully!" :
                                "Project added successfully!",
                            backgroundColor: "#4CAF50",
                            position: "right",
                        }).showToast();
                    } else {
                        Toastify({
                            text: "An error occurred: " + data
                                .message,
                            backgroundColor: "#f44336",
                            position: "right",
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Toastify({
                        text: "An unexpected error occurred.",
                        backgroundColor: "#f44336",
                        position: "right",
                    }).showToast();
                });
        });


        function loadProjects() {
            const url = "{{ route('recent.projects.index', ['parent_id' => $page->id]) }}";
            fetch(url)
                .then(response => response.json())
                .then(projects => {
                    let tableBody = document.querySelector('#recentProjectContainer tbody');
                    tableBody.innerHTML = '';
  const path = "{{asset('/')}}";
                    projects.forEach(project => {
                        tableBody.innerHTML += `
                <tr>
                    <td>${project.name}</td>
                    <td>${project.description}</td>
                    <td><a href="${project.link}" target="_blank">${project.link}</a></td>
                    <td><img src="${path}/storage/project_images/${project.image}" width="100" /></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editProject(${project.id})">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProject(${project.id})">Delete</button>
                    </td>
                </tr>
            `;
                    });
                });
        }

        loadProjects();

        function editProject(id) {
            console.log("yee");
            console.log(id);
            fetch(`/admin/recentprojects/${id}`)
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to fetch project data');
                    }
                })
                .then(data => {
                    if (data.success) {
                        const project = data.project;
                        document.getElementById('projectId').value = project.id;
                        document.getElementById('name').value = project.name;
                        document.getElementById('description').value = project.description;
                        document.getElementById('link').value = project.link;

                        document.getElementById('submitButton').textContent = 'Update Project';
                        const path = "{{asset('/')}}";
                        const imageUrl = path+`/storage/project_images/${project.image}`;
                        document.getElementById('currentImage').src = imageUrl;
                        document.getElementById('currentImage').style.display = 'block'; // Show the image
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }

        function deleteProject(id) {
            if (confirm('Are you sure you want to delete this project?')) {
                fetch(`/admin/recent-projects/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            loadProjects();
                            Toastify({
                                text: "Project deleted successfully!",
                                backgroundColor: "#f44336",
                                position: "right",
                            }).showToast();
                        }
                    });
            }
        }
    </script>
    <script>
        Dropzone.options.logoDropzone = {
            paramName: "images",
            maxFilesize: 2, // MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            success: function(file, response) {
                console.log("Success! Images uploaded.");
            },
            error: function(file, response) {
                console.log("Error uploading images.");
            }
        };

        function deleteLogo(logoId) {
            const url = "{{ route('logos.destroy', ':id') }}".replace(':id', logoId);

            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('logo-' + logoId).remove();

                        Toastify({
                            text: "Logo deleted successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#DC3545", // Red color for delete
                        }).showToast();
                    } else {
                        console.error('Error deleting logo');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        function saveLogoData() {
            const title1 = document.getElementById('title1').value;
            const parent_id = document.getElementById('parent_id').value;
            const title2 = document.getElementById('title2').value;
            const formTitle = document.getElementById('form_title').value;
            const url = "{{ route('logos.update') }}";

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        title1: title1,
                        parent_id: parent_id,
                        title2: title2,
                        form_title: formTitle
                    })
                })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to update logo data');
                    }
                })
                .then(data => {
                    if (data.success) {
                        console.log('Logo data updated successfully');
                        Toastify({
                            text: "Logo data updated successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();
                    } else {
                        console.error('Error updating logo data');
                        Toastify({
                            text: "Error updating logo data",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#FF0000",
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Toastify({
                        text: "Error: " + error.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#FF0000",
                    }).showToast();
                });
        }
    </script>

    <script>
        $(document).on('click', '.editPortfolio', function() {
            var id = $(this).data('id');
            $.get('/portfolios/' + id + '/edit', function(data) {
                $('#editPortfolioId').val(data.id);
                document.getElementById('editType').value = portfolio.type;
                $('#editImage').val(data.image);
                $('#editLink').val(data.link);
                $('#editSortOrder').val(data.sort_order);
                $('#editStatus').val(data.status);
                $('#editPortfolioForm').attr('action', '/portfolios/' + id);
                $('#editPortfolioModal').modal('show');
            });
        });
        $(document).ready(function() {
            $('.editPortfolioModal').on('click', function() {
                const portfolioId = $(this).data('id');

                const editUrl = `{{ route('portfolios.edit', ':id') }}`.replace(':id', portfolioId);

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(portfolio) {
                        $('#editPortfolioId').val(portfolio.id);
                        $('#editType').val(portfolio.type);
                        $('#editLink').val(portfolio.link);
                        $('#editStatus').val(portfolio.status);

                        $('#existingImage').attr('src', `/images/${portfolio.image}`).attr(
                            'alt', portfolio.type);

                        $('#editPortfolio').attr('action', `/portfolios/${portfolio.id}`);

                        $('#editPortfolioModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching portfolio data:', xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            initializeReviews();

            initializeGetTouchUs();
        });

        function initializeReviews() {
            fetchReviews();

            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            function fetchReviews() {
                const url = "{{ route('client.reviews.index', ['parent_id' => $page->id]) }}";
                $.get(url, function(data) {
                    $('#reviewsContainer tbody').empty(); // Clear existing reviews
                    data.forEach(function(review) {
                          const path = "{{asset('/')}}";
                        $('#reviewsContainer tbody').append(`
                <tr class="review" data-id="${review.id}">
                    <td>${review.company_name}</td>
                    <td>${review.client_role}</td>
                    <td>${review.review_content}</td>
                    <td>${review.stars_count}</td>
                    <td><img src="${path}/storage/${review.client_image}" alt="${review.client_name}" style="width: 60px;"></td>
                    <td><button class="btn btn-danger deleteReview">Delete</button></td>
                </tr>
            `);
                    });
                });
            }


            $('#reviewForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                let formData = new FormData(this); // Get form data
                formData.append('_token', csrfToken); // Append CSRF token

                $.ajax({
                    url: '/admin/client-reviews',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        fetchReviews(); // Refresh reviews
                        $('#reviewForm')[0].reset(); // Reset form
                        Toastify({
                            text: response.success,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();
                    },
                    error: function(xhr) {
                        let error = xhr.responseJSON.message || "An error occurred";
                        Toastify({
                            text: "Failed to add review: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336",
                        }).showToast();
                    }
                });
            });

            $(document).on('click', '.deleteReview', function() {
                let reviewId = $(this).closest('.review').data('id');

                $.ajax({
                    url: `/admin/client-reviews/${reviewId}`,
                    type: 'DELETE',
                    data: {
                        _token: csrfToken // Send CSRF token with the delete request
                    },
                    success: function(response) {
                        fetchReviews(); // Refresh reviews
                        Toastify({
                            text: response.success,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336",
                        }).showToast();
                    },
                    error: function(xhr) {
                        let error = xhr.responseJSON.message || "An error occurred";
                        Toastify({
                            text: "Failed to delete review: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336",
                        }).showToast();
                    }
                });
            });
        }


        function initializeGetTouchUs() {

            let originalValues = {};

            fetchRecord(); // Fetch the existing record data
            function fetchRecord() {
                const url = "{{ route('getTouchUs.index', ['parent_id' => $page->id]) }}";
                $.get(url, function(data) {
                    if (data.length > 0) {
                        let record = data[0];
                        $('.recordId').val(record.id);
                        $('.title1').val(record.title1);
                        $('.title2').val(record.title2);
                        $('.title3').val(record.title3);
                        $('.years').val(record.years);
                        $('.clients').val(record.clients);
                        $('.projects').val(record.projects);
                        $('.reviews').val(record.reviews);

                        originalValues = {
                            title1: record.title1,
                            title2: record.title2,
                            years: record.years,
                            clients: record.clients,
                            projects: record.projects,
                            reviews: record.reviews,
                        };
                    }
                }).fail(function() {
                    Toastify({
                        text: "Failed to load record.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#F44336",
                    }).showToast();
                });
            }

            $('.get-touch-us-form').on('change', function() {
                checkChanges(); // Check for changes when any input field changes
            });

            function checkChanges() {
                let id = $('.recordId').val();
                let currentData = {
                    title1: $('.title1').val(),
                    parent_id: $('.parent_id').val(),
                    title2: $('.title2').val(),
                    title3: $('.title3').val(),
                    years: $('.years').val(),
                    clients: $('.clients').val(),
                    projects: $('.projects').val(),
                    reviews: $('.reviews').val(),
                };

                if (JSON.stringify(originalValues) !== JSON.stringify(currentData)) {
                    saveChanges(currentData); // Save changes if there are any
                }
            }

            function saveChanges(data) {
                data._token = $('meta[name="csrf-token"]').attr('content');
                var id = $('.parent_id').val();
                const url = "{{ route('getTouchUs.update', [':id']) }}".replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        Toastify({
                            text: "Record updated successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        let error = xhr.responseJSON.message || "An error occurred";
                        Toastify({
                            text: "Failed to update: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336",
                        }).showToast();
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#add-row').click(function() {
                var future = $('.future').val();
                var parent_id = $('.parent_id').val();
                var basic = $('.basic').val();
                var medium = $('.medium').val();
                var enterprice = $('.enterprice').val();
                var advanced = $('.advanced').val();

                $.ajax({
                    url: `{{ route('price.store') }}`, // Update with your actual route
                    method: 'POST',
                    data: {
                        future: future,
                        basic: basic,
                        medium: medium,
                        parent_id: parent_id,
                        enterprice: enterprice,
                        advanced: advanced,
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        $('#segmentsTableBody').append(`
                    <tr data-id="${response.id}">
                        <td>${response.future}</td>
                        <td>${response.basic}</td>
                        <td>${response.medium}</td>
                        <td>${response.enterprice}</td>
                        <td>${response.advanced}</td>
                        <td>
                            <button class="edit-row btn btn-primary">Edit</button>
                        </td>
                    </tr>
                `);

                        $('.future').val('');
                        $('.basic').val('');
                        $('.medium').val('');
                        $('.enterprice').val('');
                        $('.advanced').val('');

                        Toastify({
                            text: "Segment added successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        var errorMessage = xhr.responseJSON.message ||
                            'An error occurred while adding the segment.';
                        Toastify({
                            text: errorMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336", // Red for error
                        }).showToast();
                    }
                });
            });

            $(document).on('click', '.edit-row', function() {
                var row = $(this).closest('tr');
                var id = row.data('id');

                $('.future').val(row.find('td:nth-child(1)').text());
                $('.basic').val(row.find('td:nth-child(2)').text());
                $('.medium').val(row.find('td:nth-child(3)').text());
                $('.enterprice').val(row.find('td:nth-child(4)').text());
                $('.advanced').val(row.find('td:nth-child(5)').text());

                $('#add-row').text('Update Row').off('click').on('click', function() {
                    const url = "{{ route('price.update2', [':id']) }}".replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'PUT',
                        data: {
                            future: $('.future').val(),
                            basic: $('.basic').val(),
                            medium: $('.medium').val(),
                            enterprice: $('.enterprice').val(),
                            advanced: $('.advanced').val(),
                            _token: '{{ csrf_token() }}' // CSRF token for security
                        },
                        success: function(response) {
                            row.find('td:nth-child(1)').text(response.future);
                            row.find('td:nth-child(2)').text(response.basic);
                            row.find('td:nth-child(3)').text(response.medium);
                            row.find('td:nth-child(4)').text(response.enterprice);
                            row.find('td:nth-child(5)').text(response.advanced);

                            $('.future').val('');
                            $('.basic').val('');
                            $('.medium').val('');
                            $('.enterprice').val('');
                            $('.advanced').val('');

                            $('#add-row').text('Add Row').off('click').on('click',
                                function() {});

                            Toastify({
                                text: "Segment updated successfully!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#4CAF50", // Green for success
                            }).showToast();
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            var errorMessage = xhr.responseJSON.message ||
                                'An error occurred while updating the segment.';
                            Toastify({
                                text: errorMessage,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#F44336", // Red for error
                            }).showToast();
                        }
                    });
                });
            });
        });

        function editSegment(id) {
            fetch(`/sections/${id}`)
                .then(response => response.json())
                .then(section => {
                    document.getElementById('segmentId').value = section.id; // Hidden input field for ID
                    document.getElementById('segmentTitle').value = section.title; // Title input field
                    const segmentModal = new bootstrap.Modal(document.getElementById('segmentModal'));
                    segmentModal.show(); // Open the modal
                })
                .catch(error => {
                    console.error('Failed to fetch section details:', error);
                    Toastify({
                        text: "Failed to fetch section details.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#F44336", // Red for error
                    }).showToast();
                });
        }

        function saveSegment() {
            const segmentId = document.getElementById('segmentId').value;
            const segmentTitle = document.getElementById('segmentTitle').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/sections/${segmentId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        title: segmentTitle
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`#segment-${segmentId} td:nth-child(2)`).innerText = segmentTitle;
                        Toastify({
                            text: "Segment updated successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                        const segmentModal = bootstrap.Modal.getInstance(document.getElementById('segmentModal'));
                        segmentModal.hide();
                    } else {
                        Toastify({
                            text: "Failed to update segment.",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336", // Red for error
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error('Error updating segment:', error);
                    Toastify({
                        text: "Error updating segment.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#F44336", // Red for error
                    }).showToast();
                });
        }

        function deleteSegment(id) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (!confirm('Are you sure you want to delete this segment?')) return;
            const url = "{{ route('section.delete', [':id']) }}".replace(':id', id);
            console.log(url);
            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`segment-${id}`).remove(); // Remove the row
                        Toastify({
                            text: "Section deleted successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                    } else {

                        Toastify({
                            text: 'Failed to delete Section.',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336", // Red for error
                        }).showToast();
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const segmentsTableBody = document.getElementById('segmentsTableBody');
            let draggedRow = null;

            segmentsTableBody.addEventListener('dragstart', function(e) {
                if (e.target.nodeName === 'TR') {
                    draggedRow = e.target;
                    draggedRow.classList.add('highlight');
                }
            });

            segmentsTableBody.addEventListener('dragover', function(e) {
                e.preventDefault();
                const currentRow = e.target.closest('tr');
                if (currentRow && currentRow !== draggedRow) {
                    currentRow.classList.add('highlight');
                }
            });

            segmentsTableBody.addEventListener('dragleave', function(e) {
                const currentRow = e.target.closest('tr');
                if (currentRow) {
                    currentRow.classList.remove('highlight');
                }
            });

            segmentsTableBody.addEventListener('drop', function(e) {
                e.preventDefault();
                const targetRow = e.target.closest('tr');

                console.log('Target Row:', targetRow);
                console.log('Dragged Row:', draggedRow);

                if (targetRow && targetRow !== draggedRow) {
                    const isBelow = (targetRow.getBoundingClientRect().top < draggedRow
                        .getBoundingClientRect().top);
                    if (isBelow) {
                        segmentsTableBody.insertBefore(draggedRow, targetRow);
                        segmentsTableBody.insertBefore(targetRow, draggedRow.nextSibling);
                        console.log(`Moved ${draggedRow.id} after ${targetRow.id}`);
                    } else {
                        segmentsTableBody.insertBefore(targetRow, draggedRow);
                        segmentsTableBody.insertBefore(draggedRow, targetRow.nextSibling);
                        console.log(`Moved ${targetRow.id} before ${draggedRow.id}`);
                    }

                    const newOrderId = targetRow.id.split('-')[1];
                    const oldOrderId = draggedRow.id.split('-')[1];

                    updateOrder(oldOrderId, newOrderId);
                } else {
                    console.log("Invalid Drop Target");
                }

                if (draggedRow) {
                    draggedRow.classList.remove('highlight');
                    draggedRow = null;
                }
            });

            function updateOrder(draggedId, targetId) {
                fetch("{{ route('sortorder.update') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            draggedId: draggedId,
                            targetId: targetId
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(error => {
                                console.error("AJAX Error:", error);
                                Toastify({
                                    text: error.message,
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#F44336", // Red for error
                                }).showToast();
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Success:', data);
                        Toastify({
                            text: "Order updated successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green for success
                        }).showToast();
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Failed to update order:', error);
                        Toastify({
                            text: "Failed to update order: " + error,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#F44336",
                        }).showToast();
                    });
            }
        });
    </script>
    <script>
        const editor = new FroalaEditor('#editor', {
            toolbarButtons: [
                'undo', 'redo', '|',
                'bold', 'italic', 'underline', '|',
                'paragraphFormat', 'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', '|',
                'clearFormatting', 'html'
            ],
            height: 300
        });

        const saveContent = () => {
            const paymentContent = editor.html.get();
            console.log(paymentContent);
            const parent_id = document.getElementById('parent_id').value;
            document.getElementById('payment_content').value = paymentContent;

            const paymentTermId = document.getElementById('parent_id').value; // If you're updating, get the ID
            const url = `{{ route('payment-terms.update', '') }}/${paymentTermId}`;

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json', // Set content type to JSON
                    },
                    body: JSON.stringify({
                        content: paymentContent,
                        parent_id: parent_id
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Toastify({
                            text: "Payment term updated successfully!",
                            backgroundColor: "#4CAF50",
                            position: "right",
                        }).showToast();
                    } else {
                        Toastify({
                            text: "An error occurred: " + data.message,
                            backgroundColor: "#f44336",
                            position: "right",
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Toastify({
                        text: "An unexpected error occurred.",
                        backgroundColor: "#f44336",
                        position: "right",
                    }).showToast();
                });
        };

        document.getElementById('saveButton').addEventListener('click', saveContent);

        // editor.events.on('blur', saveContent);
    </script>

    <script>
        const editor2 = new FroalaEditor('#editor2', {
            toolbarButtons: [
                'undo', 'redo', '|',
                'bold', 'italic', 'underline', '|',
                'paragraphFormat', 'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', '|',
                'clearFormatting', 'html'
            ],
            height: 300 // Adjust height as needed
        });

        document.getElementById('seo_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgPreview = document.getElementById('imagePreview');
                imgPreview.src = e.target.result; // Set the source of the image to the file's result
            };

            if (file) {
                reader.readAsDataURL(file); // Read the file as a Data URL
            }
        });

        const saveContent2 = () => {
            const seoContent = editor2.html.get();
            console.log(seoContent);

            document.getElementById('seo_content').value = seoContent;

            const seoId = document.getElementById('seo_id').value; // Get the ID for updating
            const parent_id = document.getElementById('parent_id').value; // Get the ID for updating
            const title = document.getElementById('seo_name').value; // Get the title value
            const imageFile = document.getElementById('seo_image').files[0]; // Get the image file

            const formData = new FormData();
            formData.append('title', title);
            if (imageFile) {
                formData.append('seo_image', imageFile); // Only append if an image is selected
            }
            formData.append('content', seoContent);
            formData.append('seo_id', seoId); // Include the ID for updating
            formData.append('parent_id', parent_id); // Include the ID for updating

            const url = `{{ route('seo-sections.update', '') }}/${parent_id}`;
            console.log(url);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'), // Add CSRF token
                    },
                    body: formData, // Send FormData object
                })
                .then(response => {
                    console.log(response);
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Toastify({
                            text: "SEO Section updated successfully!",
                            backgroundColor: "#4CAF50",
                            position: "right",
                        }).showToast();
                    } else {
                        Toastify({
                            text: "An error occurred: " + data.message,
                            backgroundColor: "#f44336",
                            position: "right",
                        }).showToast();
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Toastify({
                        text: "An unexpected error occurred.",
                        backgroundColor: "#f44336",
                        position: "right",
                    }).showToast();
                });
        };

        document.getElementById('saveButton2').addEventListener('click', saveContent2);
    </script>
    <script>
        $(document).ready(function() {
        $('#re_content').on('change', function() {
        const newText = $(this).val();
        const parent_id = document.getElementById('parent_id').value;
        $.ajax({
            url: "{{ route('project.update.route') }}",
            type: 'POST',
            data: {
                content: newText,
                parent_id: parent_id,
                _token: '{{ csrf_token() }}' 
            },
            success: function(response) {
                // Show a success message or handle successful response
                Toastify({
                    text: "Content updated successfully!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50", // Green success color
                }).showToast();
            },
            error: function(xhr) {
                // Show an error message if the update fails
                const errorMsg = xhr.responseJSON?.message || "Update failed. Please try again.";
                Toastify({
                    text: errorMsg,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#FF0000", // Red error color
                }).showToast();
            }
        });
    });
});

        </script>
@endsection
