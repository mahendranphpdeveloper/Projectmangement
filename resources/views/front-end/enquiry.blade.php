<!doctype html>
<html lang="en">

<head>
    <title>Enquiry Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!-- Include Toastify CSS -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Include Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>
<style>
.heading-section {
    font-size: 2rem;
    color: #717375;
    font-weight: 600;
    margin-top: 20px;
}
.required-asterisk {
    color: red; /* Red color for the asterisk */
    font-weight: bold; /* Optional: Make it bold for better visibility */
}
/* Image Styling */
.heading-section img {
    max-width: 20%; /* Ensure the image scales properly */
    height: auto; /* Maintain aspect ratio */
    margin-bottom: 15px; /* Space between the image and the text */
    border-radius: 8px; /* Optional: add rounded corners to the image */
}
/* Container for the Form Group */
.form-group {
    margin-bottom: 20px;
}

/* Label Styling */
.label {
    font-size: 1rem;
    font-weight: 600;
    color: #343a40;
    margin-bottom: 8px;
    display: block;
}

/* Dropdown Styling */
.form-control {
    display: block;
    width: 100%;
    padding: 10px 12px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 4px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Hover and Focus States */
.form-control:hover, 
.form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Dropdown Option Styling */
.form-control option {
    padding: 10px;
    background-color: #fff;
    color: #495057;
}

/* Error Message Styling */
.text-danger {
    font-size: 0.875rem;
    color: #dc3545;
    margin-top: 5px;
    display: block;
}

/* Additional Styling for Mobile */
@media (max-width: 768px) {
    .form-control {
        font-size: 0.875rem;
        padding: 8px 10px;
    }
}
.btn.btn-primary, a.btn.btn-info {
    background: #357e31 !important;
    border-color: #357e31 !important;
    color: #fff;
}
</style>
@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "#4CAF50",
            }).showToast();
        });
    </script>
@endif

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">
                        <img src="{{ asset('images/logo-g.png') }}" alt="Enquiry Form Icon" width="100%">
                        Enquiry Form
                    </h2>
                </div>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="wrapper img"
                        style="background-image: url({{ asset('assets/frontend/images/img.jpg') }});">
                        <div class="row">
                            <div class="col-md-9 col-lg-7">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="mb-4">Get in touch with us</h3>
                                        <a type="button" class="btn btn-info" href="{{ route('client.index') }}">
                                            Client Details <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        </a>
                                                                            </div>
                                    <div id="form-message-warning" class="mb-4"></div>
                                    <div id="form-message-success" class="mb-4">
                                        Your message was sent, thank you!
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{{ route('contact.store') }}" id="contactForm"
                                        name="contactForm" class="contactForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">First Name<span class="required-asterisk">*</span></label>
                                                    <input type="text" class="form-control" name="name"
                                                        id="name" placeholder="First Name" value="{{ old('name') }}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="hidden" name="status" value="pending">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        id="last_name" placeholder="Last Name" value="{{ old('last_name') }}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="company_name">Company Name<span class="required-asterisk">*</span></label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        id="company_name" placeholder="Company Name"
                                                        value="{{ old('company_name') }}">
                                                    @if ($errors->has('company_name'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('company_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="phoneNumber">Phone Number<span class="required-asterisk">*</span></label>
                                                    <input type="tel" class="form-control" name="phone_number"
                                                        id="phone_number" placeholder="Phone Number"
                                                        value="{{ old('phoneNumber') }}">
                                                    @if ($errors->has('phone_number'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('phone_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="email">Mail Id<span class="required-asterisk">*</span></label>
                                                    <input type="email" class="form-control" name="email"
                                                        id="email" placeholder="Mail Id"
                                                        value="{{ old('email') }}">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="location">Location<span class="required-asterisk">*</span></label>
                                                    <input type="text" class="form-control" name="location"
                                                        id="location" placeholder="Location"
                                                        value="{{ old('location') }}">
                                                    @if ($errors->has('location'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('location') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="category">Select Category<span class="required-asterisk">*</span></label>
                                                    <select class="form-control" name="category" id="category">
                                                        <option value="">--Select Category--</option>
                                                        @if(@isset($category))
                                                          @foreach ($category as $name)
                                                            <option value="{{ $name->menu }}" class="">{{ $name->menu }}</option>  
                                                          @endforeach 
                                                        @else
                                                        <option value="school-colleges"
                                                        {{ old('category') == 'school-colleges' ? 'selected' : '' }}>
                                                        School/Colleges</option>
                                                        <option value="hospitals"
                                                            {{ old('category') == 'hospitals' ? 'selected' : '' }}>
                                                            Hospitals</option>
                                                        <option value="builders"
                                                            {{ old('category') == 'builders' ? 'selected' : '' }}>
                                                            Builders</option>
                                                        <option value="industries"
                                                        {{ old('category') == 'industries' ? 'selected' : '' }}>
                                                        Industries</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('category'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="category">Select service<span class="required-asterisk">*</span></label>
                                                    <select class="form-control" name="service" id="service">
                                                        <option value="">--Select service--</option>
                                                        @if(@isset($service))
                                                          @foreach ($service as $name)
                                                            <option value="{{ $name->service }}" class="">{{ $name->service }}</option>  
                                                          @endforeach 
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('category'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="content">Content Field<span class="required-asterisk">*</span></label>
                                                    <textarea name="content" class="form-control" id="content" cols="30" rows="4"
                                                        placeholder="Enter content here">{{ old('content') }}</textarea>
                                                    @if ($errors->has('content'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('content') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="Send Message"
                                                        class="btn btn-primary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
