@extends('layout.adminPageControl')
@section('content')
    @php
        $user = Illuminate\Support\Facades\Auth::user();
    @endphp

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #editTextField2 {
            position: absolute;
            display: none;
            /* Start hidden */
            border: 1px solid #ccc;
            /* Optional: add border */
            padding: 2px;
            /* Optional: add padding */
            background-color: white;
            /* Optional: set a background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Optional: add a subtle shadow */
            z-index: 1000;
            /* Ensure the input field is above other elements */
            border-radius: 4px;
            /* Optional: rounded corners */
            outline: none;
            /* Remove outline when focused */
        }

        .flatpickr-input[readonly] {
            cursor: pointer;
            width: 25%;
        }

        .full-screen {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border: 2px solid transparent;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        .full-screen img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
        }

        .selected {
            border: 2px solid #007BFF;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
        }

        .ree-header.sticky .dskt-logo {
            float: left;
            line-height: 70px
        }

        .footer-a {
            background: #30303c;
        }

        html .pt40 {
            padding-top: 40px;
        }

        .footer-deg2 h6 {
            padding: 30px 0 20px;
            color: #adb7c5;
        }

        .footer-links-list li a {
            font-size: 12px;
            line-height: 34px;
            color: #adb7c5;
        }

        ul {
            list-style: none;
        }

        .ft-abt p,
        .ft-copyright p,
        .ft-copyright p a {
            font-size: 12px;
            line-height: 27px;
            color: #adb7c5;
        }

        .ree-header.sticky {
            background: rgb(255 255 255/60%);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px)
        }

        .ree-header.sticky {
            height: 70px
        }

        .ree-header.sticky .ree-btn,
        .ree-header.sticky .ree-btn-grdt1 {
            box-shadow: none
        }

        .sticky .nav-list li a.menu-links {
            line-height: 70px !important
        }

        .ree-header {
            padding: 0 20px;
            height: 85px;
            z-index: 99;
            border-bottom: 1px solid rgba(255, 255, 255, .1)
        }

        .menu-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%
        }

        .dskt-logo {
            float: left;
            line-height: 85px
        }

        .dskt-logo .nav-brand img {
            max-height: 50px
        }

        .ree-nav .nav-list li a.menu-links {
            font-size: 12px;
            color: #08182b;
            font-weight: 500;
            padding: 0 15px;
            line-height: 85px;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            text-transform: capitalize;
        }

        .ree-nav .nav-list li {
            display: inline-flex
        }

        .owl-carousel .owl-item img {
            display: block;
            max-width: 100%;
            width: inherit;
            text-align: center;
            margin: 0 auto
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 0rem;
            padding-left: 7px !important;
        }

        .ree-header {
            padding: 0 20px;
            height: 85px;
            z-index: 99;
            background: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, .1);
            display: flex;
            align-content: center;
            align-items: center;
        }

        .ree-nav .dropdown-menu {
            border: 0;
            border-top: 2px solid #ff5b2e;
            -webkit-box-shadow: 0 10px 15px 0 rgb(82 0 57/10%);
            box-shadow: 0 10px 15px 0 rgb(82 0 57/10%)
        }

        .ree-nav .dropdown-item {
            display: block;
            width: 100%;
            padding: 15px;
            clear: both;
            font-weight: 400;
            color: #110a32;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            font-size: 17px
        }

        .megamenu:hover>a {
            color: #ff5b2e !important
        }


        .mega-small {
            position: relative
        }

        .mega-small .menu-block-set {
            display: inline-table;
            border: 0;
            border-top: 2px solid #ff5b2e;
            -webkit-box-shadow: 0 10px 15px 0 rgb(82 0 57/10%);
            box-shadow: 0 10px 15px 0 rgb(82 0 57/10%);
            padding: 10px 0;
            border-radius: 0 0 14px 14px
        }

        .ree-nav>ul.nav-list>li:hover .menu-dropdown {
            opacity: 1;
            top: 85px;
            pointer-events: auto
        }

        .menu-dropdown {
            height: auto;
            left: 0;
            opacity: 0;
            pointer-events: none;
            top: 115px;
            z-index: 99;
            position: absolute;
            width: 100%;
            -webkit-transition: .4s ease all;
            -moz-box-transition: .4s ease all;
            -o-transition: .4s ease all;
            transition: .4s ease all
        }

        .menu-block-set {
            box-shadow: 0 10px 20px 0 rgb(0 0 0/4%);
            border-top: 2px solid #f3f3f3;
            width: 100%;
            padding: 40px 0;
            display: inline-block;
            background-color: #fff;
            margin-top: 4px
        }

        .menu-dropdown p {
            font-size: 17px;
            line-height: 27px
        }

        .menu-block-a {
            display: grid;
            grid-template-columns: 20% auto;
            grid-gap: 30px
        }

        .menu-headings {
            position: relative;
            color: #ff5b2e;
            margin-bottom: 15px;
            font-size: 17px;
            line-height: 25px;
            font-weight: 500
        }

        .menu-headings:after {
            content: '';
            display: block;
            width: 40px;
            height: 2px;
            background-color: #ff7575;
            margin: 5px 0 0
        }

        .menu-inner-block-a {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 30px
        }

        .ree-nav ul .menu-li-link li {
            display: block;
            width: 100%
        }

        .ree-nav ul .menu-li-link li+li {
            margin-top: 10px
        }

        .menu-li-link li a {
            width: 100%;
            font-size: 16px;
            color: #52525d;
            position: relative;
            line-height: 26px;
            font-weight: 400
        }

        .menu-li-link li a:hover {
            color: #ff5b2e
        }

        .menu-extra-info {
            background: #fbf1ef;
            padding: 20px 0;
            border-bottom: 2px solid #ff5b2e
        }

        .ree-nav>ul>li.megamenu>div>div.menu-extra-info>div>div>ul>li a {
            font-size: 16px;
            color: #050748;
            padding-left: 10px
        }

        .ree-nav>ul>li.megamenu>div>div.menu-extra-info>div>div>ul>li {
            display: inline-flex;
            align-items: center;
            width: 20%
        }

        .menu-extra-info-inner ul {
            display: flex;
            grid-gap: 20px
        }

        .menu-icon-ree {
            width: 45px
        }

        .menu-icon-ree img {
            width: 35px
        }

        .ree-btn.whatsapp-bg:hover {
            background: #fff;
            color: #110a32;
            border: 1px solid #110a32
        }

        .ree-btn0 {
            line-height: 48px !important
        }

        .ree-btn:hover {
            color: #fff
        }

        .ree-btn2 {
            font-size: 18px;
            color: #fff;
            border-radius: 14px;
            display: inline-block;
            line-height: 50px;
            width: 50px;
            height: 50px;
            text-align: center
        }

        .ree-btn {
            font-weight: 500;
            font-size: 17px;
            color: #fff;
            border-radius: 100px;
            padding: 0 32px;
            display: inline-block;
            line-height: 60px;
            white-space: nowrap
        }

        .ree-btn-round {
            border-radius: 100%;
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 0
        }

        .ree-btn-grdt1:hover {
            background: #fff;
            color: #ff5b2e;
            -webkit-box-shadow: 0 19px 40px -10px #ffe0d2;
            box-shadow: 0 19px 40px -10px #ffe0d2;
            border: 1px solid #ff5b2e
        }

        .ree-btn-grdt1 {
            border: 1px solid #ff5b2e;
            background: #ff5b2e;
            -webkit-box-shadow: 0 19px 40px -10px #ffe0d2;
            box-shadow: 0 19px 40px -10px #ffe0d2
        }

        .ree-btn-grdt2:hover {
            background: #ff5b2e;
            border: 1px solid #ff5b2e
        }

        .ree-btn-grdt2 {
            background: #fff;
            color: #ff5b2e;
            border: 1px solid #ff5b2e;
            -webkit-box-shadow: 0 19px 40px -10px #ffe0d2;
            box-shadow: 0 19px 40px -10px #ffe0d2
        }
        button.btn-delete {
    width: auto;
    height: 24px;
    color: red;
    border-color: red;
}
        .nav-list {
            list-style-type: none;
            padding-left: 0;
        }
    </style>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Header</h4>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <header class="ree-header fixed-top">
                                <div class="container-fluid m-p-l-r-0">
                                    <div class="menu-header horzontl">
                                        <div class="menu-logo">
                                            <form id="logoform" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="dskt-logo">
                                                    <a class="nav-brand" href="javascript:void(0)" id="logoLink">
                                                        <img src="{{ asset('storage/' . $header->header_logo) }}"
                                                            alt="Logo" class="ree-logo" />
                                                    </a>
                                                    <input type="file" id="imageUpload" name="logo"
                                                        style="display:none;" accept="image/*" />
                                                    <input type="text" id="linkInput" name="link"
                                                        value="{{ $header->header_link }}" style="display: none;"
                                                        class="form-control link-input" placeholder="Enter logo link" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="ree-nav" role="navigation">
                                            <ul class="nav-list">
                                                @foreach ($menu as $m)
                                                    <li class="megamenu">
                                                        <a href="javascript:void(0)" class="menu-links"
                                                            data-id="{{ $m->id }}"
                                                            data-link="{{ $m->link }}">{{ $m->menu }}</a>
                                                        <button class="btn-delete" data-id="{{ $m->id }}"
                                                            style="display: none;"><i
                                                            class="bx bx-x"></i></button>
                                                    </li>
                                                @endforeach
                                                <li class="megamenu mega-small">
                                                    <a href="javascript:void(0)" id="addMenuItem"><i
                                                            class="bx bx-plus-medical"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="ree-nav-cta">
                                            <ul class="nav-list">
                                                <li>
                                                    <a href="javascript:void(0)" class="ree-btn ree-btn0 ree-btn-grdt2"
                                                        id="requestQuoteBtn" data-link="{{ $header->request_btn_link }}">
                                                        {{ $header->request_btn }}</a>
                                                    <input type="text" id="editTextField" style="display:none;"
                                                        class="form-control" placeholder="Edit button text" />
                                                    <input type="text" id="editLinkField" style="display:none;"
                                                        class="form-control" placeholder="Edit button link" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </header>

                        </div>

                    </div>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="mb-sm-0 font-size-18">Footer</h4>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <footer class="footer-a">
                                <div class="footer-fist-row pt40">
                                    <div class="container">
                                        <div class="row footer-deg2">
                                            <div class="col-3">
                                                <h6 class="editable-text workenquiryname">{{ $header->workenquiryname }}</h6>
                                                <ul class="footer-links-list social-linkz">
                                                    <li><a href="{{ $header2->contact_no }}" class="editable-text contact_no"><span><i
                                                                    class="fas fa-phone-square-alt"></i></span>{{ $header->contact_no }} </a></li>
                                                    <li><a href="{{ $header2->whatsapp_no }}" class="editable-text whatsapp_no"><span><i
                                                                    class="fab fa-whatsapp-square"></i></span> {{ $header->whatsapp_no }}</a></li>
                                                    <li><a href="{{ $header2->email1 }}" class="editable-text email1"><span><i
                                                                    class="fas fa-envelope"></i></span>{{ $header->email1 }}</a></li>
                                                    <li><a href="{{ $header2->email2 }}" class="editable-text email2"><span><i
                                                                    class="fas fa-envelope"></i></span>{{ $header->email2 }}</a></li>
                                                    <li><a href="{{ $header2->skype_name }}" class="editable-text skype_name"><span><i
                                                                    class="fab fa-skype"></i></span>{{ $header->skype_name }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <h6 class="editable-text companyname">{{ $header->companyname }}</h6>
                                                <ul class="footer-links-list">
                                                    <li><a href="{{ $header2->about_us }}" class="editable-text about_us"> {{ $header->about_us }}</a></li>
                                                    <li><a href="{{ $header2->portfolio }}"
                                                            class="editable-text portfolio">{{ $header->portfolio }}</a></li>
                                                    <li><a href="{{ $header2->blog }}" class="editable-text blog">{{ $header->blog }}</a>
                                                    </li>
                                                    <li><a href="{{ $header2->contact_us }}"
                                                            class="editable-text contact_us">{{ $header->contact_us }}</a></li>
                                                    <li><a href="{{ $header2->faqs }}" class="editable-text faqs">{{ $header->faqs }}</a>
                                                    </li>
                                                    <li><a href="{{ $header2->privacy_policy }}"
                                                            class="editable-text privacy_policy">{{ $header->privacy_policy }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <h6 class="editable-text servicename">{{ $header->servicename }}</h6>
                                                <ul class="footer-links-list">
                                                    <li><a href="{{ $header2->hire_developers }}"
                                                            class="editable-text hire_developers">{{ $header->hire_developers }}</a></li>
                                                    <li><a href="{{ $header2->web_app_dev }}" class="editable-text web_app_dev">{{ $header->web_app_dev }}</a></li>
                                                    <li><a href="{{ $header2->mobile_app_dev }}"
                                                            class="editable-text mobile_app_dev">{{ $header->mobile_app_dev }}</a>
                                                    </li>
                                                    <li><a href="{{ $header2->seo }}" class="editable-text seo">{{ $header->seo }}</a></li>
                                                    <li><a href="{{ $header2->ppc }}"
                                                            class="editable-text ppc">{{ $header->ppc }}</a></li>
                                                    <li><a href="{{ $header2->social_media }}"
                                                            class="editable-text social_media">{{ $header->social_media }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-3">
                                                <h6 class="editable-text industriesname">{{ $header->industriesname }}</h6>
                                                <ul class="footer-links-list">
                                                    <li><a href="{{ $header2->healthcare }}"
                                                            class="editable-text healthcare">{{ $header->healthcare }}</a></li>
                                                    <li><a href="{{ $header2->education }}"
                                                            class="editable-text education">{{ $header->education }}</a></li>
                                                    <li><a href="{{ $header2->retail }}"
                                                            class="editable-text retail">{{ $header->retail }}</a></li>
                                                    <li><a href="{{ $header2->logistics }}"
                                                            class="editable-text logistics">{{ $header->logistics }}</a></li>
                                                    <li><a href="{{ $header2->oil_gas }}" class="editable-text oil_gas">{{ $header->oil_gas }}</a></li>
                                                    <li><a href="{{ $header2->music_video }}"
                                                            class="editable-text music_video">{{ $header->music_video }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container ft-cpy bt-top mt70">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="ft-copyright">
                                                    <p class="editable-text copyright">{{ $header->copyright }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="ft-copyright ft-r">
                                                    <p class="editable-text copyright_info">{{ $header->copyright_info }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Input field for editing -->
                                <input type="text" id="editTextField2" style="display: none; position: absolute;" />
                            </footer>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuModalLabel">Add New Menu Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newMenuName" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" id="newMenuName">
                    </div>
                    <div class="mb-3">
                        <label for="newMenuLink" class="form-label">Menu Link</label>
                        <input type="text" class="form-control" id="newMenuLink">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveNewMenu">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menuName">Menu Name</label>
                        <input type="text" class="form-control" id="menuName" placeholder="Enter menu name">
                    </div>
                    <div class="form-group">
                        <label for="menuLink">Menu Link</label>
                        <input type="text" class="form-control" id="menuLink" placeholder="Enter menu link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        function handleTextEdit(e, clickType) {
            e.preventDefault();  
            
            const clickedElement = $(this);  
            const inputField = $('#editTextField2');
            const position = clickedElement.offset();  
            
            inputField.css({
                top: position.top - 330,  
                left: position.left - 265,
                width: 'fit-content',  
                display: 'block',
                fontSize: clickedElement.css('fontSize'),  // Match the font size
                fontFamily: clickedElement.css('fontFamily'),  // Match the font family
                color: clickedElement.css('color'),  // Match the text color
                backgroundColor: 'white',  // Optional: set background for better visibility
                border: '1px solid #ccc',  // Optional: add border for better visibility
                padding: '2px',  // Optional: add padding
                zIndex: 1000  // Bring input field to the front
            }).focus();

            if (clickType === 'left-click') {
                inputField.val(clickedElement.text());
            } else {
                const hrefValue = clickedElement.attr('href') || '';  // Get href value or set empty if no href
            inputField.val(hrefValue);
            }

            inputField.off('keypress').on('keypress', function(e) {
                if (e.which === 13) {  // If Enter key is pressed
                    const newText = $(this).val();  // Get the new text from input field

                    // Update the clicked element's text only if it's a left-click
                    if (clickType === 'left-click') {
                        clickedElement.text(newText);  // Update the text only for left-click
                    }

                    // Get the last class name from the clicked element
                    const classNames = clickedElement.attr('class').split(' ');
                    const lastClassName = classNames[classNames.length - 1];

                    // AJAX call to update the text or link on the server
                    $.ajax({
                        url: "{{ route('footermenu.update') }}",
                        type: 'POST',
                        data: {
                            menuName: lastClassName,  // Use the last class name
                            newText: newText,
                            click: clickType,  // Pass the click type (left or right)
                            _token: '{{ csrf_token() }}'  // Pass CSRF token for security
                        },
                        success: function(response) {
                            Toastify({
                                text: "Changes saved successfully!",
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#4CAF50",  // Green success color
                            }).showToast();
                        },
                        error: function(xhr, status, error) {
                            Toastify({
                                text: "Failed to save: " + error,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#FF0000",  // Red error color
                            }).showToast();
                            console.error('Failed to save text: ' + error);
                        }
                    });

                    // Hide the input field after editing
                    $(this).hide();
                }
            });

            // Hide the input field when clicking outside
            $(document).off('click').on('click', function(e) {
                if (!$(e.target).is(inputField) && !$(e.target).hasClass('editable-text')) {
                    inputField.hide();
                }
            });
        }

        // Bind both left-click and right-click to the editable-text elements
        $('.editable-text').on('click', function(e) {
            handleTextEdit.call(this, e, 'left-click');  // Left-click
        });
        
        $('.editable-text').on('contextmenu', function(e) {
            handleTextEdit.call(this, e, 'right-click');  // Right-click (with default context menu disabled)
        });
    });
    </script>
    
    


    <script>
        $(document).ready(function() {
            const requestQuoteBtn = $('#requestQuoteBtn');
            const editTextField = $('#editTextField');
            const editLinkField = $('#editLinkField');

            // Left-click to edit button text
            requestQuoteBtn.on('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                const currentText = requestQuoteBtn.text();

                // Show and position the text input field
                editTextField.val(currentText).css({
                    display: 'block',
                    position: 'absolute',
                    top: requestQuoteBtn.offset().top - 130,
                    left: requestQuoteBtn.offset().left - 265,
                    width: requestQuoteBtn.outerWidth()
                }).focus();
            });

            // Right-click to edit button link
            requestQuoteBtn.on('contextmenu', function(event) {
                event.preventDefault(); // Prevent default context menu
                const currentLink = requestQuoteBtn.data('link');

                // Show and position the link input field
                editLinkField.val(currentLink).css({
                    display: 'block',
                    position: 'absolute',
                    top: requestQuoteBtn.offset().top - 130,
                    left: requestQuoteBtn.offset().left - 265,
                    width: requestQuoteBtn.outerWidth()
                }).focus();
            });

            // Handle saving text changes on Enter key for the button text
            editTextField.on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const newText = editTextField.val();
                    requestQuoteBtn.text(newText); // Update button text
                    saveChanges(newText, requestQuoteBtn.data('link')); // Call save function
                    editTextField.hide(); // Hide input field after save
                }
            });

            // Handle saving link changes on Enter key for the button link
            editLinkField.on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const newLink = editLinkField.val();
                    requestQuoteBtn.data('link', newLink); // Update button link attribute
                    saveChanges(requestQuoteBtn.text(), newLink); // Call save function
                    editLinkField.hide(); // Hide input field after save
                }
            });

            // Function to save changes via AJAX
            function saveChanges(newText, newLink) {
                $.ajax({
                    url: "{{ route('linkandmenu.update') }}", // Adjust this URL for your update route
                    type: "POST",
                    data: {
                        name: newText,
                        link: newLink,
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        Toastify({
                            text: "Changes saved successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50", // Green success color
                        }).showToast();
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON?.errors?.name ? xhr.responseJSON.errors.name[
                            0] : "Update failed. Please try again.";
                        Toastify({
                            text: errorMsg,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#FF0000", // Red for error
                        }).showToast();
                    }
                });
            }

            // Hide input fields if clicked outside
            $(document).on('click', function(event) {
                if (!requestQuoteBtn.is(event.target) && !editTextField.is(event.target) && !editLinkField
                    .is(event.target)) {
                    editTextField.hide();
                    editLinkField.hide();
                }
            });
            document.addEventListener('click', function(event) {
                if (!editTextField.contains(event.target) && !logoLink.contains(event.target)) {
                    editTextField.style.display = 'none';
                }
                if (!editLinkField.contains(event.target) && !logoLink.contains(event.target)) {
                    editLinkField.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.menu-links').on('click', function() {
                // Get the current menu name, link, and ID
                const menuItem = $(this);
                const menuName = menuItem.text();
                const menuLink = menuItem.data('link');
                const menuId = menuItem.data('id'); // Get the menu ID

                // Set the current values in the modal input fields
                $('#menuName').val(menuName);
                $('#menuLink').val(menuLink);

                // Show the modal
                $('#editMenuModal').modal('show');

                // Save changes button functionality
                $('#saveChanges').off('click').on('click', function() {
                    const newMenuName = $('#menuName').val();
                    const newMenuLink = $('#menuLink').val();

                    $.ajax({
                        url: "{{ route('menu.update', '') }}/" + menuId,
                        type: "POST",
                        data: {
                            name: newMenuName,
                            link: newMenuLink,
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                // Show success toast
                                Toastify({
                                    text: "Menu updated successfully!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#4CAF50", // Green for success
                                }).showToast();

                                // Update displayed name and link in the menu
                                menuItem.text(newMenuName); // Update displayed name
                                menuItem.attr('data-link',
                                    newMenuLink
                                ); // Update the link in the data attribute

                                // Close the modal
                                $('#editMenuModal').modal('hide');
                            }
                        },
                        error: function(xhr) {
                            // Show error toast
                            const errorMsg = xhr.responseJSON?.errors?.name ? xhr
                                .responseJSON.errors.name[0] :
                                "Update failed. Please try again.";
                            Toastify({
                                text: errorMsg,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#FF0000", // Red for error
                            }).showToast();
                        }
                    });
                });
            });
            // Handle right-click on menu items
            $('.menu-links').on('contextmenu', function(e) {
                e.preventDefault(); // Prevent the default context menu

                // Hide any previously shown delete buttons
                $('.btn-delete').hide();

                const deleteButton = $(this).siblings('.btn-delete');
                deleteButton.css({
                    top: e.pageY + 'px',
                    left: e.pageX + 'px',
                    display: 'block'
                });

                // Set the delete action on the delete button
                deleteButton.off('click').on('click', function() {
                    const menuId = $(this).data('id');
                    // AJAX call to delete the menu item
                    $.ajax({
                        url: "{{ route('menuandlink.destroy', '') }}/" +
                            menuId, // Adjust the route as necessary
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                            if (response.success) {
                                // Remove the menu item from the DOM
                                deleteButton.parent().remove();

                                Toastify({
                                    text: "Menu deleted successfully!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#4CAF50",
                                }).showToast();
                            }
                        },
                        error: function(xhr) {
                            const errorMsg = xhr.responseJSON?.message ||
                                "Deleting menu failed. Please try again.";
                            Toastify({
                                text: errorMsg,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#FF0000",
                            }).showToast();
                        }
                    });
                });
            });

            // Hide delete button when clicking anywhere else
            $(document).on('click', function(e) {
                if (!$(e.target).hasClass('btn-delete')) {
                    $('.btn-delete').hide(); // Hide the delete button if clicking outside
                }
            });
            $('#addMenuItem').on('click', function() {
                $('#newMenuName').val(''); // Clear input fields
                $('#newMenuLink').val('');
                $('#addMenuModal').modal('show');

                $('#saveNewMenu').off('click').on('click', function() {
                    const newMenuName = $('#newMenuName').val();
                    const newMenuLink = $('#newMenuLink').val();
                    console.log(newMenuName);
                    console.log(newMenuLink);
                    $.ajax({
                        url: "{{ route('menuandlink.store') }}",
                        type: "POST",
                        data: {
                            name: newMenuName,
                            link: newMenuLink,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                Toastify({
                                    text: "Menu added successfully!",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#4CAF50",
                                }).showToast();

                                $('#menuList').append(`
                                <li class="megamenu">
                                    <a href="javascript:void(0)" class="menu-links" data-id="${response.id}" data-link="${newMenuLink}">${newMenuName}</a>
                                </li>
                            `);
                                $('#addMenuModal').modal('hide');
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                            const errorMsg = xhr.responseJSON?.errors?.name ? xhr
                                .responseJSON.errors.name[0] :
                                "Adding menu failed. Please try again.";
                            Toastify({
                                text: errorMsg,
                                duration: 3000,
                                close: true,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#FF0000",
                            }).showToast();
                        }
                    });
                });
            });

        });
    </script>
    <script>
        // Get elements
        const logoLink = document.getElementById('logoLink');
        const imageUpload = document.getElementById('imageUpload');
        const linkInput = document.getElementById('linkInput');
        const logoForm = document.getElementById('logoform');

        logoLink.addEventListener('click', function(event) {
            event.preventDefault();
            imageUpload.click();
        });

        imageUpload.addEventListener('change', function() {
            const formData = new FormData(logoForm);

            $.ajax({
                url: "{{ route('logo.upload') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function(response) {
                    Toastify({
                        text: "Image uploaded successfully!",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#4CAF50",
                    }).showToast();

                    if (response.logoPath) {
                        $('.ree-logo').attr('src', response.logoPath); // Update logo image on success
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Upload error:', error);
                    // Show error toast
                    Toastify({
                        text: "Image upload failed. Please try again.",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#FF0000",
                    }).showToast();
                }
            });
        });

        logoLink.addEventListener('contextmenu', function(event) {
            event.preventDefault();
            linkInput.style.display = 'block';
            linkInput.focus();
        });

        linkInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const formData = new FormData(logoForm);

                $.ajax({
                    url: "{{ route('link.update') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        // Show success toast
                        Toastify({
                            text: "Link updated successfully!",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#4CAF50",
                        }).showToast();

                        linkInput.style.display = 'none'; // Hide the input again
                        logoLink.href = response.newLink; // Update the logo link
                    },
                    error: function(xhr, status, error) {
                        console.error('Update error:', error);
                        // Show error toast
                        Toastify({
                            text: "Link update failed. Please try again.",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#FF0000",
                        }).showToast();
                    }
                });
            }
        });

        document.addEventListener('click', function(event) {
            if (!linkInput.contains(event.target) && !logoLink.contains(event.target)) {
                linkInput.style.display = 'none';
            }
        });
    </script>
@endsection
