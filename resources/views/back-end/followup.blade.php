@extends('layout.adminPageControl')

@section('content')
    <style>
button.btn.btn-primary {
    width: 200px;
    border-radius: 9px;
}
.btn-custom {
    background-color: #f0f0f0;
    color: #333;
    border: 1px solid #ddd;
    margin-right: 3px;
    margin-bottom: 5px;
    width: 75px;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
}
.chat-box {
    background: #c1c1c1;
    padding: 10px 28px;
    margin: 0px 50px;
    overflow-y: auto; /* Allows vertical scrolling */
    height: 500px;
    border-radius: .375rem; 
    /* WebKit-based browsers (Chrome, Safari) */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* Internet Explorer 10+ */
}

/* For WebKit-based browsers (Chrome, Safari) */
.chat-box::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* Optional: For a transparent scrollbar */
}

.btn-custom:hover {
    background-color: #007bff;
    color: #fff;
    transform: scale(1.05);
}

.btn-custom.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Adjust button container to align items correctly */
#followUpPeriodButtons {
    justify-content: flex-start;
}


/* Custom styles for Bootstrap tabs */
.nav-tabs .nav-link {
    border: 1px solid #dee2e6;
    border-radius: .375rem;
    margin-right: 0.5rem;
}

.nav-tabs .nav-link.active {
    color: #007bff;
    background-color: #fff;
    border-color: #dee2e6 #dee2e6 #fff;
}

