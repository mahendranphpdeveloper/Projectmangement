    @extends('layout.adminPageControl')
    @section('content')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        /* Container for all sections */
        .sections-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        /* Individual select boxes */
        .select-box {
            width: auto;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
            background-color: #f9f9f9;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* On hover and selected state */
        .select-box:hover {
            border-color: #98c792;
        }

        .select-box.selected {
            border-color: #98c792;
            background-color: #a5cba0;
        }

        .select-tile {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        /* Text within the service tile */
        .service {
            font-size: 18px;
            color: #333;
            margin: 0;
            text-align: center;
        }

        .hero-section {
            /* display: flex; */
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
            background-color: #ffffff;
            padding: 20px 5px;
        }

        /* .slider-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 40vh;
            border-radius: 10px;
        } */
        .hero-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 40vh;
            border-radius: 10px;
        }

        .about-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 27vh;
            border-radius: 10px;
        }

        .service-images {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 27vh;
            border-radius: 10px;
        }

        .gallery-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 27vh;
            border-radius: 10px;
        }

        .testimonial-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 27vh;
            border-radius: 10px;
        }

        .blog-image {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 27vh;
            border-radius: 10px;
        }

        .hero-content {
            padding: 30px;
            text-align: left;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #343a40;
        }

        .hero-content .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
        }

        .placeholder-glow .placeholder {
            border-radius: 4px;
            background-color: #dee2e6;
        }

        @media (max-width: 991px) {
            .hero-section {
                flex-direction: column;
            }

            .hero-image {
                height: 300px;
                margin-bottom: 20px;
            }

            .hero-content {
                text-align: center;
            }
        }

        /* First Column: Default (left-aligned) */
        .hero-section .hero-image {
            text-align: left;
            /* Default alignment */
        }

        /* Second Column: Center-aligned */
        .hero-section .align-center {
            text-align: center;
        }

        /* Third Column: Right-aligned */
        .hero-section .align-right {
            text-align: right;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-section .align-center {
                text-align: center !important;
            }

            .hero-section .align-right {
                text-align: right !important;
            }
        }

        .hero-image.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-4.about-item {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
        }

        .col-lg-5.gallery-header {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
        }

        .col-lg-5.service-item {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
        }

        .col-lg-5.testimonial-item {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
            height: max-content;
        }

        .col-lg-5.blog-selection {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
            height: max-content;
        }

        .col-lg-5.contact-item {
            border: 2px solid #cccccc;
            border-radius: 10px;
            padding: 15px;
            height: max-content;
        }

        .col-lg-4.about-item.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-5.service-item.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-5.gallery-header.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-5.testimonial-item.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-5.blog-selection.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        .col-lg-5.contact-item.selected {
            border: 2px solid #007bff;
            background-color: #f0f8ff;
            box-shadow: rgb(127 143 221) 0px 3px 8px;
        }

        /* Hide the radio buttons */
        .form-check-input-hero,
        .form-check-input-about,
        .form-check-input-services,
        .form-check-input-gallery,
        .form-check-input-testimonial,
        .form-check-input-blog,
        .form-check-input-contact {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .hero-images {
            background: url('https://via.placeholder.com/800x600') no-repeat center center/cover;
            height: 39vh;
            border-radius: 10px;
            /* display: flex; */
            align-items: center;
            /* Center items vertically */
            justify-content: center;
            /* Center items horizontally */
            /* height: 100vh; */
            /* Full viewport height */
            background-color: #f8f9fa;
            /* Light background for better visibility */
        }

        .carousel-inner {
            display: flex;
        }

        .carousel-item .d-flex {
            text-align: center;
        }

        .carousel-control-prev,
        .carousel-control-next {
            /* width: 5%; */
            position: absolute;
        }
    </style>
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Page Layout</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="form-container d-flex justify-content-evenly">
                    <div class="form-group" style="display: flex; justify-content: center; margin-bottom: 15px; align-items: center; height: 10vh;">
                        <select name="menu" class="form-control" id="menu" style="width: 260px;">
                            <option value="">Select Menu</option>
                            @foreach($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->menu}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group submenu d-none" style="display: flex; justify-content: center; margin-bottom: 15px; align-items: center; height: 10vh;">
                        <select name="submenu" class="form-control" id="submenu" style="width: 260px;">
                            <option value="">Select Submenu</option>
                            <!-- Submenu options will be populated here -->
                        </select>
                    </div>
                </div>
                @php
                $choose_category = [];
                @endphp
                <section id="section-selection" class="d-none" style="padding: 30px 0px;">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Select Sections</h4>
                            </div>
                        </div>
                    </div>
                    <div class="sections-container">
                        <!-- Loop through the sections -->
                        @foreach($sections as $section)
                        <div class="select-box {{ in_array($section['id'], $choose_category) ? 'selected' : '' }}" data-id="{{ $section['id'] }}" onclick="toggleSelection(this)">
                            <span class="select-tile flex-flow radius-8">
                                <p class="service">{{ htmlspecialchars($section['sectionName']) }}</p>
                            </span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Hidden Input Fields -->
                    <form id="section-form">
                        @foreach($sections as $section)
                        <input type="hidden" name="plan_category[]" value="{{ $section['id'] }}"
                            id="hidden-input-{{ $section['id'] }}"
                            class="hidden-input"
                            {{ in_array($section['id'], $choose_category) ? 'checked' : '' }}>
                        @endforeach
                    </form>
                </section>
                <div class="container d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-success next-btn">Next</button>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="{{route('save.page')}}" method="POST">
                        @csrf
                      <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Layout choose</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <div class="hero-image-or-slider d-none">
                                    <h4>Hero Section Layout</h4>
                                    <section class="hero-section container layout-left">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <!-- First Column: Default (Left-aligned) -->
                                            <div class="col-lg-3 hero-image d-flex flex-column justify-content-center">
                                                <input class="form-check-input-hero" type="radio" name="hero" id="layout-left" value="1">
                                                <h1 class="card-title placeholder-glow">
                                                    <span class="placeholder col-8"></span>
                                                </h1>
                                                <p class="card-text placeholder-glow">
                                                    <span class="placeholder col-12"></span>
                                                    <span class="placeholder col-10"></span>
                                                    <span class="placeholder col-8"></span>
                                                    <span class="placeholder col-6"></span>
                                                </p>
                                                <div class="text-start">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <!-- Second Column: Center-aligned -->
                                            <div class="col-lg-3 hero-image d-flex flex-column justify-content-center align-center">
                                                <input class="form-check-input-hero" type="radio" name="hero" id="layout-center" value="2">
                                                <h1 class="card-title placeholder-glow text-center">
                                                    <span class="placeholder col-8"></span>
                                                </h1>
                                                <p class="card-text placeholder-glow text-center">
                                                    <span class="placeholder col-12"></span>
                                                    <span class="placeholder col-10"></span>
                                                    <span class="placeholder col-8"></span>
                                                    <span class="placeholder col-6"></span>
                                                </p>
                                                <div class="text-center">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <!-- Third Column: Right-aligned -->
                                            <div class="col-lg-3 hero-image d-flex flex-column justify-content-center align-right">
                                                <input class="form-check-input-hero" type="radio" name="hero" id="layout-right" value="3">
                                                <h1 class="card-title placeholder-glow text-end">
                                                    <span class="placeholder col-8"></span>
                                                </h1>
                                                <p class="card-text placeholder-glow text-end">
                                                    <span class="placeholder col-12"></span>
                                                    <span class="placeholder col-10"></span>
                                                    <span class="placeholder col-8"></span>
                                                    <span class="placeholder col-6"></span>
                                                </p>
                                                <div class="text-end">
                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section class="container">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div id="carouselExampleIndicators1" class="col-lg-3 hero-image carousel slide" data-ride="carousel">
                                                <input class="form-check-input-hero" type="radio" name="hero" id="layout-slider-left" value="4">
                                                <div class="carousel-inner">
                                                    <!-- First Carousel Item -->
                                                    <div class="carousel-item hero-images active" data-value="left">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-start">
                                                            <h1 class="card-title placeholder-glow text-start">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-start">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-start">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Second Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="left">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-start">
                                                            <h1 class="card-title placeholder-glow text-start">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-start">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-start">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Third Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="left">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-start">
                                                            <h1 class="card-title placeholder-glow text-start">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-start">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-start">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Carousel Controls -->
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="col-1"></div>
                                            <div id="carouselExampleIndicators2" class="col-lg-3 hero-image carousel slide" data-ride="carousel">
                                            <input class="form-check-input-hero" type="radio" name="hero" id="layout-slider-left" value="5">   
                                            <div class="carousel-inner">
                                                    <!-- First Carousel Item -->
                                                    <div class="carousel-item hero-images active" data-value="center">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-center">
                                                            <h1 class="card-title placeholder-glow text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Second Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="center">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-center">
                                                            <h1 class="card-title placeholder-glow text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Third Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="center">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-center">
                                                            <h1 class="card-title placeholder-glow text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Carousel Controls -->
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="col-1"></div>
                                            <div id="carouselExampleIndicators3" class="col-lg-3 hero-image carousel slide" data-ride="carousel">
                                            <input class="form-check-input-hero" type="radio" name="hero" id="layout-slider-left" value="6">   
                                            <div class="carousel-inner">
                                                    <!-- First Carousel Item -->
                                                    <div class="carousel-item hero-images active" data-value="right">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-end">
                                                            <h1 class="card-title placeholder-glow text-end">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-end">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-end">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Second Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="right">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-end">
                                                            <h1 class="card-title placeholder-glow text-end">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-end">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-end">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Third Carousel Item -->
                                                    <div class="carousel-item hero-images" data-value="right">
                                                        <div class="d-flex flex-column justify-content-center h-100 p-4 text-end">
                                                            <h1 class="card-title placeholder-glow text-end">
                                                                <span class="placeholder col-8"></span>
                                                            </h1>
                                                            <p class="card-text placeholder-glow text-end">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-6"></span>
                                                            </p>
                                                            <div class="text-end">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Carousel Controls -->
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="about-selection d-none mt-3">
                                    <h4>About Section Layout</h4>
                                    <div class="row d-flex justify-content-evenly mt-3">
                                        <!-- First Column: Image on the right -->
                                        <div class="col-lg-4 about-item">
                                            <input class="form-check-input-about" type="radio" name="about" id="layout-about-left-image" value="1">
                                            <section class="about-section layout-left">
                                                <div class="row align-items-center">
                                                    <!-- Image on the right -->
                                                    <div class="col-6">
                                                        <div class="about-image">
                                                            <!-- <img src="path/to/image.jpg" alt="Image" class="img-fluid"> -->
                                                        </div>
                                                    </div>
                                                    <!-- Title and content on the left -->
                                                    <div class="col-6 d-flex flex-column justify-content-center">
                                                        <h1 class="card-title placeholder-glow text-start">
                                                            <span class="placeholder col-8"></span>
                                                        </h1>
                                                        <p class="card-text placeholder-glow text-start">
                                                            <span class="placeholder col-12"></span>
                                                            <span class="placeholder col-10"></span>
                                                            <span class="placeholder col-8"></span>
                                                            <span class="placeholder col-6"></span>
                                                        </p>
                                                        <div class="text-start">
                                                            <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <!-- Second Column: Layout example -->
                                        <div class="col-lg-4 about-item">
                                            <input class="form-check-input-about" type="radio" name="about" id="layout-about-right-image" value="2">
                                            <section class="about-section layout-right">
                                                <div class="row align-items-center">
                                                    <!-- Title and content on the left -->
                                                    <div class="col-6 d-flex flex-column justify-content-center">
                                                        <h1 class="card-title placeholder-glow text-start">
                                                            <span class="placeholder col-8"></span>
                                                        </h1>
                                                        <p class="card-text placeholder-glow text-start">
                                                            <span class="placeholder col-12"></span>
                                                            <span class="placeholder col-10"></span>
                                                            <span class="placeholder col-8"></span>
                                                            <span class="placeholder col-6"></span>
                                                        </p>
                                                        <div class="text-start">
                                                            <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                        </div>
                                                    </div>
                                                    <!-- Image on the right -->
                                                    <div class="col-6">
                                                        <div class="about-image">
                                                            <!-- <img src="path/to/image.jpg" alt="Image" class="img-fluid"> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                </div>

                                <div class="services-selection d-none mt-3">
                                    <h4>Services Section Layout</h4>
                                    <div class="row d-flex justify-content-evenly mt-3">

                                        <div class="col-lg-5 service-item">
                                            <input class="form-check-input-services" type="radio" name="service" id="layout-services-image-top" value="1">

                                            <div class="row g-3">
                                                <!-- Card 1 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-image text-center mt-3">
                                                            <div class="service-images">
                                                                <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 2 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-image text-center mt-3">
                                                            <div class="service-images">
                                                                <!-- <img src="path/to/icon2.png" alt="Image" class="img-fluid"> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 3 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-image text-center mt-3">
                                                            <div class="service-images">
                                                                <!-- <img src="path/to/icon3.png" alt="Image" class="img-fluid"> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                            </p>
                                                            <div class="text-center">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 service-item">
                                            <input class="form-check-input-services" type="radio" name="service" id="layout-services-icon-top" value="2">

                                            <div class="row g-3">
                                                <!-- Card 1 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-icon text-center mt-3">
                                                            <div class="icon">
                                                                <!-- Example icon using Font Awesome or any icon library -->
                                                                <i class="fa fa-cog fa-5x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center p-3">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                            </p>
                                                            <div class="text-center p-2">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 2 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-icon text-center mt-3">
                                                            <div class="icon">
                                                                <!-- Example icon using Font Awesome or any icon library -->
                                                                <i class="fa fa-rocket fa-5x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center p-3">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                            </p>
                                                            <div class="text-center p-2">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card 3 -->
                                                <div class="col-md-4">
                                                    <div class="card mb-3 d-flex flex-column">
                                                        <div class="service-icon text-center mt-3">
                                                            <div class="icon">
                                                                <!-- Example icon using Font Awesome or any icon library -->
                                                                <i class="fa fa-lightbulb fa-5x"></i>
                                                            </div>
                                                        </div>
                                                        <div class="card-body mt-auto">
                                                            <h5 class="card-title text-center p-3">
                                                                <span class="placeholder col-8"></span>
                                                            </h5>
                                                            <p class="card-text text-center">
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                                <span class="placeholder col-8"></span>
                                                                <span class="placeholder col-12"></span>
                                                                <span class="placeholder col-10"></span>
                                                            </p>
                                                            <div class="text-center p-2">
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-5 service-item mt-3">
                                            <input class="form-check-input-services" type="radio" name="service" id="layout-services-image-top" value="3">

                                            <div class="row g-3">
                                                <!-- Card 1 -->
                                                <div class="col-md-12">
                                                    <div class="card mb-3 d-flex flex-row">
                                                        <div class="col-4">
                                                            <div class="service-image text-center mt-3">
                                                                <div class="service-images">
                                                                    <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">

                                                            <div class="card-body mt-auto">
                                                                <h5 class="card-title">
                                                                    <span class="placeholder col-8"></span>
                                                                </h5>
                                                                <p class="card-text">
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-10"></span>
                                                                    <span class="placeholder col-8"></span>
                                                                </p>
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4"></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <!-- Card 2 -->
                                                <div class="col-md-12">
                                                    <div class="card mb-3 d-flex flex-row">
                                                        <div class="col-8">

                                                            <div class="card-body mt-auto">
                                                                <h5 class="card-title">
                                                                    <span class="placeholder col-8"></span>
                                                                </h5>
                                                                <p class="card-text">
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-10"></span>
                                                                    <span class="placeholder col-8"></span>
                                                                </p>
                                                                <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="service-image text-center mt-3">
                                                                <div class="service-images">
                                                                    <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-5 service-item mt-3">
                                            <input class="form-check-input-services" type="radio" name="service" id="layout-services-image-top" value="4">

                                            <div class="row g-3">
                                                <!-- Row containing two cards -->
                                                <div class="col-md-12 d-flex">
                                                    <!-- Card 1 -->
                                                    <div class="col-6">
                                                        <div class="card mb-3 d-flex flex-row">
                                                            <div class="col-6">
                                                                <div class="service-image text-center mt-3">
                                                                    <div class="service-images">
                                                                        <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card-body mt-auto">
                                                                    <h5 class="card-title">
                                                                        <span class="placeholder col-8"></span>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <span class="placeholder col-12"></span>
                                                                        <span class="placeholder col-10"></span>
                                                                        <span class="placeholder col-8"></span>
                                                                    </p>
                                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Card 2 -->
                                                    <div class="col-6">
                                                        <div class="card mb-3 d-flex flex-row">
                                                            <div class="col-6">
                                                                <div class="service-image text-center mt-3">
                                                                    <div class="service-images">
                                                                        <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card-body mt-auto">
                                                                    <h5 class="card-title">
                                                                        <span class="placeholder col-8"></span>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <span class="placeholder col-12"></span>
                                                                        <span class="placeholder col-10"></span>
                                                                        <span class="placeholder col-8"></span>
                                                                    </p>
                                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 d-flex">
                                                    <!-- Card 1 -->
                                                    <div class="col-6">
                                                        <div class="card mb-3 d-flex flex-row">
                                                            <div class="col-6">
                                                                <div class="service-image text-center mt-3">
                                                                    <div class="service-images">
                                                                        <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card-body mt-auto">
                                                                    <h5 class="card-title">
                                                                        <span class="placeholder col-8"></span>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <span class="placeholder col-12"></span>
                                                                        <span class="placeholder col-10"></span>
                                                                        <span class="placeholder col-8"></span>
                                                                    </p>
                                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- Card 2 -->
                                                    <div class="col-6">
                                                        <div class="card mb-3 d-flex flex-row">
                                                            <div class="col-6">
                                                                <div class="service-image text-center mt-3">
                                                                    <div class="service-images">
                                                                        <!-- <img src="path/to/icon1.png" alt="Image" class="img-fluid"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="card-body mt-auto">
                                                                    <h5 class="card-title">
                                                                        <span class="placeholder col-8"></span>
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        <span class="placeholder col-12"></span>
                                                                        <span class="placeholder col-10"></span>
                                                                        <span class="placeholder col-8"></span>
                                                                    </p>
                                                                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="gallery-section d-none mt-3">
                                    <h4>Gallery Section</h4>
                                    <div class="row d-flex justify-content-evenly mt-3">
                                        <!-- First Column: Image on the right -->
                                        <div class="col-lg-5 gallery-header">
                                            <input class="form-check-input-gallery" type="radio" name="gallery" id="layout-services-image-top" value="1">
                                            <div class="row gallery-grid">
                                                <!-- Gallery Item 1 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image1.jpg" alt="Image 1" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 2 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image2.jpg" alt="Image 2" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 3 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image3.jpg" alt="Image 3" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 4 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image4.jpg" alt="Image 4" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 5 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image5.jpg" alt="Image 5" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 6 -->
                                                <div class="col-lg-4 col-md-6 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image6.jpg" alt="Image 6" class="img-fluid"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 gallery-header">
                                            <input class="form-check-input-gallery" type="radio" name="gallery" id="layout-services-image-top" value="2">
                                            <div class="row gallery-grid">
                                                <!-- Gallery Item 1 (Larger) -->
                                                <div class="col-lg-6 col-md-12 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image1.jpg" alt="Image 1" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 2 -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image2.jpg" alt="Image 2" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 3 -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image3.jpg" alt="Image 3" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 5 -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image5.jpg" alt="Image 5" class="img-fluid"> -->
                                                    </div>
                                                </div>

                                                <!-- Gallery Item 6 -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image6.jpg" alt="Image 6" class="img-fluid"> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 mt-1 gallery-item">
                                                    <div class="gallery-image">
                                                        <!-- <img src="path/to/image4.jpg" alt="Image 4" class="img-fluid"> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="testimonial-section d-none mt-3">
                                    <h4>Testimonial Layout</h4>
                                    <div class="row d-flex justify-content-evenly mt-3">
                                        <!-- First Testimonial: Image on the left -->
                                        <div class="col-lg-5 testimonial-item">
                                            <input class="form-check-input-testimonial" type="radio" name="testimonial" id="layout-services-image-left" value="1">
                                            <div id="testimonialCarouselLeft" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <!-- First Testimonial -->
                                                    <div class="carousel-item active">
                                                        <div class="card border-0 shadow">
                                                            <div class="row g-0 align-items-center">
                                                                <div class="testimonial-image col-md-3 text-center m-3">
                                                                    <!-- <img src="path/to/image1.jpg" class="img-fluid rounded-circle" alt="Client 1"> -->
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title placeholder-glow text-start">
                                                                            <span class="placeholder col-8"></span>
                                                                        </h5>
                                                                        <p class="card-text placeholder-glow text-start">
                                                                            <span class="placeholder col-12"></span>
                                                                            <span class="placeholder col-10"></span>
                                                                            <span class="placeholder col-8"></span>
                                                                        </p>
                                                                        <p class="card-text"><small class="placeholder col-5"></small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Additional Testimonial Items -->
                                                </div>

                                                <!-- Carousel Controls -->
                                                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselLeft" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselLeft" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Second Testimonial: Image centered above text -->
                                        <div class="col-lg-5 testimonial-item">
                                            <input class="form-check-input-testimonial" type="radio" name="testimonial" id="layout-services-image-center" value="2">
                                            <div id="testimonialCarouselRight" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <!-- First Testimonial -->
                                                    <div class="carousel-item active">
                                                        <div class="card border-0 shadow">
                                                            <div class="row g-0 align-items-center">
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title placeholder-glow text-center">
                                                                            <span class="placeholder col-8"></span>
                                                                        </h5>
                                                                        <p class="card-text placeholder-glow text-center">
                                                                            <span class="placeholder col-12"></span>
                                                                            <span class="placeholder col-10"></span>
                                                                            <span class="placeholder col-8"></span>
                                                                        </p>
                                                                        <p class="card-text text-center"><small class="placeholder col-5"></small></p>
                                                                    </div>
                                                                </div>
                                                                <div class="testimonial-image col-md-3 text-center m-3">
                                                                    <!-- <img src="path/to/image1.jpg" class="img-fluid rounded-circle" alt="Client 1"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Additional Testimonial Items -->
                                                </div>

                                                <!-- Carousel Controls -->
                                                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarouselRight" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarouselRight" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Third Testimonial: Image on the right -->
                                        <div class="col-lg-5 testimonial-item mt-3">
                                            <input class="form-check-input-testimonial" type="radio" name="testimonial" id="layout-services-image-right" value="3">
                                            <!-- Carousel wrapper -->
                                            <div id="carouselExampleControls" data-mdb-carousel-init class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="placeholder-glow mb-4">
                                                            <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-lg-8">
                                                                <h5 class="mb-3">
                                                                    <span class="placeholder col-6"></span>
                                                                </h5>
                                                                <p>
                                                                    <span class="placeholder col-4"></span>
                                                                </p>
                                                                <p class="text-muted">
                                                                    <i class="fas fa-quote-left pe-2"></i>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-8"></span>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-4"></span>
                                                                    <span class="placeholder col-2"></span>
                                                                    <span class="placeholder col-6"></span>
                                                                    <span class="placeholder col-10"></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="placeholder-glow mb-4">
                                                            <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-lg-8">
                                                                <h5 class="mb-3">
                                                                    <span class="placeholder col-6"></span>
                                                                </h5>
                                                                <p>
                                                                    <span class="placeholder col-4"></span>
                                                                </p>
                                                                <p class="text-muted">
                                                                    <i class="fas fa-quote-left pe-2"></i>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-8"></span>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-4"></span>
                                                                    <span class="placeholder col-2"></span>
                                                                    <span class="placeholder col-6"></span>
                                                                    <span class="placeholder col-10"></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="carousel-item">
                                                        <div class="placeholder-glow mb-4">
                                                            <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-lg-8">
                                                                <h5 class="mb-3">
                                                                    <span class="placeholder col-6"></span>
                                                                </h5>
                                                                <p>
                                                                    <span class="placeholder col-4"></span>
                                                                </p>
                                                                <p class="text-muted">
                                                                    <i class="fas fa-quote-left pe-2"></i>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-8"></span>
                                                                    <span class="placeholder col-12"></span>
                                                                    <span class="placeholder col-4"></span>
                                                                    <span class="placeholder col-2"></span>
                                                                    <span class="placeholder col-6"></span>
                                                                    <span class="placeholder col-10"></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <button data-mdb-button-init class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                                                    <span class="carousel-control-prev-icon text-body" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button data-mdb-button-init class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                                                    <span class="carousel-control-next-icon text-body" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                            <!-- Carousel wrapper -->

                                        </div>

                                        <!-- Fourth Testimonial: Text above image -->
                                        <div class="col-lg-5 testimonial-item mt-3">
                                            <input class="form-check-input-testimonial" type="radio" name="testimonial" id="layout-services-text-above" value="4">
                                            <!-- Carousel wrapper -->
                                            <div id="testimonialCarouselThird" class="carousel slide carousel-dark text-center" data-bs-ride="carousel">
                                                <!-- Controls -->
                                                <div class="d-flex justify-content-center mb-4">
                                                    <button class="carousel-control-prev position-relative" type="button" data-bs-target="#testimonialCarouselThird" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next position-relative" type="button" data-bs-target="#testimonialCarouselThird" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                <!-- Inner -->
                                                <div class="carousel-inner py-4">
                                                    <!-- Single item -->
                                                    <div class="carousel-item active">
                                                        <div class="container">
                                                            <div class="row">
                                                                <!-- Testimonial 1 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 2 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-2">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 3 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Single item -->
                                                    <div class="carousel-item">
                                                        <div class="container">
                                                            <div class="row">
                                                                <!-- Testimonial 1 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 2 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 3 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Single item -->
                                                    <div class="carousel-item">
                                                        <div class="container">
                                                            <div class="row">
                                                                <!-- Testimonial 1 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 2 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>

                                                                <!-- Testimonial 3 -->
                                                                <div class="col-lg-4">
                                                                    <div class="placeholder-glow mb-3">
                                                                        <span class="placeholder rounded-circle bg-secondary" style="width: 150px; height: 150px;"></span>
                                                                    </div>
                                                                    <h5 class="mb-3">
                                                                        <span class="placeholder col-6"></span>
                                                                    </h5>
                                                                    <p>
                                                                        <span class="placeholder col-4"></span>
                                                                    </p>
                                                                    <p class="text-muted">
                                                                        <i class="fas fa-quote-left pe-2"></i>
                                                                        <span class="placeholder col-12"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Inner -->
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="blog-layout-selection d-none mt-3">
                                    <h4 class="text-start">Blog Section Layout</h4>
                                    <div class="row d-flex justify-content-center mt-4">
                                        <div class="col-lg-5 blog-selection me-3">
                                            <input class="form-check-input-blog" type="radio" name="blog" id="layout-blog-top-image" value="1">
                                            <section class="blog-section layout-top shadow-sm rounded overflow-hidden bg-light">
                                                <div class="blog-image text-center">
                                                    <!-- Image at the top -->
                                                    <!-- <img src="path/to/image.jpg" alt="Blog Image" class="img-fluid w-100"> -->
                                                </div>
                                                <!-- Title and content below the image -->
                                                <div class="blog-content-container p-4">
                                                    <h2 class="blog-title placeholder-glow text-center mb-2">
                                                        <span class="placeholder col-8"></span>
                                                    </h2>
                                                    <p class="blog-content placeholder-glow text-start">
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                    </p>
                                                    <div class="text-center mt-3">
                                                        <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6">Read More</a>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-lg-5 blog-selection ms-3">
                                            <input class="form-check-input-blog" type="radio" name="blog" id="layout-blog-side-image" value="2">
                                            <section class="blog-section d-flex flex-column flex-lg-row shadow-sm rounded overflow-hidden bg-white">
                                                <!-- Image on the side -->
                                                <div class="blog-image col-lg-4 col-12 d-flex flex-column flex-lg-shrink-0">
                                                    <!-- <img src="path/to/image.jpg" alt="Blog Image" class="img-fluid h-100 w-100" style="object-fit: cover;"> -->
                                                </div>
                                                <!-- Title and content next to the image -->
                                                <div class="blog-content-container col-lg-8 col-12 p-4">
                                                    <h2 class="blog-title placeholder-glow text-start mb-3">
                                                        <span class="placeholder col-8"></span>
                                                    </h2>
                                                    <p class="blog-content placeholder-glow text-start">
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-2"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-3"></span>
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                        <span class="placeholder col-12"></span>
                                                    </p>
                                                </div>
                                                <!-- Additional content below the image and title/content section -->
                                                <div class="col-12 p-4">
                                                    <p class="blog-content placeholder-glow text-start">
                                                        <span class="placeholder col-12"></span>
                                                        <span class="placeholder col-10"></span>
                                                        <span class="placeholder col-8"></span>
                                                        <span class="placeholder col-6"></span>
                                                    </p>
                                                    <div class="text-start mt-3">
                                                        <a href="#" tabindex="-1" class="btn btn-secondary disabled placeholder col-6">Read More</a>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                    </div>
                                </div>

                                <div class="contact-selection d-none mt-3">
                                    <h4>Contact Section Layout</h4>
                                    <div class="row d-flex justify-content-evenly mt-3">
                                        <!-- First Column: Form on the right -->
                                        <div class="col-lg-5 contact-item">
                                            <input class="form-check-input-contact" type="radio" name="contact" id="layout-contact-left-form" value="1">
                                            <section class="contact-section layout-left">
                                                <div class="row align-items-center">
                                                    <!-- Form on the right -->
                                                    <div class="col-6">
                                                        <div class="contact-form">
                                                            <!-- Replace with actual contact form -->
                                                            <form>
                                                                <h3 class="form-title placeholder-glow">
                                                                    <span class="placeholder col-8"></span>
                                                                </h3>
                                                                <div class="form-group mb-3">
                                                                    <label for="name" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="text" id="name" class="form-control placeholder-glow" placeholder="Name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="email" id="email" class="form-control placeholder-glow" placeholder="Email">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="message" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <textarea id="message" class="form-control placeholder-glow" rows="4" placeholder="Message"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary disabled placeholder col-6"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Contact Information on the left -->
                                                    <div class="col-6 d-flex flex-column justify-content-center">
                                                        <h1 class="contact-title placeholder-glow text-start mb-3">
                                                            <span class="placeholder col-8"></span>
                                                        </h1>
                                                        <p class="contact-info placeholder-glow text-start">
                                                            <span class="placeholder col-12"></span>
                                                            <span class="placeholder col-10"></span>
                                                            <span class="placeholder col-8"></span>
                                                            <span class="placeholder col-6"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <!-- Second Column: Form on the left -->
                                        <div class="col-lg-5 contact-item">
                                            <input class="form-check-input-contact" type="radio" name="contact" id="layout-contact-right-form" value="2">
                                            <section class="contact-section layout-right">
                                                <div class="row align-items-center">
                                                    <!-- Contact Information on the right -->
                                                    <div class="col-6 d-flex flex-column justify-content-center">
                                                        <h1 class="contact-title placeholder-glow text-start mb-3">
                                                            <span class="placeholder col-8"></span>
                                                        </h1>
                                                        <p class="contact-info placeholder-glow text-start">
                                                            <span class="placeholder col-12"></span>
                                                            <span class="placeholder col-10"></span>
                                                            <span class="placeholder col-8"></span>
                                                            <span class="placeholder col-6"></span>
                                                        </p>
                                                    </div>
                                                    <!-- Form on the left -->
                                                    <div class="col-6">
                                                        <div class="contact-form">
                                                            <!-- Replace with actual contact form -->
                                                            <form>
                                                                <h3 class="form-title placeholder-glow">
                                                                    <span class="placeholder col-8"></span>
                                                                </h3>
                                                                <div class="form-group mb-3">
                                                                    <label for="name" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="text" id="name" class="form-control placeholder-glow" placeholder="Name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="email" id="email" class="form-control placeholder-glow" placeholder="Email">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="message" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <textarea id="message" class="form-control placeholder-glow" rows="4" placeholder="Message"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary disabled placeholder col-6"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <div class="col-lg-5 contact-item mt-3">
                                            <input class="form-check-input-contact" type="radio" name="contact" id="layout-contact-left-form" value="3">
                                            <section class="contact-section layout-left">
                                                <div class="row align-items-center">
                                                    <!-- Form on the Right -->
                                                    <div class="col-md-6">
                                                        <div class="contact-form">
                                                            <!-- Replace with actual contact form -->
                                                            <form>
                                                                <h3 class="form-title placeholder-glow">
                                                                    <span class="placeholder col-8"></span>
                                                                </h3>
                                                                <div class="form-group mb-3">
                                                                    <label for="name" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="text" id="name" class="form-control placeholder-glow" placeholder="Name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="email" id="email" class="form-control placeholder-glow" placeholder="Email">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="message" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <textarea id="message" class="form-control placeholder-glow" rows="4" placeholder="Message"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary disabled placeholder col-6"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Map on the Left -->
                                                    <div class="col-md-6">
                                                        <div class="map-container">
                                                            <!-- Replace with actual map iframe -->
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d501180.12146212946!2d76.79179669726564!3d11.07832889507226!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1723527977136!5m2!1sen!2sin" width="100%" height="400" style="border:0;position: unset !important;" allowfullscreen="" loading="lazy"></iframe>

                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>

                                        <!-- Second Column: Form on the left -->
                                        <div class="col-lg-5 contact-item mt-3">
                                            <input class="form-check-input-contact" type="radio" name="contact" id="layout-contact-right-form" value="4">
                                            <section class="contact-section layout-right">
                                                <div class="row align-items-center">
                                                    <!-- Map on the Right -->
                                                    <div class="col-md-6">
                                                        <div class="map-container">
                                                            <!-- Replace with actual map iframe -->
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d379435.60588347645!2d80.14801704501519!3d13.082680546060232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526e8c1eced373%3A0x1e4c5d95d17b9c4b!2sChennai%2C%20Tamil%20Nadu%2C%20India!5e0!3m2!1sen!2sin!4v1634008289825!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                                                        </div>
                                                    </div>
                                                    <!-- Form on the Left -->
                                                    <div class="col-md-6">
                                                        <div class="contact-form">
                                                            <!-- Replace with actual contact form -->
                                                            <form>
                                                                <h3 class="form-title placeholder-glow">
                                                                    <span class="placeholder col-8"></span>
                                                                </h3>
                                                                <div class="form-group mb-3">
                                                                    <label for="name" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="text" id="name" class="form-control placeholder-glow" placeholder="Name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="email" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <input type="email" id="email" class="form-control placeholder-glow" placeholder="Email">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="message" class="placeholder-glow">
                                                                        <span class="placeholder col-6"></span>
                                                                    </label>
                                                                    <textarea id="message" class="form-control placeholder-glow" rows="4" placeholder="Message"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary disabled placeholder col-6"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="selectedValues" name="selected[]" value="">
                                <input type="hidden" class="pageMenu" name="pageMenu" value="">
                                <input type="hidden" class="pageSubMenu" name="pageSubMenu" value="">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- END layout-wrapper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    @endsection