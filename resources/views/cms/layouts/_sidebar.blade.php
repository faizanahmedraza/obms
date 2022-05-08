<header class="main-nav">
    <div class="sidebar-user text-center"><img class="img-90 rounded-circle"
                                               src="{{auth()->user()->avatar}}" alt="">
        <div class="badge-bottom"><span
                    class="badge badge-primary">{{ucfirst(auth()->user()->roles()->pluck('name')->first())}}</span>
        </div>
        <a href="">
            <h6 class="mt-3 f-14 f-w-600">{{auth()->user()->name}}</h6></a>
        <p class="mb-0 font-roboto">{{auth()->user()->department ?? 'Department'}}</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                              aria-hidden="true"></i></div>
                    </li>
                    @can('user_management_all')
                        <li class="sidebar-main-title">
                            <div>
                                <h6>User Management </h6>
                            </div>
                        </li>
                        <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="users"></i><span>Users</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="/admin/vendors">Vendors</a></li>
                                <li><a href="/admin/customers">Customers</a></li>
                                <li><a href="/admin/admin-users">Administrators</a></li>
                            </ul>
                        </li>
                        @can('roles_all')
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                            data-feather="lock"></i><span>User Roles</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="">Roles & Permissions</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endcan
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>