.tab-content {
    padding: 15px;
}

        .step-content-even,
        .step-content-odd {
            background-color: #1b2ea9;
            height: auto;
            border-radius: 0px 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* margin-top: -140px; */
            /* margin-left: 281px; */
            color: white;
            font-size: 12px;
            font-family: cursive;
            font-weight: 600;
            width: auto;
            padding: 0 10px;
            min-width: 188px;
            top: 5px;
            right: 113px;
        }

        .curve-odd img,
        .curve-even img {
            width: 100%;
        }

        .curve-odd {
            width: 158px;
            margin-left: 524px;
            margin-top: 0;
            transform: rotate(80deg);
            top: 10px;
            left: -46px;
        }

        .curve-even {
            width: 148px;
            margin-left: -178px;
            transform: rotate(270deg);
            margin-top: -79px;
        }

        .chart-content-odd, .chart-content-even {
    background-color: #81faeabd;
    width: 100%;
    max-width: 477px;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    border-radius: 50px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    text-align: left;
    margin: 20px auto;
    align-content: space-between;
    flex-wrap: wrap;
}
.next-call {
    background: azure;
    padding: 1px 8px;
    border-radius: 9px;
}

        .step-content-odd p,
        .step-content-even p {
            margin: 5px 0;
        }

        @media only screen and (max-width: 767px) {

            .step-content-even,
            .step-content-odd {
                background-color: #05427b;
                height: auto;
                font-size: 18px;
                margin-top: -135px;
                margin-left: 0;
                min-width: 102px;
                padding: 10px;
            }

            .chart-content-odd,
            .chart-content-even {
                background-color: #00b9ff29;
                width: 100%;
                max-width: 298px;
                height: auto;
                padding: 20px;
                font-size: 14px;
                margin: 20px auto;
            }

            .curve-odd,
            .curve-even {
                display: none;
            }

            div#member-step {
                margin: 20px;
            }
        }

        @media only screen and (max-width: 1200px) {

            .curve-odd,
            .curve-even {
                display: none;
            }

            .step-content-odd {
                width: auto;
            }
        }

        @media only screen and (max-width: 992px) {
            .con-tab {
                margin: 0;
                padding: 20px;
            }

            .chart-content-odd {
                margin-top: 20px;
            }

            .chart-content-even {
                margin-top: 30px;
            }
        }

        @media only screen and (max-width: 820px) {
            .con-tab {
                margin-left: 20px;
            }
        }

        @media only screen and (max-width: 776px) {
            .con-tab {
                margin: 10px;
            }
        }

        .btn.btn-success.next {
            float: right;
            margin-right: 20px;
        }

        .btn.btn-success.pre {
            float: right;
        }

        .pre {
            color: white;
        }

        .rightarrowicons ul li,
        .rightarrowiconss ul li {
            margin-bottom: 10px !important;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .settings-icon {
            font-size: 40px;
            cursor: pointer;
            animation: rotate 2s linear infinite;
            margin-left: 10px;
        }

        .profile-info {
            display: none;
            position: absolute;
            right: 60px;
            top: 125px;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 14px;
            z-index: 10;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .client-name {
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 10px;
            color: #333;
            transition: color 0.3s;
        }

        .client-name:hover {
            color: #007bff;
        }

        .profile-menu {
            display: flex;
            align-items: center;
            position: relative;
            padding: 5px;
        }

        .profile-menu:hover .settings-icon {
            animation: rotate 2s linear infinite;
        }
        select.form-select.status-select {
    width: max-content;
    margin: 7px 16px;
    background: #f1b44c;
}
    </style>


    <div class="main-content">
        <div class="page-content">
            <section>
                <div id="member-step" class="container con-tab">
                    <div class="container">
                        <div class="d-flex justify-content-around mb-3">
                            <div>

                                <a class="btn btn-primary mt-1" href="{{route('home.index')}}"> <i class='bx bx-log-out-circle'></i> Back</a>     
                            </div>
<div>
    <select class="form-select status-select" data-client-id="{{ $client->id }}">
        <option value="following" {{ $client->status=='following'?'selected':'' }}>Following</option>
        <option value="rejected" {{ $client->status=='rejected'?'selected':'' }}>Rejected</option>
        <option value="pending" {{ $client->status=='pending'?'selected':'' }}>Pending</option>
        <option value="completed" {{ $client->status=='completed'?'selected':'' }}>Completed</option>
    </select>
</div>
    
                                <div class="profile-menu">
                                    <span class="client-name" onclick="toggleProfileInfo()">
                                        {{ $client->name ?: 'Client Name' }}
                                    </span>
                                    <i class='bx bx-cog settings-icon' onclick="toggleProfileInfo(event)"></i>
                                </div>
                        </div>
                        <div class="profile-info">
                            <p>Client Name: {{ $client->name . ' ' . $client->last_name ?: 'N/A' }}</p>
                            <p>Company: {{ $client->company_name ?: 'N/A' }}</p>
                            <p>Email: {{ $client->email ?: 'N/A' }}</p>
                            <p>Phone: {{ $client->phone_number ?: 'N/A' }}</p>
                            <p>Location: {{ $client->location ?: 'N/A' }}</p>
                            <p>Category: {{ $client->category ?: 'N/A' }}</p>
                            <p>Service: {{ $client->service ?: 'N/A' }}</p>
                        </div>
                    </div>

<div class="chat-box">
    <div class="row">

        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

            <div class="d-flex position-relative">
                <div class="">

                    <div class="odd">
                        <div class="chart-right">
                            <div class="chart-content-odd">{{ $client->content ?: 'N/A' }}</div>
                        </div>
                    </div>

                    <div class="step-content-odd position-absolute">
                        <div>{{ $client->created_at ?: 'N/A' }}</div>
                    </div>
                    {{-- <div class="curve-odd position-absolute">
                        <img src="{{ asset('assets/images/curve-arrow.png') }}">
                    </div> --}}

                </div>
            </div>

        </div>
</div>
    @php
    $lastType = '';
@endphp

@foreach ($followup as $message)
    @if ($message->type == 'client')
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="d-flex position-relative">
                    <div class="">
                        <div class="odd">
                            <div class="chart-right">
                                <div class="chart-content-odd">{{ $message->content }}
                                @if (!empty($message->scheduled_date)) 
                                <div class="next-call">
                                    Next scheduled date : {{ $message->scheduled_date }}
                                </div>
                            </div>
                                @endif
                            </div>
                        </div>
                        <div class="step-content-odd position-absolute">
                            <p>{{ $message->created_at }}</p>
                        </div>
                        
                        @if ($message->type != $lastType)
                            {{-- <div class="curve-odd position-absolute">
                                <img src="{{ asset('assets/images/curve-arrow.png') }}" alt="Curve Arrow">
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="d-flex position-relative">
                    <div class="">
                        <div class="even">
                            <div class="chart-left">
                                <div class="chart-content-even">{{ $message->content }}
                                @if (!empty($message->scheduled_date)) 
                                <div class="next-call">
                                    Next scheduled date : {{ $message->scheduled_date }}
                                </div>
                                @endif
                            </div>
                            </div>
                        </div>
                
                        <div class="step-content-even position-absolute">
                            <p>{{ $message->created_at }}</p>
                        </div>

                        @if ($message->type != $lastType)
                            {{-- <div class="curve-even position-absolute">
                                <img src="{{ asset('assets/images/Untitled_Project__1_-removebg-preview.png') }}" alt="Curve Even">
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @php
        $lastType = $message->type;
    @endphp
@endforeach
</div>
</div>
 
</section>
<div class="row p-3">
    <div class="col-lg-12 d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Follow-up
        </button>
        @if ($client->proposal_status == 'success')
        <button type="button" id="proposalButton" class="btn btn-success ms-2">
            ✔️ Send Requested to Admin
        </button>
        @elseif ($client->proposal_status == 'completed')
        <button type="button"  class="btn btn-success ms-2">
            ✔️ Success
        </button>
        @else
        <button type="button" id="proposalButton" onclick="sentProposel({{ $client->id }})" class="btn btn-info ms-2">
            Proposal sent
        </button>
        @endif
    </div>
</div>
</div>
</div>

  



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Follow-up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="followUpForm">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="mb-3">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="scheduled-date-tab" data-bs-toggle="tab" href="#scheduled-date" role="tab" aria-controls="scheduled-date" aria-selected="true">Next Scheduled Date</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="follow-up-period-tab" data-bs-toggle="tab" href="#follow-up-period" role="tab" aria-controls="follow-up-period" aria-selected="false">Next Follow-up Period</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- Next Scheduled Date Tab -->
                                <div class="tab-pane fade show active" id="scheduled-date" role="tabpanel" aria-labelledby="scheduled-date-tab">
                                    
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" id="content1" name="content1" required></textarea>
                                            <input type="hidden" name="clientid" id="clientid" value="{{ $client->id }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select class="form-select" id="type1" name="type1" required>
                                            <option value="client">Client</option>
                                            <option value="organization">Organization</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="scheduled_date" class="form-label">Scheduled Date</label>
                                        <input type="date" class="form-control" id="scheduled_date" name="scheduled_date" required>
                                    </div>
                                </div>
                                <!-- Next Follow-up Period Tab -->
                                <div class="tab-pane fade" id="follow-up-period" role="tabpanel" aria-labelledby="follow-up-period-tab">
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" id="content2" name="content2" required></textarea>
                                        <input type="hidden" name="clientid" id="clientid" value="{{ $client->id }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select class="form-select" id="type2" name="type2" required>
                                            <option value="client">Client</option>
                                            <option value="organization">Organization</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Follow-up Period</label>
                                        <div id="followUpPeriodButtons" class="d-flex flex-wrap">
                                            <!-- First Row of Buttons -->
                                            <div class="btn-group mb-2" role="group">
                                                <button type="button" class="btn btn-custom" data-value="1">1 month</button>
                                                <button type="button" class="btn btn-custom" data-value="2">2 months</button>
                                                <button type="button" class="btn btn-custom" data-value="3">3 months</button>
                                                <button type="button" class="btn btn-custom" data-value="4">4 months</button>
                                                <button type="button" class="btn btn-custom" data-value="5">5 months</button>
                                                <button type="button" class="btn btn-custom" data-value="6">6 months</button>
                                            </div>
                                            <!-- Second Row of Buttons -->
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-custom" data-value="7">7 months</button>
                                                <button type="button" class="btn btn-custom" data-value="8">8 months</button>
                                                <button type="button" class="btn btn-custom" data-value="9">9 months</button>
                                                <button type="button" class="btn btn-custom" data-value="10">10 months</button>
                                                <button type="button" class="btn btn-custom" data-value="11">11 months</button>
                                                <button type="button" class="btn btn-custom" data-value="12">1 year</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="follow_up_period" id="followUpPeriod" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="clientid" id="clientid" value="{{ $client->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveFollowUpBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    
    

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all buttons inside the follow-up period button group
            const buttons = document.querySelectorAll('#followUpPeriodButtons button');
            const hiddenInput = document.getElementById('followUpPeriod');
    
            // Add click event to each button
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons
                    buttons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to the clicked button
                    this.classList.add('active');
                    // Set the hidden input's value to the clicked button's data-value
                    hiddenInput.value = this.getAttribute('data-value');
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('#saveFollowUpBtn').click(function() {
                var formData = $('#followUpForm').serialize();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('followups.store') }}',
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in request headers
                    },
                    success: function(response) {
                        $('#exampleModal').modal('hide');
                        $('#followUpForm')[0].reset();
                        window.location.reload();
                        Toastify({
                text: response.message || "Follow-up successfully.", // Use response message
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#28a745",
                stopOnFocus: true,
            }).showToast();
                    },
                    error: function(response) {
                        console.log(response);
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
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const icon = document.querySelector('.settings-icon');
            const profileInfo = document.querySelector('.profile-info');
            const clientName = document.querySelector('.client-name');

            function toggleProfileInfo(event) {
                // Prevent the click event from propagating to the document
                event.stopPropagation();

                // Toggle the visibility of the profile info
                if (profileInfo.style.display === 'block') {
                    profileInfo.style.display = 'none';
                    icon.style.animationPlayState = 'running'; // Resume rotation if needed
                } else {
                    profileInfo.style.display = 'block';
                    icon.style.animationPlayState = 'paused'; // Pause rotation
                }
            }

            function handleClickOutside(event) {
                // Check if the click was outside the profile info, client name, and icon
                if (!profileInfo.contains(event.target) && !clientName.contains(event.target) && !icon.contains(
                        event.target)) {
                    profileInfo.style.display = 'none';
                    icon.style.animationPlayState = 'running'; // Resume rotation if needed
                }
            }

            icon.addEventListener('click', (event) => {
                toggleProfileInfo(event);
            });

            clientName.addEventListener('click', (event) => {
                toggleProfileInfo(event);
            });

            document.addEventListener('click', handleClickOutside);
        });
    </script>
<script>
    document.getElementById("proposalButton").addEventListener("click", function() {
        // Change the button's class to 'btn-success' for green color
        this.classList.remove("btn-info");
        this.classList.add("btn-success");

        // Change the button's text to a tick mark and "Clicked"
        this.innerHTML = '✔️ Success';
    });
    function sentProposel(id) {
    var id = id;
    $.ajax({
        url: '{{ route('followups.sentProposel') }}',
        type: 'POST',
        data: {
            id: id,
            _token: '{{ csrf_token() }}' // Correctly include the CSRF token in the data object
        },
        success: function(response) {
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

</script>

@endsection
