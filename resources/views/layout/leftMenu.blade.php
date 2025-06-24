
          @php
              $user =Illuminate\Support\Facades\Auth::user();
              use App\Models\Page as ModelsPage;
              $pages = ModelsPage::all();
          @endphp
          <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            @if ($user->admin_role == 'Admin')
                            <li class="menu-title" key="t-menu">Admin</li>
                            @endif
                            @if ($user->admin_role == 'Employee')
                            <li class="menu-title" key="t-menu">Employee</li>
                            @endif
                            <li>
                                <a href="{{route('admin.dashboard')}}" class="waves-effect">
                                    {{-- <i class="bx bx-chat"></i>
                                    <span key="t-chat">Dashboard</span> --}}
                                    <i class='bx bx-slider-alt'></i>
                                    <span key="t-chat">Control Panel</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <span class="badge rounded-pill bg-danger float-end" key="t-hot">Hot</span>
                                    <i class="bx bx-layout"></i>
                                    <span key="t-layouts">Layouts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a></li>
                                            <li><a href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact Sidebar</a></li>
                                            <li><a href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a></li>
                                            <li><a href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                                            <li><a href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                                            <li><a href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored Sidebar</a></li>
                                            <li><a href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                                            <li><a href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar light</a></li>
                                            <li><a href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a></li>
                                            <li><a href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                                            <li><a href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored Header</a></li>
                                            <li><a href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li> -->
                            @if ($user->admin_role == 'Admin')
                            {{-- <li>
                                <a href="{{route('employee.index')}}" class="waves-effect">
                                    <i class='bx bx-slider-alt'></i>
                                    <span key="t-chat">Control Panel</span>
                                </a>
                            </li> --}}
                            <li class="menu-title" key="t-apps">Employee Manage</li>
                            <li>
                                <a href="{{route('employee.index')}}" class="waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-chat">Employee list</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('designation.index')}}" class="waves-effect">
                                    <i class="bx bx-star"></i>
                                    <span key="t-chat">Designation</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-apps">Project Manage</li>
                            <li>
                                <a href="{{route('project.index')}}" class="waves-effect">
                                    <i class="bx bx-briefcase-alt-2"></i>
                                    <span key="t-chat">Project list</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('project.assign')}}" class="waves-effect">
                                    <i class='bx bxs-user-check'></i>
                                    <span key="t-file-manager">Project Assignment</span>
                                </a>    
                            </li>
                            <li>
                                <a href="{{route('service.index')}}" class="waves-effect">
                                    <i class='bx bxs-customize'></i>
                                    <span key="t-ecommercse">Project Type</span>
                                </a>
                            </li> 
                            @endif
{{--
                            <li class="menu-title" key="t-apps">Clients Follow-up</li>
                            <li>
                                <a href="{{route('header.footer.dashboard')}}" class="waves-effect">
                                    <i class="bx bx-message-dots"></i>
                                    <span key="t-chat">Header Footer</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{route('home.sections')}}" class="waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-chat">Home Page</span>
                                </a>
                            </li> 
                            <li>
                                <a href="{{route('pages.index')}}" class="waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-chat">All Page</span>
                                </a>
                            </li>
                            @foreach($pages as $pg)
                            <li>
                                <a href="{{route('pagesection.index',['slug' => $pg->slug ])}}" class="waves-effect">
                                    <i class="bx bx-detail"></i>
                                    <span key="t-chat">{{ $pg->name }}</span>
                                </a>
                            </li>
                            @endforeach--}}
                            @if ($user->admin_role == 'Admin')
                            <li>
                                <a href="{{route('admins.index')}}" class="waves-effect">
                                    <i class='bx bx-group'></i>
                                    <span key="t-file-manager">Employee Credentials</span>
                                </a>    
                            </li>
                            @endif
                            @if ($user->admin_role == 'Employee')
                            <li>
                                <a href="{{route('employee.projects')}}" class="waves-effect">
                                    <i class='bx bx-code-alt'></i>
                                    <span key="t-chat">Projects</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee.profile')}}" class="waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-chat">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee.leave')}}" class="waves-effect">
                                    <i class='bx bxs-calendar'></i>
                                    <span key="t-chat">Attendance </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee.apply')}}" class="waves-effect">
                                    <i class='bx bxs-notification-off'></i>
                                    <span key="t-chat">Leave Apply</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('employee.timesheet')}}" class="waves-effect">
                                    <i class='bx bx-notepad'></i>
                                    <span key="t-chat">Time Sheet</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{route('admin.logout')}}" class="waves-effect">
                                    <i class="bx bx-log-out-circle"></i>
                                    <span key="t-chat">Log off</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-calendar"></i>
                                    <span key="t-dashboards">Calendars</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="calendar.html" key="t-tui-calendar">TUI Calendar</a></li>
                                    <li><a href="calendar-full.html" key="t-full-calendar">Full Calendar</a></li>
                                </ul>
                            </li> -->
                            @if ($user->admin_role == 'Admin')
                            {{-- <li>
                                <a href="{{route('menu.index')}}" class="waves-effect">
                                    <i class="bx bx-list-ul"></i>
                                    <span key="t-chat">Category</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('service.index')}}" class="waves-effect">
                                    <i class='bx bx-shape-triangle'></i>
                                    <span key="t-ecommercse">Service</span>
                                </a>
                            </li> --}}
                            @endif
                            {{-- <li>
                                <a href="{{route('home.index')}}" class="waves-effect">
                                    <i class="bx bx-file"></i>
                                    <span key="t-file-manager">Inquiries </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home.clients')}}" class="waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-file-manager">Clients </span>
                                </a>
                            </li> --}}
                            @if ($user->admin_role == 'Admin')
                          {{--  <li>
                                <a href="{{route('admins.index')}}" class="waves-effect">
                                    <i class='bx bx-group'></i>
                                    <span key="t-file-manager">Admins </span>
                                </a>    
                            </li>
                             <li>
                                <a href="{{route('clients.proposal')}}" class="waves-effect">
                                    <i class='bx bxs-message-dots'></i>
                                    <span key="t-file-manager">Proposal Sent </span>
                                </a>    
                            </li>
                            <li class="menu-title" key="t-apps">Clients Details</li>
                            <li>
                                <a href="{{route('clients.list')}}" class="waves-effect">
                                    <i class='bx bxs-message-dots'></i>
                                    <span key="t-file-manager">Clients List </span>
                                </a>    
                            </li>
                            <li>
                                <a href="{{route('segment.list')}}" class="waves-effect">
                                    <i class='bx bxs-customize'></i>
                                    <span key="t-file-manager">Segment List </span>
                                </a>    
                            </li> --}}
                            @endif
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->