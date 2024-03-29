<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Talamedia</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
{{--                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
{{--                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}

                            <p>
                                Talamedia
                            </p>
                        </li>
                        <!-- Menu Body -->
{{--                        <li class="user-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xs-4 text-center">--}}
{{--                                    <a href="#">Followers</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-4 text-center">--}}
{{--                                    <a href="#">Sales</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-xs-4 text-center">--}}
{{--                                    <a href="#">Friends</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}
{{--                        </li>--}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
