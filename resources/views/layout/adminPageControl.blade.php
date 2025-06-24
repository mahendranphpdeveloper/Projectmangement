<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Project Management</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <!--<link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}">-->
<link rel="icon" type="image/png" href="{{ asset('assets/images/favv.png')}}">
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}"  rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}"  rel="stylesheet" type="text/css" />
        <!-- App js -->
        {{-- <script src="{{asset('assets/js/plugin.js')}}"></script> --}}
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Include Tagify CSS -->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

<!-- Include Tagify JS -->
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </head>

    <body data-sidebar="dark">

    <div id="layout-wrapper">

    @include('layout.adminHeader')

    @include('layout.leftMenu')

    @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                {{date('Y')}} © Jayam Web Solutions.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Jayam web solutions
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            
    </div>
    
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Plugins js -->
        <script src="{{asset('assets/libs/dropzone/dropzone-min.js')}}"></script>
        <!-- Form file upload init js -->
        {{-- <script src="{{asset('assets/js/pages/form-file-upload.init.js')}}"></script> --}}
        <!-- JAVASCRIPT -->
       <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script> 
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script> 
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/table-edits/build/table-edits.min.js')}}"></script>

        <script src="{{asset('assets/libs/table-edits/build/table-edits.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/table-editable.int.js')}}"></script> 
        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- dashboard init -->
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('.status-select').on('change', function() {
                    var clientId = $(this).data('client-id'); // Get client ID from data attribute
                    var status = $(this).val(); // Get the selected status
        
                    $.ajax({
                        url: '{{ route("client.updateStatus") }}', // Route to the update status method
                        type: 'POST',
                        data: {
                            client_id: clientId,
                            status: status,
                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        success: function(response) {
                            if(response.success) {
                                Toastify({
                                    text: response.message || "Client status updated successfully.", // Use response message
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#28a745",
                                    stopOnFocus: true,
                                }).showToast();
                                window.location.reload();
                            } else {
                                Toastify({
                                    text: response.message || "Error updating status.",
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#f10606",
                                    stopOnFocus: true,
                                }).showToast();
                            }
                        },
                        error: function(xhr) {
                            Toastify({
                                text: "An error occurred. Please try again.",
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
            });
        </script>
         <script>
            // JavaScript for sorting, searching, etc.
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('search');
                const tableBody = document.getElementById('contactTableBody');
    
                searchInput.addEventListener('input', function () {
                    const searchTerm = searchInput.value.toLowerCase();
                    const rows = tableBody.getElementsByTagName('tr');
    
                    for (const row of rows) {
                        const cells = row.getElementsByTagName('td');
                        let found = false;
    
                        for (const cell of cells) {
                            if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                found = true;
                                break;
                            }
                        }
    
                        row.style.display = found ? '' : 'none';
                    }
                });
            });
        </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            @if(session('accessDenied'))
                                Toastify({
                                    text: '{{ session("accessDenied") }}',
                                    duration: 3000,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    backgroundColor: "#f44336", 
                                }).showToast();
                            @endif
                        });
                        </script>
    </body>


</html>