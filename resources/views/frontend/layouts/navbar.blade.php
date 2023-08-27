<header>
    <div class="header-area header-transparrent" style="background-color: ghostwhite">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('home') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{ route('feed') }}">Feed</a></li>
                                        @if(Auth::guard('customer')->check())
                                            <li><a href="{{ route('my-posts') }}">My Posts</a></li>
                                        @elseif((Auth::guard('company')->check()))
                                            <li><a href="{{ route('our-jobs') }}">Our Jobs</a></li>
                                        @endif
                                        <li><a href="{{ route('job.all') }}">Jobs </a></li>
                                        <li><a href="{{ route('company.all') }}">Companies</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="job_details.html">job Details</a></li>
                                            </ul>
                                        </li>
                                        @if(Auth::guard('customer')->check())
                                            <li><a href="{{ route('notifications') }}">Notification</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                                @if(Auth::guard('customer')->check())
                                    <span class="border border-primary shadow rounded p-3">
                                        <a href="{{ route('customer.profile') }}" class="text-dark">
                                            <i class="fa fa-regular fa-user"></i>&nbsp;
                                            {{ Auth::guard('customer')->user()->getName() }}&nbsp;&nbsp;
                                        </a>
                                        <a href="{{ route('customer.logout') }}" class="text-light badge badge-pill bg-danger rounded">
                                            Logout
                                        </a>
                                    </span>
                                @elseif(Auth::guard('company')->check())
                                    <span class="border border-info rounded shadow p-3">
                                        <a href="{{ route('company.profile') }}" class="text-dark">
                                            <i class="fa fa-solid fa-briefcase"></i>&nbsp;
                                            {{ Auth::guard('company')->user()->name }}&nbsp;&nbsp;
                                        </a>
                                        <a href="{{ route('company.logout') }}" class="text-light badge badge-pill bg-danger rounded">
                                            Logout
                                        </a>
                                    </span>
                                @else
                                    <a href="{{ route('customer.register') }}" class="btn head-btn1">Register</a>
                                    <a href="{{ route('customer.login') }}" class="btn head-btn2">Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
