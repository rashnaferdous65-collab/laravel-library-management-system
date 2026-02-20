<div class="d-flex">

    <!-- ===== Sidebar Start ===== -->
    <aside id="sidebar" class="bg-dark">

        <!-- Sidebar Header -->
        <div class="sidebar-header text-center py-4">
            <img src="{{ asset('admin_css/img/avatar-6.jpg') }}" 
                 class="rounded-circle mb-2" 
                 width="80" 
                 alt="Admin">

            <h5 class="mb-0">Mark Stephen</h5>
            <small class="text-muted">Web Designer</small>
        </div>

        <hr class="bg-secondary">

        <!-- Menu Title -->
        <p class="text-uppercase text-muted px-3 small">Main Menu</p>

        <!-- Navigation Menu -->
        <ul class="nav flex-column px-2">

            <li class="nav-item mb-2">
                <a class="nav-link text-white active" href="{{ url('admin/dashboard') }}">
                    <i class="icon-home me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="{{ url('add_category') }}">
                    <i class="fa-solid fa-list me-2"></i> Category
                </a>
            </li>

            <!-- Books Dropdown -->
            <li class="nav-item mb-2">
                <a class="nav-link text-white" 
                   data-bs-toggle="collapse" 
                   href="#bookMenu" 
                   role="button">
                    <i class="icon-windows me-2"></i> Books
                </a>

                <div class="collapse" id="bookMenu">
                    <ul class="nav flex-column ms-3 mt-2">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('add_book') }}">
                                Add Book Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('view_book') }}">
                                View Book Details
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-white" href="{{ url('borrow_book') }}">
                    <i class="fa-solid fa-print me-2"></i> Borrow Requests
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('reader_list') }}">
                    <i class="fa-solid fa-print me-2"></i> Reader List
                </a>
            </li>

        </ul>

    </aside>
    <!-- ===== Sidebar End ===== -->

</div>