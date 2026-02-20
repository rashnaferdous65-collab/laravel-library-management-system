 <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admin_css/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('add_category')}}"> <i class="fa-solid fa-list"></i>Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Books</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_book')}}">Add Book Details</a></li>
                    <li><a href="{{url('view_book')}}">View Book Detalis</a></li>
                   
                  </ul>
                </li>
                <li><a href="{{url('borrow_book')}}"> <i class="fa-solid fa-print"></i>View Borrow Request</a></li>
                 <li><a href="{{url('reader_list')}}"> <i class="fa-solid fa-print"></i>View Book Reader List</a></li>
               
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->