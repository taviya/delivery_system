<!-- Menu header start -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <nav class="navbar header-navbar pcoded-header" header-theme="theme4">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    {{-- <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a> --}}
                    <a href="{{ route('admin.dashboard') }}">
                        <img class="img-fluid" src="{{asset('assets/images/logo.png')}}" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <div>
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification lng-dropdown">
                                <a href="#" id="dropdown-active-item">
                                    <i class="flag-icon flag-icon-in m-r-5"></i> India
                                </a>
                            </li>
                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge">5</span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center" src="{{asset('assets/images/user.png')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{asset('assets/images/user.png')}}" alt="User-Profile-Image">
                                    <span>{{  auth()->user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{ route('admin.adminProfile',auth()->user()->id) }}">
                                            <i class="ti-user"></i>View Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.adminProfile',auth()->user()->id) }}">
                                            <i class="ti-settings"></i> Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i>{{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Sidebar chat start -->

        @yield('content')
        
    </div>
</div>