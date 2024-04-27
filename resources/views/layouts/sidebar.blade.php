<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Jakelou Catering</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if(Auth::user()->type === 'user')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->type === 'staff')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('staff.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->type === 'admin')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::user()->type === 'user')
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMyBook"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-suitcase"></i>
                    <span>My Booking</span>
                </a>
                <div id="collapseMyBook" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Bookings:</h6>
                        <a class="collapse-item" href="{{route('events.index')}}">All Bookings</a>
                        <a class="collapse-item" href="cards.html">Create Bookings</a>
                    </div>
                </div>
            </li>
            @endif

             @if (auth()->user()->type === 'admin' || auth()->user()->type === 'staff')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-suitcase"></i>
                    <span>Booking</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Bookings:</h6>
                        <a class="collapse-item" href="{{route('events.index')}}">All Bookings</a>
                        <a class="collapse-item" href="cards.html">Create Bookings</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Customers</span>
                </a>
                <div id="collapseCustomer" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Staffs:</h6>
                        <a class="collapse-item" href="{{route('customers.index')}}">All Customers</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

             @if(Auth::user()->type === 'admin')
            <!-- Heading -->
            <div class="sidebar-heading">
                Entities
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Staffs</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Staffs:</h6>
                        <a class="collapse-item" href="{{route('staffs.index')}}">All Staffs</a>
                        <a class="collapse-item" href="register.html">Staff Schecules</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Users:</h6>
                        <a class="collapse-item" href="{{route('users.index')}}">All Users</a>
                        <a class="collapse-item" href="utilities-border.html">Create Users</a>
                    </div>
                </div>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('admin_assets/img/undraw_rocket.svg') }}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>