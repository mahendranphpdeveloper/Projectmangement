@extends('layout.adminPageControl')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/boxicons/css/boxicons.min.css">
<style>
    .dropdown {
        position: relative;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .dropdown-content div {
        padding: 8px 16px;
        cursor: pointer;
    }

    .dropdown-button {
        background-color: #ffffff;
        color: #2a3042;
        padding: 10px;
        font-size: 13px !important;
        border: none;
        padding: 3px 7px !important;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100% !important;
    }

    .dropdown-button i {
        margin-left: 5px;
    }

    .dropdown-content div:hover {
        background-color: #f1f1f1;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-button {
        background-color: #ffffff;
        color: #2a3042;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 425px;
    }

    .dropdown-button i {
        margin-left: 10px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100%;
        overflow: auto;
        height: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content div {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .dropdown-content div:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .dropdown-content i {
        margin-right: 10px;
    }

    .row.sections {
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        padding: 10px 10px;
        background: #d8def3;
    }
</style>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <form id="sliderForm" method="POST" action="{{ route('home.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="row sections mb-3">
                    <div class="col-12">
                        <h4 class="mb-4">Manage Sliders</h4>
                        <div id="sliderContainer">
                            <!-- Slider Template -->
                            <div class="slider-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <h5>Slider 1</h5>
                                    <button type="button" class="btn btn-danger remove-slider"><i class='bx bx-x'></i></button>
                                </div>
                                <div class="form-group">
                                    <!-- File Preview -->
                                    <ul class="list-unstyled mb-0" id="dropzone-preview-1">
                                        <!-- This will be populated by JavaScript if needed -->
                                    </ul>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3">
                                            <input type="file" name="file[]" class="form-control-file" accept="image/*">
                                        </div>

                                    </div>
                                </div>

                                <!-- Input fields on the same line -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="title">Title 1:</label>
                                            <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="title">Title 2:</label>
                                            <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="titleColor">Title Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="titleColor[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="button">Button Text:</label>
                                            <input type="text" class="form-control form-control-sm" name="button[]" placeholder="Enter button text">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="buttonLink">Button Link:</label>
                                            <input type="text" class="form-control form-control-sm" name="buttonLink[]" placeholder="Enter button link">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="buttonColor">Button Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="buttonColor[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">

                                            <label for="button">Slider Category Title:</label>
                                            <input type="text" class="form-control form-control-sm" name="button[]" placeholder="Enter button text">

                                            <label>Category Icon:</label>
                                            <div class="form-group">
                                                <div class="dropdown">
                                                    <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                                                    <div class="dropdown-content">
                                                        <div data-value="bx bx-home"><i class="bx bx-home"></i> Home</div>
                                                        <div data-value="bx bx-user"><i class="bx bx-user"></i> User</div>
                                                        <div data-value="bx bx-cog"><i class="bx bx-cog"></i> Settings</div>
                                                        <div data-value="bx bx-envelope"><i class="bx bx-envelope"></i> Envelope</div>
                                                        <div data-value="bx bx-phone"><i class="bx bx-phone"></i> Phone</div>
                                                        <div data-value="bx bx-calendar"><i class="bx bx-calendar"></i> Calendar</div>
                                                        <div data-value="bx bx-bell"><i class="bx bx-bell"></i> Bell</div>
                                                        <div data-value="bx bx-briefcase"><i class="bx bx-briefcase"></i> Briefcase</div>
                                                        <div data-value="bx bx-cart"><i class="bx bx-cart"></i> Cart</div>
                                                        <div data-value="bx bx-map"><i class="bx bx-map"></i> Map</div>
                                                        <div data-value="bx bx-credit-card"><i class="bx bx-credit-card"></i> Credit Card</div>
                                                        <div data-value="bx bxs-truck"><i class="bx bxs-truck"></i> Truck</div>
                                                        <div data-value="bx bx-lock"><i class="bx bx-lock"></i> Lock</div>
                                                        <div data-value="bx bx-wrench"><i class="bx bx-wrench"></i> Wrench</div>
                                                        <div data-value="bx bx-cloud-upload"><i class="bx bx-cloud-upload"></i> Upload</div>
                                                        <div data-value="bx bx-cloud-download"><i class="bx bx-cloud-download"></i> Download</div>
                                                        <div data-value="bx bx-user-check"><i class="bx bx-user-check"></i> User Check</div>
                                                        <div data-value="bx bx-calendar-check"><i class="bx bx-calendar-check"></i> Calendar Check</div>
                                                        <div data-value="bx bx-help-circle"><i class="bx bx-help-circle"></i> Help</div>
                                                        <div data-value="bx bx-chat"><i class="bx bx-chat"></i> Chat</div>
                                                        <div data-value="bx bx-download"><i class="bx bx-download"></i> Download</div>
                                                        <div data-value="bx bx-key"><i class="bx bx-key"></i> Key</div>
                                                        <div data-value="bx bx-shield"><i class="bx bx-shield"></i> Shield</div>
                                                        <div data-value="bx bx-camera"><i class="bx bx-camera"></i> Camera</div>
                                                        <div data-value="bx bx-microphone"><i class="bx bx-microphone"></i> Microphone</div>
                                                        <div data-value="bx bx-laptop"><i class="bx bx-laptop"></i> Laptop</div>
                                                        <div data-value="bx bx-printer"><i class="bx bx-printer"></i> Printer</div>
                                                        <div data-value="bx bx-globe"><i class="bx bx-globe"></i> Globe</div>
                                                        <div data-value="bx bx-heart"><i class="bx bx-heart"></i> Heart</div>
                                                        <div data-value="bx bx-bulb"><i class="bx bx-bulb"></i> Lightbulb</div>
                                                        <div data-value="bx bx-headphone"><i class="bx bx-headphone"></i> Headphone</div>
                                                        <div data-value="bx bx-coffee"><i class="bx bx-coffee"></i> Coffee</div>
                                                        <div data-value="bx bx-shopping-bag"><i class="bx bx-shopping-bag"></i> Shopping Bag</div>
                                                        <div data-value="bx bx-rocket"><i class="bx bx-rocket"></i> Rocket</div>
                                                        <div data-value="bx bx-sun"><i class="bx bx-sun"></i> Sun</div>
                                                        <div data-value="bx bx-moon"><i class="bx bx-moon"></i> Moon</div>
                                                        <div data-value="bx bx-bug"><i class="bx bx-bug"></i> Bug</div>
                                                        <div data-value="bx bx-image"><i class="bx bx-image"></i> Image</div>
                                                        <div data-value="bx bxs-flame"><i class="bx bxs-flame"></i> Flame</div>
                                                        <div data-value="bx bx-trophy"><i class="bx bx-trophy"></i> Trophy</div>
                                                        <div data-value="bx bx-anchor"><i class="bx bx-anchor"></i> Anchor</div>
                                                        <div data-value="bx bxs-plane"><i class="bx bxs-plane"></i> Plane</div>
                                                        <div data-value="bx bx-football"><i class="bx bx-football"></i> Football</div>
                                                        <div data-value="bx bx-hotel"><i class="bx bx-hotel"></i> Hotel</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="content">Content:</label>
                                            <textarea class="form-control" name="content[]" rows="3" placeholder="Enter content"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="textColor">Text Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="textColor[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button to add more sliders -->
                        <button id="addSliderBtn" class="btn btn-primary">Add Slider</button>

                    </div> <!-- container-fluid -->
                </div>
                <div class="row sections mb-3">
                    <div class="col-12">
                        <h4>Service We Provide Section</h4>
                        <div id="serviceContainer">
                            <!-- Initial Service Template -->
                            <div class="service-group mb-4">
                                <div class="d-flex justify-content-between">
                                    <h5>Service 1</h5>
                                    <button type="button" class="btn btn-danger remove-service"><i class='bx bx-x'></i></button>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceTitle">Title:</label>
                                            <input type="text" class="form-control form-control-sm" name="serviceTitle[]" placeholder="Enter title">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <p for="serviceIcon">Select an Icon:</p>
                                            <div class="dropdown">
                                                <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                                                <div class="dropdown-content">
                                                    <div data-value="bx bx-home"><i class="bx bx-home"></i> Home</div>
                                                    <div data-value="bx bx-user"><i class="bx bx-user"></i> User</div>
                                                    <div data-value="bx bx-cog"><i class="bx bx-cog"></i> Settings</div>
                                                    <div data-value="bx bx-envelope"><i class="bx bx-envelope"></i> Envelope</div>
                                                    <div data-value="bx bx-phone"><i class="bx bx-phone"></i> Phone</div>
                                                    <div data-value="bx bx-calendar"><i class="bx bx-calendar"></i> Calendar</div>
                                                    <div data-value="bx bx-bell"><i class="bx bx-bell"></i> Bell</div>
                                                    <div data-value="bx bx-briefcase"><i class="bx bx-briefcase"></i> Briefcase</div>
                                                    <div data-value="bx bx-cart"><i class="bx bx-cart"></i> Cart</div>
                                                    <div data-value="bx bx-map"><i class="bx bx-map"></i> Map</div>
                                                    <div data-value="bx bx-credit-card"><i class="bx bx-credit-card"></i> Credit Card</div>
                                                    <div data-value="bx bxs-truck"><i class="bx bxs-truck"></i> Truck</div>
                                                    <div data-value="bx bx-lock"><i class="bx bx-lock"></i> Lock</div>
                                                    <div data-value="bx bx-wrench"><i class="bx bx-wrench"></i> Wrench</div>
                                                    <div data-value="bx bx-cloud-upload"><i class="bx bx-cloud-upload"></i> Upload</div>
                                                    <div data-value="bx bx-cloud-download"><i class="bx bx-cloud-download"></i> Download</div>
                                                    <div data-value="bx bx-user-check"><i class="bx bx-user-check"></i> User Check</div>
                                                    <div data-value="bx bx-calendar-check"><i class="bx bx-calendar-check"></i> Calendar Check</div>
                                                    <div data-value="bx bx-help-circle"><i class="bx bx-help-circle"></i> Help</div>
                                                    <div data-value="bx bx-chat"><i class="bx bx-chat"></i> Chat</div>
                                                    <div data-value="bx bx-download"><i class="bx bx-download"></i> Download</div>
                                                    <div data-value="bx bx-key"><i class="bx bx-key"></i> Key</div>
                                                    <div data-value="bx bx-shield"><i class="bx bx-shield"></i> Shield</div>
                                                    <div data-value="bx bx-camera"><i class="bx bx-camera"></i> Camera</div>
                                                    <div data-value="bx bx-microphone"><i class="bx bx-microphone"></i> Microphone</div>
                                                    <div data-value="bx bx-laptop"><i class="bx bx-laptop"></i> Laptop</div>
                                                    <div data-value="bx bx-printer"><i class="bx bx-printer"></i> Printer</div>
                                                    <div data-value="bx bx-globe"><i class="bx bx-globe"></i> Globe</div>
                                                    <div data-value="bx bx-heart"><i class="bx bx-heart"></i> Heart</div>
                                                    <div data-value="bx bx-bulb"><i class="bx bx-bulb"></i> Lightbulb</div>
                                                    <div data-value="bx bx-headphone"><i class="bx bx-headphone"></i> Headphone</div>
                                                    <div data-value="bx bx-coffee"><i class="bx bx-coffee"></i> Coffee</div>
                                                    <div data-value="bx bx-shopping-bag"><i class="bx bx-shopping-bag"></i> Shopping Bag</div>
                                                    <div data-value="bx bx-rocket"><i class="bx bx-rocket"></i> Rocket</div>
                                                    <div data-value="bx bx-sun"><i class="bx bx-sun"></i> Sun</div>
                                                    <div data-value="bx bx-moon"><i class="bx bx-moon"></i> Moon</div>
                                                    <div data-value="bx bx-bug"><i class="bx bx-bug"></i> Bug</div>
                                                    <div data-value="bx bx-image"><i class="bx bx-image"></i> Image</div>
                                                    <div data-value="bx bxs-flame"><i class="bx bxs-flame"></i> Flame</div>
                                                    <div data-value="bx bx-trophy"><i class="bx bx-trophy"></i> Trophy</div>
                                                    <div data-value="bx bx-anchor"><i class="bx bx-anchor"></i> Anchor</div>
                                                    <div data-value="bx bxs-plane"><i class="bx bxs-plane"></i> Plane</div>
                                                    <div data-value="bx bx-football"><i class="bx bx-football"></i> Football</div>
                                                    <div data-value="bx bx-hotel"><i class="bx bx-hotel"></i> Hotel</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="titleColor">Title Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="titleColor[]">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceContent">Content:</label>
                                            <textarea class="form-control" name="serviceContent[]" rows="3" placeholder="Enter content"></textarea>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceImage">Image:</label>
                                            <input type="file" name="serviceImage[]" class="form-control-file" accept="image/*">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="buttonColor">Content Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="buttonColor[]">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="buttonText">Button Text:</label>
                                            <input type="text" class="form-control form-control-sm" name="buttonText[]" placeholder="Enter button text">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="buttonLink">Button Link:</label>
                                            <input type="text" class="form-control form-control-sm" name="buttonLink[]" placeholder="Enter button link">
                                        </div>


                                        <div class="col-md-2 mb-3">
                                            <label for="textColor">Text Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="textColor[]">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <button id="addServiceBtn" class="btn btn-primary">Add Service</button>

                    </div>
                </div>
                <div class="row sections mb-3">
                    <div class="col-12">
                        <h4>Who We Are Section</h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="titleColor">Title Color:</label>
                                    <input type="color" class="form-control form-control-sm" name="titleColor[]">
                                </div>
                                <!-- New Tagify Input Field -->
                                <div class="col-md-5 mb-3">
                                    <label for="tags">Services List:</label>
                                    <input type="text" class="form-control form-control-sm" name="tags[]" placeholder="Enter tags" id="tagifyInput">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="serviceContent">Content:</label>
                                    <textarea class="form-control" name="serviceContent[]" rows="3" placeholder="Enter content"></textarea>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="buttonColor">Content Color:</label>
                                    <input type="color" class="form-control form-control-sm" name="buttonColor[]">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="buttonText">Button Text:</label>
                                    <input type="text" class="form-control form-control-sm" name="buttonText[]" placeholder="Enter button text">
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="buttonLink">Button Link:</label>
                                    <input type="text" class="form-control form-control-sm" name="buttonLink[]" placeholder="Enter button link">
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="textColor">Text Color:</label>
                                    <input type="color" class="form-control form-control-sm" name="textColor[]">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row sections mb-3">
    <div class="col-12">
        <h4>Why Choose Us Section</h4>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="title">Title 1:</label>
                    <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                </div>
                <div class="col-md-5 mb-3">
                    <label for="title">Title 2:</label>
                    <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="titleColor">Title Color:</label>
                    <input type="color" class="form-control form-control-sm" name="titleColor[]">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mb-3">
                <label for="serviceContent">Content:</label>
                <textarea class="form-control" name="serviceContent[]" rows="3" placeholder="Enter content"></textarea>
            </div>
            <div class="col-md-2 mb-3">
                <label for="buttonColor">Content Color:</label>
                <input type="color" class="form-control form-control-sm" name="buttonColor[]">
            </div>
        </div>
        <div class="form-group">
            <div class="row justify-content-evenly">
                <div class="col-md-3 mb-3">
                    <p for="serviceIcon">Select an Icon:</p>
                    <div class="dropdown">
                        <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                        <div class="dropdown-content">
                            <!-- Icons content -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <p for="serviceIcon">Select an Icon:</p>
                    <div class="dropdown">
                        <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                        <div class="dropdown-content">
                            <!-- Icons content -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <p for="serviceIcon">Select an Icon:</p>
                    <div class="dropdown">
                        <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                        <div class="dropdown-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                <div class="d-flex justify-content-center m-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Initialize Tagify on the input element
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Tagify on the input element
        var input = document.querySelector('#tagifyInput');
        new Tagify(input);
    });


    document.addEventListener('DOMContentLoaded', function() {
        // Event delegation for dropdowns
        document.addEventListener('click', function(event) {
            const target = event.target;

            // Handle dropdown toggle
            if (target.classList.contains('dropdown-button')) {
                const dropdownContent = target.nextElementSibling;
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            } else {
                // Close dropdown if clicked outside
                const dropdowns = document.querySelectorAll('.dropdown-content');
                dropdowns.forEach(dropdown => {
                    if (!dropdown.contains(target) && !target.classList.contains('dropdown-button')) {
                        dropdown.style.display = 'none';
                    }
                });
            }
        });

        // Handle icon selection
        document.addEventListener('click', function(event) {
            const selectedItem = event.target.closest('div[data-value]');
            if (selectedItem) {
                const iconName = selectedItem.textContent.trim();
                const iconClass = selectedItem.dataset.value;
                const dropdownButton = selectedItem.closest('.dropdown-content').previousElementSibling;

                dropdownButton.innerHTML = `${iconName} <i class="${iconClass}"></i>`;
                selectedItem.closest('.dropdown-content').style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let serviceCount = 1;

        // Function to create a new service group
        function createServiceGroup(count) {
            return `
            <div class="service-group mb-4">
            <div class="d-flex justify-content-between">
            <h5>Service ${count}</h5>
                <button type="button" class="btn btn-danger remove-service"><i class='bx bx-x'></i></button>
                </div>
                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceTitle">Title:</label>
                                            <input type="text" class="form-control form-control-sm" name="serviceTitle[]" placeholder="Enter title">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <p for="serviceIcon">Select an Icon:</p>
                                            <div class="dropdown">
                                                <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                                                <div class="dropdown-content">
                                                        <div data-value="bx bx-home"><i class="bx bx-home"></i> Home</div>
                                                        <div data-value="bx bx-user"><i class="bx bx-user"></i> User</div>
                                                        <div data-value="bx bx-cog"><i class="bx bx-cog"></i> Settings</div>
                                                        <div data-value="bx bx-envelope"><i class="bx bx-envelope"></i> Envelope</div>
                                                        <div data-value="bx bx-phone"><i class="bx bx-phone"></i> Phone</div>
                                                        <div data-value="bx bx-calendar"><i class="bx bx-calendar"></i> Calendar</div>
                                                        <div data-value="bx bx-bell"><i class="bx bx-bell"></i> Bell</div>
                                                        <div data-value="bx bx-briefcase"><i class="bx bx-briefcase"></i> Briefcase</div>
                                                        <div data-value="bx bx-cart"><i class="bx bx-cart"></i> Cart</div>
                                                        <div data-value="bx bx-map"><i class="bx bx-map"></i> Map</div>
                                                        <div data-value="bx bx-credit-card"><i class="bx bx-credit-card"></i> Credit Card</div>
                                                        <div data-value="bx bxs-truck"><i class="bx bxs-truck"></i> Truck</div>
                                                        <div data-value="bx bx-lock"><i class="bx bx-lock"></i> Lock</div>
                                                        <div data-value="bx bx-wrench"><i class="bx bx-wrench"></i> Wrench</div>
                                                        <div data-value="bx bx-cloud-upload"><i class="bx bx-cloud-upload"></i> Upload</div>
                                                        <div data-value="bx bx-cloud-download"><i class="bx bx-cloud-download"></i> Download</div>
                                                        <div data-value="bx bx-user-check"><i class="bx bx-user-check"></i> User Check</div>
                                                        <div data-value="bx bx-calendar-check"><i class="bx bx-calendar-check"></i> Calendar Check</div>
                                                        <div data-value="bx bx-help-circle"><i class="bx bx-help-circle"></i> Help</div>
                                                        <div data-value="bx bx-chat"><i class="bx bx-chat"></i> Chat</div>
                                                        <div data-value="bx bx-download"><i class="bx bx-download"></i> Download</div>
                                                        <div data-value="bx bx-key"><i class="bx bx-key"></i> Key</div>
                                                        <div data-value="bx bx-shield"><i class="bx bx-shield"></i> Shield</div>
                                                        <div data-value="bx bx-camera"><i class="bx bx-camera"></i> Camera</div>
                                                        <div data-value="bx bx-microphone"><i class="bx bx-microphone"></i> Microphone</div>
                                                        <div data-value="bx bx-laptop"><i class="bx bx-laptop"></i> Laptop</div>
                                                        <div data-value="bx bx-printer"><i class="bx bx-printer"></i> Printer</div>
                                                        <div data-value="bx bx-globe"><i class="bx bx-globe"></i> Globe</div>
                                                        <div data-value="bx bx-heart"><i class="bx bx-heart"></i> Heart</div>
                                                        <div data-value="bx bx-bulb"><i class="bx bx-bulb"></i> Lightbulb</div>
                                                        <div data-value="bx bx-headphone"><i class="bx bx-headphone"></i> Headphone</div>
                                                        <div data-value="bx bx-coffee"><i class="bx bx-coffee"></i> Coffee</div>
                                                        <div data-value="bx bx-shopping-bag"><i class="bx bx-shopping-bag"></i> Shopping Bag</div>
                                                        <div data-value="bx bx-rocket"><i class="bx bx-rocket"></i> Rocket</div>
                                                        <div data-value="bx bx-sun"><i class="bx bx-sun"></i> Sun</div>
                                                        <div data-value="bx bx-moon"><i class="bx bx-moon"></i> Moon</div>
                                                        <div data-value="bx bx-bug"><i class="bx bx-bug"></i> Bug</div>
                                                        <div data-value="bx bx-image"><i class="bx bx-image"></i> Image</div>
                                                        <div data-value="bx bxs-flame"><i class="bx bxs-flame"></i> Flame</div>
                                                        <div data-value="bx bx-trophy"><i class="bx bx-trophy"></i> Trophy</div>
                                                        <div data-value="bx bx-anchor"><i class="bx bx-anchor"></i> Anchor</div>
                                                        <div data-value="bx bxs-plane"><i class="bx bxs-plane"></i> Plane</div>
                                                        <div data-value="bx bx-football"><i class="bx bx-football"></i> Football</div>
                                                        <div data-value="bx bx-hotel"><i class="bx bx-hotel"></i> Hotel</div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="titleColor">Title Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="titleColor[]">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceContent">Content:</label>
                                            <textarea class="form-control" name="serviceContent[]" rows="3" placeholder="Enter content"></textarea>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="serviceImage">Image:</label>
                                            <input type="file" name="serviceImage[]" class="form-control-file" accept="image/*">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="buttonColor">Button Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="buttonColor[]">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="buttonText">Button Text:</label>
                                            <input type="text" class="form-control form-control-sm" name="buttonText[]" placeholder="Enter button text">
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="buttonLink">Button Link:</label>
                                            <input type="text" class="form-control form-control-sm" name="buttonLink[]" placeholder="Enter button link">
                                        </div>


                                        <div class="col-md-2 mb-3">
                                            <label for="textColor">Text Color:</label>
                                            <input type="color" class="form-control form-control-sm" name="textColor[]">
                                        </div>
                                    </div>


                                </div>
            </div>
        `;
        }

        document.body.addEventListener('click', function(event) {
            if (event.target.matches('#addServiceBtn')) {
                event.preventDefault();
                serviceCount++;
                const serviceContainer = document.getElementById('serviceContainer');
                serviceContainer.insertAdjacentHTML('beforeend', createServiceGroup(serviceCount));
            }
        });

        // Event delegation for removing a service
        document.body.addEventListener('click', function(event) {
            if (event.target.matches('.remove-service')) {
                event.preventDefault();
                event.target.closest('.service-group').remove();
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to toggle dropdown visibility
        function toggleDropdown(event) {
            const dropdownButton = event.currentTarget;
            const dropdownContent = dropdownButton.nextElementSibling;

            // Toggle the display of the dropdown content
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        }

        // Function to handle dropdown item selection
        function selectDropdownItem(event) {
            const selectedItem = event.target.closest('div[data-value]');
            if (selectedItem) {
                const dropdownButton = selectedItem.closest('.dropdown').querySelector('.dropdown-button');
                dropdownButton.innerHTML = `Select an icon <i class="${selectedItem.dataset.value}"></i>`;
                selectedItem.parentElement.style.display = 'none';
            }
        }

        // Event delegation for dropdown toggle
        document.body.addEventListener('click', function(event) {
            const target = event.target;

            if (target.matches('.dropdown-button')) {
                toggleDropdown(event);
            } else if (!target.closest('.dropdown-content') && !target.closest('.dropdown-button')) {
                document.querySelectorAll('.dropdown-content').forEach(function(content) {
                    content.style.display = 'none';
                });
            } else if (target.matches('.dropdown-content div[data-value]')) {
                selectDropdownItem(event);
            }
        });

        // Event delegation for dynamic sliders
        document.body.addEventListener('click', function(event) {
            if (event.target.matches('#addSliderBtn')) {
                event.preventDefault();
                const sliderCount = document.querySelectorAll('.slider-group').length + 1;
                const sliderGroup = `
                        <div class="slider-group mb-4">
                         <div class="d-flex justify-content-between">
                            <h5>Slider ${sliderCount}</h5>
                             <button type="button" class="btn btn-danger remove-slider"><i class='bx bx-x'></i></button>
                             </div>
                            <div class="form-group">
                                <!-- File Preview -->
                                <ul class="list-unstyled mb-0" id="dropzone-preview-${sliderCount}">
                                    <!-- This will be populated by JavaScript if needed -->
                                </ul>
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="slider-image mb-4">
                                        <input type="file" name="file[]" class="form-control-file" accept="image/*">
                                    </div>
                                   
                                </div>
                            </div>

                            <!-- Input fields on the same line -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="title">Title 1:</label>
                                        <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="title">Title 2:</label>
                                        <input type="text" class="form-control form-control-sm" name="title[]" placeholder="Enter title">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="titleColor">Title Color:</label>
                                        <input type="color" class="form-control form-control-sm" name="titleColor[]">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="button">Button Text:</label>
                                        <input type="text" class="form-control form-control-sm" name="button[]" placeholder="Enter button text">
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="buttonLink">Button Link:</label>
                                        <input type="text" class="form-control form-control-sm" name="buttonLink[]" placeholder="Enter button link">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="buttonColor">Button Color:</label>
                                        <input type="color" class="form-control form-control-sm" name="buttonColor[]">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="button">Slider Category Title:</label>
                                        <input type="text" class="form-control form-control-sm" name="button[]" placeholder="Enter button text">
                                        <label>Category Icon:</label>
                                        <div class="form-group">
                                            <div class="dropdown">
                                                <button type="button" class="dropdown-button">Select an icon <i class="bx bx-home"></i></button>
                                                 <div class="dropdown-content">
                                                        <div data-value="bx bx-home"><i class="bx bx-home"></i> Home</div>
                                                        <div data-value="bx bx-user"><i class="bx bx-user"></i> User</div>
                                                        <div data-value="bx bx-cog"><i class="bx bx-cog"></i> Settings</div>
                                                        <div data-value="bx bx-envelope"><i class="bx bx-envelope"></i> Envelope</div>
                                                        <div data-value="bx bx-phone"><i class="bx bx-phone"></i> Phone</div>
                                                        <div data-value="bx bx-calendar"><i class="bx bx-calendar"></i> Calendar</div>
                                                        <div data-value="bx bx-bell"><i class="bx bx-bell"></i> Bell</div>
                                                        <div data-value="bx bx-briefcase"><i class="bx bx-briefcase"></i> Briefcase</div>
                                                        <div data-value="bx bx-cart"><i class="bx bx-cart"></i> Cart</div>
                                                        <div data-value="bx bx-map"><i class="bx bx-map"></i> Map</div>
                                                        <div data-value="bx bx-credit-card"><i class="bx bx-credit-card"></i> Credit Card</div>
                                                        <div data-value="bx bxs-truck"><i class="bx bxs-truck"></i> Truck</div>
                                                        <div data-value="bx bx-lock"><i class="bx bx-lock"></i> Lock</div>
                                                        <div data-value="bx bx-wrench"><i class="bx bx-wrench"></i> Wrench</div>
                                                        <div data-value="bx bx-cloud-upload"><i class="bx bx-cloud-upload"></i> Upload</div>
                                                        <div data-value="bx bx-cloud-download"><i class="bx bx-cloud-download"></i> Download</div>
                                                        <div data-value="bx bx-user-check"><i class="bx bx-user-check"></i> User Check</div>
                                                        <div data-value="bx bx-calendar-check"><i class="bx bx-calendar-check"></i> Calendar Check</div>
                                                        <div data-value="bx bx-help-circle"><i class="bx bx-help-circle"></i> Help</div>
                                                        <div data-value="bx bx-chat"><i class="bx bx-chat"></i> Chat</div>
                                                        <div data-value="bx bx-download"><i class="bx bx-download"></i> Download</div>
                                                        <div data-value="bx bx-key"><i class="bx bx-key"></i> Key</div>
                                                        <div data-value="bx bx-shield"><i class="bx bx-shield"></i> Shield</div>
                                                        <div data-value="bx bx-camera"><i class="bx bx-camera"></i> Camera</div>
                                                        <div data-value="bx bx-microphone"><i class="bx bx-microphone"></i> Microphone</div>
                                                        <div data-value="bx bx-laptop"><i class="bx bx-laptop"></i> Laptop</div>
                                                        <div data-value="bx bx-printer"><i class="bx bx-printer"></i> Printer</div>
                                                        <div data-value="bx bx-globe"><i class="bx bx-globe"></i> Globe</div>
                                                        <div data-value="bx bx-heart"><i class="bx bx-heart"></i> Heart</div>
                                                        <div data-value="bx bx-bulb"><i class="bx bx-bulb"></i> Lightbulb</div>
                                                        <div data-value="bx bx-headphone"><i class="bx bx-headphone"></i> Headphone</div>
                                                        <div data-value="bx bx-coffee"><i class="bx bx-coffee"></i> Coffee</div>
                                                        <div data-value="bx bx-shopping-bag"><i class="bx bx-shopping-bag"></i> Shopping Bag</div>
                                                        <div data-value="bx bx-rocket"><i class="bx bx-rocket"></i> Rocket</div>
                                                        <div data-value="bx bx-sun"><i class="bx bx-sun"></i> Sun</div>
                                                        <div data-value="bx bx-moon"><i class="bx bx-moon"></i> Moon</div>
                                                        <div data-value="bx bx-bug"><i class="bx bx-bug"></i> Bug</div>
                                                        <div data-value="bx bx-image"><i class="bx bx-image"></i> Image</div>
                                                        <div data-value="bx bxs-flame"><i class="bx bxs-flame"></i> Flame</div>
                                                        <div data-value="bx bx-trophy"><i class="bx bx-trophy"></i> Trophy</div>
                                                        <div data-value="bx bx-anchor"><i class="bx bx-anchor"></i> Anchor</div>
                                                        <div data-value="bx bxs-plane"><i class="bx bxs-plane"></i> Plane</div>
                                                        <div data-value="bx bx-football"><i class="bx bx-football"></i> Football</div>
                                                        <div data-value="bx bx-hotel"><i class="bx bx-hotel"></i> Hotel</div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="content">Content:</label>
                                        <textarea class="form-control" name="content[]" rows="3" placeholder="Enter content"></textarea>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="textColor">Text Color:</label>
                                        <input type="color" class="form-control form-control-sm" name="textColor[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                // Append the new slider group to the container
                $('#sliderContainer').append(sliderGroup);
            }
        });

        // Event delegation for dynamic remove buttons
        document.body.addEventListener('click', function(event) {
            if (event.target.matches('.remove-slider')) {
                event.preventDefault();
                event.target.closest('.slider-group').remove();
            }
        });
    });
</script>
@endsection