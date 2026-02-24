 <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('/')}}" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}"   class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{url('explore')}}">Explore</a></li>
                        <li><a href="{{url('create')}}">Create Yours</a></li>
                    
                        @auth
                          <li><a href="{{url('book_history')}}">My History</a></li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Logout" class="btn btn-transparent text-white">
    </form>
@endauth

@guest
    <li><a href="{{ route('login') }}">Log In</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@endguest

                       
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
                 
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->