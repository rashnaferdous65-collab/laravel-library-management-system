<header class="header shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <!-- Brand -->
            <div class="navbar-header d-flex align-items-center">
                <a href="{{ url('/') }}" class="navbar-brand text-uppercase">
                    <span class="brand-text brand-big">
                        <strong class="text-primary">Dark</strong>Admin
                    </span>
                    <span class="brand-text brand-sm">
                        <strong class="text-primary">D</strong>A
                    </span>
                </a>

                <button class="sidebar-toggle btn btn-sm btn-outline-secondary ml-3">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Right Menu -->
            <ul class="list-inline mb-0 d-flex align-items-center">

                <!-- Search -->
                <li class="list-inline-item">
                    <form action="#" method="GET" class="d-flex">
                        <input type="search" 
                               name="search" 
                               class="form-control form-control-sm mr-2"
                               placeholder="Search...">
                        <button class="btn btn-sm btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>

                <!-- Messages -->
                <li class="list-inline-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-email"></i>
                        <span class="badge badge-danger">5</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-2" style="width: 300px;">
                        <div class="dropdown-item d-flex align-items-center">
                            <img src="{{ asset('admin_css/img/avatar-1.jpg') }}" 
                                 class="img-fluid rounded-circle mr-2" width="40">
                            <div>
                                <strong>Nadia Halsey</strong>
                                <small class="d-block text-muted">9:30am</small>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item text-center">
                            <strong>View All Messages</strong>
                        </a>
                    </div>
                </li>

                <!-- Language -->
                <li class="list-inline-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin_css/img/flags/16/GB.png') }}" alt="English">
                        <span class="d-none d-sm-inline">English</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">German</a>
                        <a href="#" class="dropdown-item">French</a>
                    </div>
                </li>

                <!-- Logout -->
                <li class="list-inline-item">
                    <a href="#"
                       class="nav-link text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout <i class="icon-logout"></i>
                    </a>

                    <form id="logout-form" 
                          action="{{ route('logout') }}" 
                          method="POST" 
                          style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </nav>
</header>
