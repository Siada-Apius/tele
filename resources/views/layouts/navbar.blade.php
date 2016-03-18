<div class="mainnav ">
<div class="container">

    <a class="mainnav-toggle" data-toggle="collapse" data-target=".mainnav-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars"></i>
    </a>

    <nav class="collapse mainnav-collapse" role="navigation">

        <form class="mainnav-form" role="search">
            <input type="text" class="form-control input-md mainnav-search-query" placeholder="Search">
            <button class="btn btn-sm mainnav-form-btn"><i class="fa fa-search"></i></button>
        </form>
        @foreach(Auth::user()->roles()->get() as $role)
            <!--{{$user_roles[] = $role->role}}-->
        @endforeach

        <ul class="mainnav-menu">
            @if(in_array('admin', $user_roles))
            <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'users' ? 'active' : '' }}">
                <a href="{{ url('users') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

                    Users
                    <i class="mainnav-caret"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('users') }}">
                            <i class="fa fa-users"></i>
                            All users
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('users', 'create') }}">
                            <i class="fa fa-plus"></i>
                            Create new user
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(in_array('admin', $user_roles))
            <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'shops' ? 'active' : '' }}">

                <a href="{{ url('shops') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                    Shops
                    <i class="mainnav-caret"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('shops') }}">
                            <i class="fa fa-desktop"></i>
                            All Shops
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('shops', 'create') }}">
                            <i class="fa fa-plus"></i>
                            Create new shop
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(in_array('admin', $user_roles))
            <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'categories' ? 'active' : '' }}">

                <a href="{{ url('categories') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                    Categories & Departments
                    <i class="mainnav-caret"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('categories') }}">
                            <i class="fa fa-suitcase"></i>
                            Categories & Departments
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(in_array('admin', $user_roles))
            <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'products' ? 'active' : '' }}">

                <a href="{{ url('products') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                    Products
                    <i class="mainnav-caret"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('products') }}">
                            <i class="fa fa-square"></i>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('products', 'create') }}">
                            <i class="fa fa-plus"></i>
                            Create new product
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(in_array('admin', $user_roles))
                <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'groups' ? 'active' : '' }}">
                    <a href="{{ url('groups') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

                        Price Groups
                        <i class="mainnav-caret"></i>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('groups') }}">
                                <i class="fa fa-money"></i>
                                Price Groups
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(in_array('admin', $user_roles) || in_array('support_manager', $user_roles) || in_array('support_agent', $user_roles))
            <li class="{{ isset(\Illuminate\Support\Facades\Request::segments()[0]) && \Illuminate\Support\Facades\Request::segments()[0] == 'orders' ? 'active' : '' }}">
                <a href="{{ url('orders') }}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">

                    Orders
                    <i class="mainnav-caret"></i>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('orders') }}">
                            <i class="fa fa-table"></i>
                            Orders
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>

    </nav>

</div> <!-- /.container -->
</div> <!-- /.mainnav -->