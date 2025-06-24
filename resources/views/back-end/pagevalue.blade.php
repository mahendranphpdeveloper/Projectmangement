    @extends('layout.adminPageControl')
    @section('content')
    <style>
        .text-left {
            text-align: left;
        }

        .hero-section {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        #preview-container {
            position: relative;
            width: 100%;
            height: 100%;
            /* min-height: 400px; */
            /* Ensure a minimum height for better visibility */
            overflow: hidden;
        }

        #preview-image {
            background-size: cover;
            /* Ensure the image covers the entire area */
            background-position: center;
            /* Center the image */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            /* Set a lower z-index to place the image behind content */
        }

        #preview-container .position-relative {
            z-index: 2;
            /* Ensure content is above the background image */
            padding: 20px;
        }
    </style>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Section Editor</h4>
                            <button class="btn btn-info" id="backButton">Back</button>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($data['hero']))
                                <section class="hero-section container layout-left">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        @if($data['hero'] == 1)
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <input type="hidden" name="hero-layout" id="hero-layout" value="start">
                                            <div class="dropzone-container mb-4">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file">
                                                    </div>
                                                    <div class="dz-message needsclick text-center">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        <h4>Drop hero image here or click to upload.</h4>
                                                    </div>
                                                </div>

                                                <!-- File Preview -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- File Preview Template -->
                                                        <div class="border rounded p-2 d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded overflow-hidden">
                                                                    <img data-dz-thumbnail class="img-fluid rounded" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone Image">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <!-- Hero Title -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-title" id="hero-title" class="form-control" placeholder="Enter hero title">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Button Name -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-button" id="hero-button" class="form-control" placeholder="Enter hero button name">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Link -->
                                                <div class="col-6 d-flex flex-column justify-content-end">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-link" id="hero-link" class="form-control" placeholder="Enter hero link">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Text Color Picker -->
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose Text Color</label>
                                                        <input type="color" name="hero-text-color" id="hero-text-color" class="form-control" title="Choose text color">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose button Color</label>
                                                        <input type="color" name="hero-button-color" id="hero-button-color" class="form-control" title="Choose button color">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hero Content -->
                                            <div class="mb-4">
                                                <textarea name="hero-content" id="hero-content" class="form-control text-left" cols="20" rows="5" placeholder="Enter hero content"></textarea>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled col-5">Save Changes</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($data['hero'] == 2)
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <input type="hidden" name="hero-layout" id="hero-layout" value="center">
                                            <div class="dropzone-container mb-4">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file">
                                                    </div>
                                                    <div class="dz-message needsclick text-center">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        <h4>Drop hero image here or click to upload.</h4>
                                                    </div>
                                                </div>

                                                <!-- File Preview -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- File Preview Template -->
                                                        <div class="border rounded p-2 d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded overflow-hidden">
                                                                    <img data-dz-thumbnail class="img-fluid rounded" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone Image">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <!-- Hero Title -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-title" id="hero-title" class="form-control" placeholder="Enter hero title">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Button Name -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-button" id="hero-button" class="form-control" placeholder="Enter hero button name">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Link -->
                                                <div class="col-6 d-flex flex-column justify-content-end">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-link" id="hero-link" class="form-control" placeholder="Enter hero link">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Text Color Picker -->
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose Text Color</label>
                                                        <input type="color" name="hero-text-color" id="hero-text-color" class="form-control" title="Choose text color">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose button Color</label>
                                                        <input type="color" name="hero-button-color" id="hero-button-color" class="form-control" title="Choose button color">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hero Content -->
                                            <div class="mb-4">
                                                <textarea name="hero-content" id="hero-content" class="form-control text-left" cols="20" rows="5" placeholder="Enter hero content"></textarea>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled col-5">Save Changes</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($data['hero'] == 3)
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <input type="hidden" name="hero-layout" id="hero-layout" value="end">
                                            <div class="dropzone-container mb-4">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file">
                                                    </div>
                                                    <div class="dz-message needsclick text-center">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        <h4>Drop hero image here or click to upload.24</h4>
                                                    </div>
                                                </div>

                                                <!-- File Preview -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- File Preview Template -->
                                                        <div class="border rounded p-2 d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded overflow-hidden">
                                                                    <img data-dz-thumbnail class="img-fluid rounded" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone Image">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="row d-flex justify-content-between">
                                                <!-- Hero Title -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-title" id="hero-title" class="form-control" placeholder="Enter hero title">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Button Name -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-button" id="hero-button" class="form-control" placeholder="Enter hero button name">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Link -->
                                                <div class="col-6 d-flex flex-column justify-content-end">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-link" id="hero-link" class="form-control" placeholder="Enter hero link">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Text Color Picker -->
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose Text Color</label>
                                                        <input type="color" name="hero-text-color" id="hero-text-color" class="form-control" title="Choose text color">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-button-color" class="form-label">Choose Button Color</label>
                                                        <input type="color" name="hero-button-color" id="hero-button-color" class="form-control" title="Choose button color">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hero Content -->
                                            <div class="mb-4">
                                                <textarea name="hero-content" id="hero-content" class="form-control text-left" cols="20" rows="5" placeholder="Enter hero content"></textarea>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled col-5">Save Changes</a>
                                            </div>
                                        </div>

                                        @endif
                                        @if($data['hero'] == 4)
                                        <input type="hidden" name="hero-layout" id="hero-layout" value="start">
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <!-- Sliders Container -->
                                            <div id="sliders-container">
                                                <!-- Slider Template (will be cloned) -->
                                                <div class="slider-item mb-4" id="slider-template" style="display: none;">
                                                    <!-- Simple Image Upload -->
                                                    <div class="mb-4">
                                                        <input type="file" class="file-upload form-control" accept="image/*">
                                                    </div>

                                                    <!-- Slider Inputs -->
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-title[]" class="form-control" placeholder="Enter hero title">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-button[]" class="form-control" placeholder="Enter hero button name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-link[]" class="form-control" placeholder="Enter hero link">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Text Color</label>
                                                                <input type="color" name="hero-text-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Button Color</label>
                                                                <input type="color" name="hero-button-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Slider Content -->
                                                    <div class="mb-4">
                                                        <textarea name="hero-content[]" class="form-control" rows="3" placeholder="Enter hero content"></textarea>
                                                    </div>

                                                    <!-- Remove Slider Button -->
                                                    <button class="btn btn-danger remove-slider col-1"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>

                                            <!-- Add New Slider Button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary col-6 mb-4" id="add-slider"><i class="fas fa-plus"></i> Add Next Slider</button>
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($data['hero'] == 5)
                                        <input type="hidden" name="hero-layout" id="hero-layout" value="center">
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <!-- Sliders Container -->
                                            <div id="sliders-container">
                                                <!-- Slider Template (will be cloned) -->
                                                <div class="slider-item mb-4" id="slider-template" style="display: none;">
                                                    <!-- Simple Image Upload -->
                                                    <div class="mb-4">
                                                        <input type="file" class="file-upload form-control" accept="image/*">
                                                    </div>

                                                    <!-- Slider Inputs -->
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-title[]" class="form-control" placeholder="Enter hero title">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-button[]" class="form-control" placeholder="Enter hero button name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-link[]" class="form-control" placeholder="Enter hero link">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Text Color</label>
                                                                <input type="color" name="hero-text-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Button Color</label>
                                                                <input type="color" name="hero-button-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Slider Content -->
                                                    <div class="mb-4">
                                                        <textarea name="hero-content[]" class="form-control" rows="3" placeholder="Enter hero content"></textarea>
                                                    </div>

                                                    <!-- Remove Slider Button -->
                                                    <button class="btn btn-danger remove-slider col-1"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>

                                            <!-- Add New Slider Button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary col-6 mb-4" id="add-slider"><i class="fas fa-plus"></i> Add Next Slider</button>
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if($data['hero'] == 6)
                                        <input type="hidden" name="hero-layout" id="hero-layout" value="end">
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <!-- Sliders Container -->
                                            <div id="sliders-container">
                                                <!-- Slider Template (will be cloned) -->
                                                <div class="slider-item mb-4" id="slider-template" style="display: none;">
                                                    <!-- Simple Image Upload -->
                                                    <div class="mb-4">
                                                        <input type="file" class="file-upload form-control" accept="image/*">
                                                    </div>

                                                    <!-- Slider Inputs -->
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-title[]" class="form-control" placeholder="Enter hero title">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-button[]" class="form-control" placeholder="Enter hero button name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-4">
                                                                <input type="text" name="hero-link[]" class="form-control" placeholder="Enter hero link">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Text Color</label>
                                                                <input type="color" name="hero-text-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="mb-4">
                                                                <label class="form-label">Button Color</label>
                                                                <input type="color" name="hero-button-color[]" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Slider Content -->
                                                    <div class="mb-4">
                                                        <textarea name="hero-content[]" class="form-control" rows="3" placeholder="Enter hero content"></textarea>
                                                    </div>

                                                    <!-- Remove Slider Button -->
                                                    <button class="btn btn-danger remove-slider col-1"><i class="fas fa-trash"></i></button>
                                                </div>
                                            </div>

                                            <!-- Add New Slider Button -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-primary col-6 mb-4" id="add-slider"><i class="fas fa-plus"></i> Add Next Slider</button>
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </section>
                                @endif
                                @if(isset($data['about']))
                                <section class="about-section container layout-left">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        @if($data['about'] == 1)
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <input type="hidden" name="hero-layout" id="hero-layout" value="start">
                                            <input type="hidden" name="layout-type" id="layout-type" value="about">
                                            <div class="dropzone-container mb-4">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file">
                                                    </div>
                                                    <div class="dz-message needsclick text-center">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        <h4>Drop about image here or click to upload.</h4>
                                                    </div>
                                                </div>

                                                <!-- File Preview -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- File Preview Template -->
                                                        <div class="border rounded p-2 d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded overflow-hidden">
                                                                    <img data-dz-thumbnail class="img-fluid rounded" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone Image">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <!-- Hero Title -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-title" id="hero-title" class="form-control" placeholder="Enter hero title">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Button Name -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-button" id="hero-button" class="form-control" placeholder="Enter hero button name">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Link -->
                                                <div class="col-6 d-flex flex-column justify-content-end">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-link" id="hero-link" class="form-control" placeholder="Enter hero link">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Text Color Picker -->
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose Text Color</label>
                                                        <input type="color" name="hero-text-color" id="hero-text-color" class="form-control" title="Choose text color">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose button Color</label>
                                                        <input type="color" name="hero-button-color" id="hero-button-color" class="form-control" title="Choose button color">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hero Content -->
                                            <div class="mb-4">
                                                <textarea name="hero-content" id="hero-content" class="form-control text-left" cols="20" rows="5" placeholder="Enter hero content"></textarea>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled col-5">Save Changes</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($data['about'] == 2)
                                        <div class="col-12 hero-image d-flex flex-column justify-content-center p-4">
                                            <input type="hidden" name="hero-layout" id="hero-layout" value="start">
                                            <input type="hidden" name="layout-type" id="layout-type" value="about2">
                                            <div class="dropzone-container mb-4">
                                                <div class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file">
                                                    </div>
                                                    <div class="dz-message needsclick text-center">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        <h4>Drop about image here or click to upload.</h4>
                                                    </div>
                                                </div>

                                                <!-- File Preview -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                    <li class="mt-2" id="dropzone-preview-list">
                                                        <!-- File Preview Template -->
                                                        <div class="border rounded p-2 d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded overflow-hidden">
                                                                    <img data-dz-thumbnail class="img-fluid rounded" src="../../../img.themesbrand.com/judia/new-document.png" alt="Dropzone Image">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                <p class="fs-sm text-muted mb-0" data-dz-size></p>
                                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row d-flex justify-content-between">
                                                <!-- Hero Title -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-title" id="hero-title" class="form-control" placeholder="Enter hero title">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Button Name -->
                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-button" id="hero-button" class="form-control" placeholder="Enter hero button name">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Hero Link -->
                                                <div class="col-6 d-flex flex-column justify-content-end">
                                                    <div class="mb-4">
                                                        <h1 class="card-title">
                                                            <input type="text" name="hero-link" id="hero-link" class="form-control" placeholder="Enter hero link">
                                                        </h1>
                                                    </div>
                                                </div>

                                                <!-- Text Color Picker -->
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose Text Color</label>
                                                        <input type="color" name="hero-text-color" id="hero-text-color" class="form-control" title="Choose text color">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-4">
                                                        <label for="hero-text-color" class="form-label">Choose button Color</label>
                                                        <input type="color" name="hero-button-color" id="hero-button-color" class="form-control" title="Choose button color">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hero Content -->
                                            <div class="mb-4">
                                                <textarea name="hero-content" id="hero-content" class="form-control text-left" cols="20" rows="5" placeholder="Enter hero content"></textarea>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-info hero-preview col-5" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button>
                                                <a href="#" tabindex="-1" class="btn btn-primary disabled col-5">Save Changes</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </section>
                                @endif
                                <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="previewModalLabel">Hero Section Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <!-- Preview Content with Background Image -->
                                                <div id="preview-container" class="carousel slide" data-bs-ride="carousel">
                                                    <div id="carousel-inner" class="carousel-inner">
                                                        <!-- Dynamic Preview Slides will be inserted here -->
                                                    </div>
                                                    <a class="carousel-control-prev" href="#preview-container" role="button" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#preview-container" role="button" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.hero-preview').addEventListener('click', function() {
                
                const title = document.getElementById('hero-title').value;
                const content = document.getElementById('hero-content').value;
                const buttonLink = document.getElementById('hero-link').value;
                const buttonName = document.getElementById('hero-button').value;
                const textColor = document.getElementById('hero-text-color').value;
                const buttonColor = document.getElementById('hero-button-color').value;
                const heroLayout = document.getElementById('hero-layout').value;
                const layoutType = document.getElementById('layout-type').value;
                const carouselInner = document.getElementById('carousel-inner');
                const previewImageContainer = document.getElementById('preview-image');
                const image = document.querySelector('#dropzone-preview img');

                // Clear existing carousel items
                carouselInner.innerHTML = '';

                if (title && content && buttonName) {
                    const carouselItem = document.createElement('div');
            carouselItem.className = `carousel-item ${carouselInner.children.length === 0 ? 'active' : ''}`;
                if(layoutType == "about"){
            carouselItem.innerHTML = `
                <div class="d-flex align-items-center h-100 p-4">
                    <div class="col-6">
                        <img src="${image ? image.src : ''}" alt="About Image" class="img-fluid" style="width:100%;height:100%">
                    </div>
                    <div class="col-6 text-right">
                        <h1 class="mb-3" style="color: ${textColor};">${title}</h1>
                        <p class="mb-3" style="color: ${textColor}; white-space: pre-wrap;">${content}</p>
                        <a href="${buttonLink}" class="btn" style="background-color: ${buttonColor}; color: #fff;">${buttonName}</a>
                    </div>
                </div>
            `;
                }else if(layoutType == "about2"){
                    carouselItem.innerHTML = `
                <div class="d-flex align-items-center h-100 p-4">
                <div class="col-6 text-right">
                <h1 class="mb-3" style="color: ${textColor};">${title}</h1>
                <p class="mb-3" style="color: ${textColor}; white-space: pre-wrap;">${content}</p>
                <a href="${buttonLink}" class="btn" style="background-color: ${buttonColor}; color: #fff;">${buttonName}</a>
                </div>
                <div class="col-6">
                    <img src="${image ? image.src : ''}" alt="About Image" class="img-fluid"  style="width:100%;height:100%">
                </div>
                </div>
            `;
                }else{
                    carouselItem.innerHTML = `
                <div class="d-flex flex-column justify-content-center align-items-${heroLayout} h-100 p-4 text-${heroLayout}" style="background-image: url('${image ? image.src : ''}'); background-size: cover; background-position: center;">
                    <h1 class="mb-3" style="color: ${textColor};">${title}</h1>
                    <p class="mb-3" style="color: ${textColor}; white-space: pre-wrap;">${content}</p>
                    <a href="${buttonLink}" class="btn" style="background-color: ${buttonColor}; color: #fff; width: fit-content;">${buttonName}</a>
                </div>
            `;
                }
                    carouselInner.appendChild(carouselItem);
                    $('.carousel-control-prev').addClass('d-none');
                    $('.carousel-control-next').addClass('d-none');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addSliderButton = document.getElementById('add-slider');
            const slidersContainer = document.getElementById('sliders-container');
            const sliderTemplate = document.getElementById('slider-template');
            const previewButton = document.querySelector('.hero-preview');
            const carouselInner = document.getElementById('carousel-inner');
            const heroLayout = document.getElementById('hero-layout').value;

            if (!addSliderButton || !slidersContainer || !sliderTemplate || !previewButton || !carouselInner) {
                console.error('Some elements are missing in the DOM.');
                return;
            }

            addSliderButton.addEventListener('click', function() {
                const newSlider = sliderTemplate.cloneNode(true);
                newSlider.style.display = 'block';
                newSlider.removeAttribute('id');
                slidersContainer.appendChild(newSlider);

                const removeButton = newSlider.querySelector('.remove-slider');
                removeButton.addEventListener('click', function() {
                    newSlider.remove();
                });

                // Add event listener for textarea "Enter" key
                const contentTextarea = newSlider.querySelector('textarea[name="hero-content[]"]');
                contentTextarea.addEventListener('keyup', function(event) {
                    if (event.key === 'Enter') {
                        updatePreview();
                    }
                });
            });

            previewButton.addEventListener('click', function() {
                updatePreview();
            });

            function updatePreview() {
                carouselInner.innerHTML = ''; // Clear the carousel before adding new slides
                const sliders = slidersContainer.querySelectorAll('.slider-item');
                let validSliders = 0;

                sliders.forEach((slider, index) => {
                    const title = slider.querySelector('input[name="hero-title[]"]').value.trim();
                    const content = slider.querySelector('textarea[name="hero-content[]"]').value.trim();
                    const buttonName = slider.querySelector('input[name="hero-button[]"]').value.trim();
                    const buttonLink = slider.querySelector('input[name="hero-link[]"]').value.trim();
                    const textColor = slider.querySelector('input[name="hero-text-color[]"]').value;
                    const buttonColor = slider.querySelector('input[name="hero-button-color[]"]').value;
                    const imageInput = slider.querySelector('.file-upload');
                    const imageUrl = imageInput.files.length ? URL.createObjectURL(imageInput.files[0]) : '';

                    if (title && content && buttonName && imageUrl) {
                        const carouselItem = document.createElement('div');
                        carouselItem.className = `carousel-item ${validSliders === 0 ? 'active' : ''}`;
                        carouselItem.innerHTML = `
                <div class="d-flex flex-column justify-content-center  align-items-${heroLayout} h-100 p-4 text-${heroLayout}" style="background-image: url('${imageUrl}'); background-size: cover; background-position: center;">
                    <h1 class="mb-3" style="color: ${textColor};">${title}</h1>
                    <p class="mb-3" style="color: ${textColor}; white-space: pre-wrap;">${content}</p>
                    <a href="${buttonLink}" class="btn" style="background-color: ${buttonColor}; color: #fff;width: fit-content;">${buttonName}</a>
                </div>
            `;
                        carouselInner.appendChild(carouselItem);
                        validSliders++;
                    }
                });

                if (validSliders === 0) {
                    alert('Please fill in all the required fields for at least one slider to preview.');
                }
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const addSliderButton = document.getElementById('add-slider');
            const slidersContainer = document.getElementById('sliders-container');
            const sliderTemplate = document.getElementById('slider-template');
            const previewButton = document.querySelector('.hero-preview');
            const carouselInner = document.getElementById('carousel-inner');
            const heroLayout = document.getElementById('hero-layout').value;

            if (!addSliderButton || !slidersContainer || !sliderTemplate || !previewButton || !carouselInner) {
                console.error('Some elements are missing in the DOM.');
                return;
            }

            addSliderButton.addEventListener('click', function() {
                const newSlider = sliderTemplate.cloneNode(true);
                newSlider.style.display = 'block';
                newSlider.removeAttribute('id');
                slidersContainer.appendChild(newSlider);

                const removeButton = newSlider.querySelector('.remove-slider');
                removeButton.addEventListener('click', function() {
                    newSlider.remove();
                });

                // Add event listener for textarea "Enter" key
                const contentTextarea = newSlider.querySelector('textarea[name="hero-content[]"]');
                contentTextarea.addEventListener('keyup', function(event) {
                    if (event.key === 'Enter') {
                        updatePreview();
                    }
                });
            });

            previewButton.addEventListener('click', function() {
                updatePreview();
            });

            function updatePreview() {
                carouselInner.innerHTML = ''; // Clear the carousel before adding new slides
                const sliders = slidersContainer.querySelectorAll('.slider-item');
                let validSliders = 0;

                sliders.forEach((slider, index) => {
                    const title = slider.querySelector('input[name="hero-title[]"]').value.trim();
                    const content = slider.querySelector('textarea[name="hero-content[]"]').value.trim();
                    const buttonName = slider.querySelector('input[name="hero-button[]"]').value.trim();
                    const buttonLink = slider.querySelector('input[name="hero-link[]"]').value.trim();
                    const textColor = slider.querySelector('input[name="hero-text-color[]"]').value;
                    const buttonColor = slider.querySelector('input[name="hero-button-color[]"]').value;
                    const imageInput = slider.querySelector('.file-upload');
                    const imageUrl = imageInput.files.length ? URL.createObjectURL(imageInput.files[0]) : '';

                    if (title && content && buttonName && imageUrl) {
                        const carouselItem = document.createElement('div');
                        carouselItem.className = `carousel-item ${validSliders === 0 ? 'active' : ''}`;
                        carouselItem.innerHTML = `
                <div class="d-flex flex-column justify-content-center  align-items-${heroLayout} h-100 p-4 text-${heroLayout}" style="background-image: url('${imageUrl}'); background-size: cover; background-position: center;">
                    <h1 class="mb-3" style="color: ${textColor};">${title}</h1>
                    <p class="mb-3" style="color: ${textColor}; white-space: pre-wrap;">${content}</p>
                    <a href="${buttonLink}" class="btn" style="background-color: ${buttonColor}; color: #fff;width: fit-content;">${buttonName}</a>
                </div>
            `;
                        carouselInner.appendChild(carouselItem);
                        validSliders++;
                    }
                });

                if (validSliders === 0) {
                    alert('Please fill in all the required fields for at least one slider to preview.');
                }
            }
        });
    </script>













    <script>
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });
    </script>
    <script>
        $(function() {
            $('.map-container').click(function(e) {
                $(this).find('iframe').css('pointer-events', 'all');
            }).mouseleave(function(e) {
                $(this).find('iframe').css('pointer-events', 'none');
            });
        })
        document.addEventListener('DOMContentLoaded', function() {
            const aboutItems = document.querySelectorAll('.about-item');
            const serviceItems = document.querySelectorAll('.service-item');
            const galleryItems = document.querySelectorAll('.gallery-header');
            const testimonialItems = document.querySelectorAll('.testimonial-item');
            const blogItems = document.querySelectorAll('.blog-selection');
            const contactItems = document.querySelectorAll('.contact-item');

            aboutItems.forEach(item => {
                item.addEventListener('click', function() {
                    aboutItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    aboutItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
            serviceItems.forEach(item => {
                item.addEventListener('click', function() {
                    serviceItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    serviceItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
            galleryItems.forEach(item => {
                item.addEventListener('click', function() {
                    galleryItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    galleryItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
            testimonialItems.forEach(item => {
                item.addEventListener('click', function() {
                    testimonialItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    testimonialItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
            blogItems.forEach(item => {
                item.addEventListener('click', function() {
                    blogItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    blogItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
            contactItems.forEach(item => {
                item.addEventListener('click', function() {
                    contactItems.forEach(itm => itm.classList.remove('selected'));
                    this.classList.add('selected');

                    contactItems.forEach(itm => {
                        const radioButton = itm.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = false;
                        }
                    });

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousels = document.querySelectorAll('.carousel');

            carousels.forEach(carousel => {
                const carouselItems = carousel.querySelectorAll('.carousel-item');

                carouselItems.forEach(item => {
                    item.addEventListener('click', function() {
                        carouselItems.forEach(itm => itm.classList.remove('selected'));

                        this.classList.add('selected');

                        const radioButton = this.querySelector('input[type="radio"]');
                        if (radioButton) {
                            radioButton.checked = true;
                        }
                    });
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const heroImages = document.querySelectorAll('.hero-image');

            heroImages.forEach(image => {
                image.addEventListener('click', function() {
                    heroImages.forEach(img => img.classList.remove('selected'));

                    this.classList.add('selected');

                    const radioButton = this.querySelector('input[type="radio"]');
                    if (radioButton) {
                        radioButton.checked = true;
                    }
                });
            });
        });
    </script>
    <script>
        let selectedSections = [];

        function toggleSelection(element) {
            const sectionId = element.getAttribute('data-id');
            const hiddenInput = document.getElementById(`hidden-input-${sectionId}`);

            element.classList.toggle('selected');

            if (element.classList.contains('selected')) {
                hiddenInput.checked = true;
                if (!selectedSections.includes(sectionId)) {
                    selectedSections.push(sectionId); // Add section ID to array
                }
            } else {
                hiddenInput.checked = false;
                selectedSections = selectedSections.filter(id => id !== sectionId); // Remove section ID from array
            }
            console.log("count: ", data.submenus.length);

        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.select-box').forEach((element) => {
                const sectionId = element.getAttribute('data-id');
                const hiddenInput = document.getElementById(`hidden-input-${sectionId}`);

                if (hiddenInput.checked) {
                    element.classList.add('selected');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.next-btn').on('click', function() {
                var menu = $('#menu').val();
                var submenu = $('#submenu').val();

                if (!menu) {
                    Toastify({
                        text: "Menu not selected",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f10606",
                        stopOnFocus: true,
                    }).showToast();
                    return false;
                }

                if (selectedSections.length === 0) {
                    Toastify({
                        text: "No sections selected",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#f10606",
                        stopOnFocus: true,
                    }).showToast();
                    return false;
                }
                $('#exampleModal').modal('show');
                if (selectedSections.includes('1')) {
                    $('.hero-image-or-slider').removeClass('d-none');
                    $('.form-check-input-hero').attr('required', true);
                } else {
                    $('.hero-image-or-slider').addClass('d-none');
                    $('.form-check-input-hero').attr('required', false);
                }
                if (selectedSections.includes('2')) {
                    $('.about-selection').removeClass('d-none');
                    $('.form-check-input-about').attr('required', true);
                } else {
                    $('.about-selection').addClass('d-none');
                    $('.form-check-input-about').attr('required', false);
                }
                if (selectedSections.includes('3')) {
                    $('.services-selection').removeClass('d-none');
                    $('.form-check-input-services').attr('required', true);
                } else {
                    $('.services-selection').addClass('d-none');
                    $('.form-check-input-services').attr('required', false);
                }
                if (selectedSections.includes('4')) {
                    $('.gallery-section').removeClass('d-none');
                    $('.form-check-input-gallery').attr('required', true);
                } else {
                    $('.gallery-section').addClass('d-none');
                    $('.form-check-input-gallery').attr('required', false);
                }
                if (selectedSections.includes('5')) {
                    $('.testimonial-section').removeClass('d-none');
                    $('.form-check-input-testimonial').attr('required', true);
                } else {
                    $('.testimonial-section').addClass('d-none');
                    $('.form-check-input-testimonial').attr('required', false);
                }
                if (selectedSections.includes('6')) {
                    $('.blog-layout-selection').removeClass('d-none');
                    $('.form-check-input-blog').attr('required', true);
                } else {
                    $('.blog-layout-selection').addClass('d-none');
                    $('.form-check-input-blog').attr('required', false);
                }
                if (selectedSections.includes('7')) {
                    $('.contact-selection').removeClass('d-none');
                    $('.form-check-input-contact').attr('required', true);
                } else {
                    $('.contact-selection').addClass('d-none');
                    $('.form-check-input-contact').attr('required', false);
                }
                $('.selectedValues').val(selectedSections.join(','));
                $('.pageMenu').val($('#menu').val());
                $('.pageSubMenu').val($('#submenu').val());
                console.log("Selected sections:", selectedSections);
            });
            // $('#exampleModal').modal('show');
            $('#menu').on('change', function() {
                var menuId = $(this).val();
                if (menuId) {
                    $.ajax({
                        url: '/get-submenus/' + menuId, // URL for the AJAX request
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (Array.isArray(data.submenus)) {
                                if (data.submenus.length > 0) {
                                    $('.submenu').removeClass('d-none');
                                    var $submenu = $('#submenu');
                                    $submenu.empty();
                                    $submenu.append('<option value="">Select Submenu</option>');
                                    $.each(data.submenus, function(index, submenu) {
                                        $submenu.append('<option value="' + submenu.id + '">' + submenu.name + '</option>');
                                    });
                                } else {
                                    $('#section-selection').removeClass('d-none');
                                    console.log("there is no sub menus");
                                    $('.submenu').addClass('d-none');
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                        }
                    });
                } else {
                    $('#submenu').empty().append('<option value="">Select Submenu</option>');
                }
            });
            $('#submenu').on('change', function() {
                $('#section-selection').removeClass('d-none');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.bx-edit').on('click', function() {
                const id = $(this).data('id');
                const menu = $(this).data('menu');
                const sortOrder = $(this).data('sort');

                // Set the form action with the correct menu ID
                $('#editForm').attr('action', `/menu/${id}`); // Use template literals to set the action URL

                // Populate the form fields with data
                $('#menuId').val(id);
                $('#editMenuName').val(menu);
                $('#editSortOrder').val(sortOrder);
            });

            // Handle form submission
            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                // Serialize form data
                const formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'), // Use the form action URL
                    type: 'PUT', // Change to 'PUT' if updating a resource
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
                    },
                    success: function(response) {
                        // Show success message
                        Toastify({
                            text: response.message || "Menu updated successfully.", // Use response message
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#28a745",
                            stopOnFocus: true,
                        }).showToast();

                        $('#editModal').modal('hide'); // Hide the modal
                        location.reload(); // Optionally reload the page to see changes
                    },
                    error: function(xhr) {
                        // Handle error
                        const response = xhr.responseJSON;
                        console.error(response);

                        Toastify({
                            text: response.message || "An error occurred. Please try again.", // Use response message
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#f10606",
                            stopOnFocus: true,
                        }).showToast();
                    }
                });
            });
            $('.bx-trash').on('click', function() {
                const id = $(this).data('id');
                const $row = $(this).closest('tr');
                console.log(id);

                if (confirm('Are you sure you want to delete this menu? this also delete the all under subcategory!')) {
                    $.ajax({
                        url: "{{route('menu.destroy',['menu' => ':id'])}}".replace(':id',id),  
                        type: 'DELETE',
                        data:{
                            id: id,
                            _token: '{{csrf_token()}}'
                        },
                        success: function(response) {
                            // Remove the row from the table on successful delete
                            $row.remove();

                            Toastify({
                                text: response.message || "Item deleted successfully.",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#28a745", // Change to green for success
                                stopOnFocus: true,
                            }).showToast(); // Display success message
                        },
                        error: function(xhr, status, error) {
                            // Extract and log the detailed error information
                            console.log('Error Details:', {
                                status: xhr.status,
                                statusText: xhr.statusText,
                                responseText: xhr.responseText,
                                error: error
                            });

                            // Display a more detailed error message to the user
                            let errorMessage = 'An error occurred while trying to delete the item.';

                            // Check if there is a response text
                            if (xhr.responseText) {
                                try {
                                    // Try to parse the response text as JSON
                                    const response = JSON.parse(xhr.responseText);
                                    errorMessage = response.message || errorMessage;
                                } catch (e) {
                                    // If parsing fails, use the raw response text
                                    errorMessage = xhr.responseText || errorMessage;
                                }
                            }

                            Toastify({
                                text: errorMessage || "An error occurred. Please try again.",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#f10606", // Red for error
                                stopOnFocus: true,
                            }).showToast();
                        }
                    });
                }
            });
        });
    </script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        Toastify({
            text: "{{ $error }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#f10606",
            stopOnFocus: true,
        }).showToast();
    </script>
    @endforeach
    @endif
    @if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#28a745",
            stopOnFocus: true,
        }).showToast();
    </script>
    @endif
    @endsection