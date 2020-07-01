<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('images/35-512.png')}}"
             alt="logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Hospital</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('images/profile.png')}}" class="img-circle elevation-2" alt="User Profile">
            </div>
            <div class="info">
                <a href="{{route('home')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('days.index')}}" class="nav-link @yield('day')">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Custom Day<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('days.index')}}" class="nav-link @yield('day')">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Manage Day</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('days.create') }}" class="nav-link @yield('day')">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Add Day</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('time.index')}}" class="nav-link @yield('time')">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Custom Time<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('time.index')}}" class="nav-link @yield('time')">
                                <p>Manage Time</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('time.create') }}" class="nav-link @yield('time')">
                                <p>Add Time</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('designation.index')}}" class="nav-link @yield('designation')">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Designation<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('designation.index')}}" class="nav-link @yield('designation')">
                                <p>Manage Designation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('designation.create') }}" class="nav-link @yield('designation')">
                                <p>Add Designation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('doctor.index')}}" class="nav-link @yield('doctor')">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>Doctor<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('doctor.index')}}" class="nav-link @yield('doctor')">
                                <p>Manage Doctor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctor.create') }}" class="nav-link @yield('doctor')">
                                <p>Add Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('patient.index')}}" class="nav-link @yield('patient')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Patient<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('patient.index')}}" class="nav-link @yield('patient')">
                                <p>Manage Patient</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('patient.create') }}" class="nav-link @yield('patient')">
                                <p>Add Patient</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('booking.index')}}" class="nav-link @yield('booking')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>BookingPatient<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('booking.index')}}" class="nav-link @yield('booking')">
                                <p>Manage Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('booking.create') }}" class="nav-link @yield('booking')">
                                <p>Add Booking</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('users.index')}}" class="nav-link @yield('user')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link @yield('user')">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link @yield('user')">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('roles.index')}}" class="nav-link @yield('roles')">
                        <i class="nav-icon fab fa-critical-role"></i>
                        <p>Roles<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link @yield('roles')">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Roles List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}" class="nav-link @yield('roles')">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Add New Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('permissions.index')}}" class="nav-link @yield('permissions')">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Permissions<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('permissions.index')}}" class="nav-link @yield('permissions')">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Permission List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('permissions.create') }}" class="nav-link @yield('permission')">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Add New Permission</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>