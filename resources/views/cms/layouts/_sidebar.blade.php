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
                        <li class="dropdown"><a
                                    class="nav-link menu-title {{ (request()->is('admin/users*') || request()->is('admin/customers*') || request()->is('admin/vendor/users*') || request()->is('admin/venue/users*')) ? 'active' : '' }}"
                                    href="javascript:void(0)"><i
                                        data-feather="users"></i><span>Users</span></a>
                            <ul class="nav-submenu menu-content">
                                <li><a href="{{route('admin.users')}}"
                                       class="{{ request()->is('admin/users*') ? 'active' : '' }}">Administrators</a>
                                </li>
                                <li><a href="{{route('admin.customers')}}"
                                       class="{{ request()->is('admin/customers*') ? 'active' : '' }}">Customers</a>
                                </li>
                                <li><a href="{{route('admin.vendor.users')}}"
                                       class="{{ request()->is('admin/vendor/users*') ? 'active' : '' }}">Vendors</a>
                                </li>
                                <li><a href="{{route('admin.venue.users')}}"
                                       class="{{ request()->is('admin/venue/users*') ? 'active' : '' }}">Venues</a></li>
                            </ul>
                        </li>
                        @can('roles_all')
                            <li class="dropdown"><a
                                        class="nav-link menu-title {{ request()->is('admin/roles*') ? 'active' : '' }}"
                                        href="javascript:void(0)"><i
                                            data-feather="lock"></i><span>Roles
                                            & Permissions</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.roles.index')}}" {{ request()->is('admin/roles*') ? 'active' : '' }}>Roles
                                            & Permissions</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endcan
                    @if(in_array(auth()->user()->roles->first()->name,['Vendor','Venue']))
                        @can('vendor_services_all')
                            <li class="dropdown"><a
                                        class="nav-link menu-title {{ request()->is('admin/vendors*') ? 'active' : '' }}"
                                        href="javascript:void(0)"><i
                                            data-feather="archive"></i><span>Vendor Services</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.vendors.index')}}" {{ request()->is('admin/vendors*') ? 'active' : '' }}>Vendor
                                            Services</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('venue_services_all')
                            <li class="dropdown"><a
                                        class="nav-link menu-title {{ request()->is('admin/venues*') ? 'active' : '' }}"
                                        href="javascript:void(0)"><i
                                            data-feather="layers"></i><span>Venue Services</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.venues.index')}}" {{ request()->is('admin/venues*') ? 'active' : '' }}>Venue
                                            Services</a></li>
                                </ul>
                            </li>
                        @endcan
                    @else
                        @can('vendor_services_all')
                            <li class="dropdown"><a
                                        class="nav-link menu-title {{ request()->is('admin/vendors*') ? 'active' : '' }}"
                                        href="javascript:void(0)"><i
                                            data-feather="archive"></i><span>Vendor Services</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.vendors.index')}}" {{ request()->is('admin/vendors*') ? 'active' : '' }}>Vendor
                                            Services</a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('venue_services_all')
                            <li class="dropdown"><a
                                        class="nav-link menu-title {{ request()->is('admin/roles*') ? 'active' : '' }}"
                                        href="javascript:void(0)"><i
                                            data-feather="layers"></i><span>Venue Services</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li>
                                        <a href="{{route('admin.venues.index')}}" {{ request()->is('admin/roles*') ? 'active' : '' }}>Venue
                                            Services</a></li>
                                </ul>
                            </li>
                        @endcan
                    @endif
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>