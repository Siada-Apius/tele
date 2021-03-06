<div class="container">

    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-cog"></i>
        </button>

        <a href="{{ url('') }}" class="navbar-brand navbar-brand-img">
            <img src="/img/admin/logo.png" alt="MVP Ready">
        </a>
    </div> <!-- /.navbar-header -->

    <nav class="collapse navbar-collapse" role="navigation">

        <ul class="nav navbar-nav navbar-left">

            <li class="dropdown navbar-notification">

                <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell navbar-notification-icon"></i>
                    <span class="visible-xs-inline">&nbsp;Notifications</span>
                    <b class="badge badge-primary">3</b>
                </a>

                <div class="dropdown-menu">

                    <div class="dropdown-header">&nbsp;Notifications</div>

                    <div class="notification-list">

                        <a href="./page-notifications.html" class="notification">
                            <span class="notification-icon"><i class="fa fa-cloud-upload text-primary"></i></span>
                            <span class="notification-title">Notification Title</span>
                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                            <span class="notification-time">20 minutes ago</span>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <span class="notification-icon"><i class="fa fa-ban text-secondary"></i></span>
                            <span class="notification-title">Notification Title</span>
                            <span class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                            <span class="notification-time">20 minutes ago</span>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <span class="notification-icon"><i class="fa fa-warning text-tertiary"></i></span>
                            <span class="notification-title">Storage Space Almost Full!</span>
                            <span class="notification-description">Praesent dictum nisl non est sagittis luctus.</span>
                            <span class="notification-time">20 minutes ago</span>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <span class="notification-icon"><i class="fa fa-ban text-danger"></i></span>
                            <span class="notification-title">Sync Error</span>
                            <span class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</span>
                            <span class="notification-time">20 minutes ago</span>
                        </a> <!-- / .notification -->

                    </div> <!-- / .notification-list -->

                    <a href="./page-notifications.html" class="notification-link">View All Notifications</a>

                </div> <!-- / .dropdown-menu -->

            </li>



            <li class="dropdown navbar-notification">

                <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope navbar-notification-icon"></i>
                    <span class="visible-xs-inline">&nbsp;Messages</span>
                </a>

                <div class="dropdown-menu">

                    <div class="dropdown-header">Messages</div>

                    <div class="notification-list">

                        <a href="./page-notifications.html" class="notification">
                            <div class="notification-icon"><img src="/img/avatars/avatar-3-md.jpg" alt=""></div>
                            <div class="notification-title">New Message</div>
                            <div class="notification-description">Praesent dictum nisl non est sagittis luctus.</div>
                            <div class="notification-time">20 minutes ago</div>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <div class="notification-icon"><img src="/img/avatars/avatar-3-md.jpg" alt=""></div>
                            <div class="notification-title">New Message</div>
                            <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                            <div class="notification-time">20 minutes ago</div>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <div class="notification-icon"><img src="/img/avatars/avatar-4-md.jpg" alt=""></div>
                            <div class="notification-title">New Message</div>
                            <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                            <div class="notification-time">20 minutes ago</div>
                        </a> <!-- / .notification -->

                        <a href="./page-notifications.html" class="notification">
                            <div class="notification-icon"><img src="/img/avatars/avatar-5-md.jpg" alt=""></div>
                            <div class="notification-title">New Message</div>
                            <div class="notification-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</div>
                            <div class="notification-time">20 minutes ago</div>
                        </a> <!-- / .notification -->

                    </div> <!-- / .notification-list -->

                    <a href="./page-notifications.html" class="notification-link">View All Messages</a>

                </div> <!-- / .dropdown-menu -->

            </li>


            <li class="dropdown navbar-notification empty">

                <a href="./page-notifications.html" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-warning navbar-notification-icon"></i>
                    <span class="visible-xs-inline">&nbsp;&nbsp;Alerts</span>
                </a>

                <div class="dropdown-menu">

                    <div class="dropdown-header">Alerts</div>

                    <div class="notification-list">

                        <h4 class="notification-empty-title">No alerts here.</h4>
                        <p class="notification-empty-text">Check out what other makers are doing on Explore!</p>

                    </div> <!-- / .notification-list -->

                    <a href="./page-notifications.html" class="notification-link">View All Alerts</a>

                </div> <!-- / .dropdown-menu -->

            </li>

        </ul>



        <ul class="nav navbar-nav navbar-right">

            <li>
                <a href="javsacript:;">Projects</a>
            </li>

            <li>
                <a href="javascript:;">Support</a>
            </li>

            @if (Auth::guest())
                <li class="dropdown ">

                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                        Login
                        <i class="fa fa-caret-down navbar-caret"></i>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('auth', 'login') }}">
                                <i class="fa fa-unlock dropdown-icon"></i>
                                Login
                            </a>
                        </li>
                    </ul>

                </li>
            @else
                <li class="dropdown navbar-profile">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                        <img src="/img/avatars/avatar-4-sm.jpg" class="navbar-profile-avatar" alt="">
                        <span class="visible-xs-inline">@peterlandt &nbsp;</span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li>
                            <a href="{{ url('users', Auth::id()) }}">
                                <i class="fa fa-user"></i>
                                &nbsp;&nbsp;My Profile
                            </a>
                        </li>

                        <li>
                            <a href="./page-pricing.html">
                                <i class="fa fa-dollar"></i>
                                &nbsp;&nbsp;Plans & Billing
                            </a>
                        </li>

                        <li>
                            <a href="./page-settings.html">
                                <i class="fa fa-cogs"></i>
                                &nbsp;&nbsp;Settings
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ url('auth', 'logout') }}">
                                <i class="fa fa-sign-out"></i>
                                &nbsp;&nbsp;Logout
                            </a>
                        </li>

                    </ul>

                </li>
            @endif

        </ul>

    </nav>

</div> <!-- /.container -->