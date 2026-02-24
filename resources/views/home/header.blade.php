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

                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    </a>

                    <!-- Menu -->
                    <ul class="nav">

                        {{-- Home --}}
                        <li>
                            <a href="{{ route('home') }}"
                               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>

                        {{-- Explore --}}
                        <li>
                            <a href="{{ url('explore') }}">
                                Explore
                            </a>
                        </li>

                        {{-- Create --}}
                        <li>
                            <a href="{{ url('create') }}">
                                Create Yours
                            </a>
                        </li>

                        {{-- Authenticated User Menu --}}
                        @auth
                            <li>
                                <a href="{{ url('book_history') }}">
                                    My History
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="btn btn-transparent text-white border-0 bg-transparent">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @endauth


                        {{-- Guest User Menu --}}
                        @guest
                            <li>
                                <a href="{{ route('login') }}">Log In</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest

                    </ul>

                    <!-- Mobile Menu Trigger -->
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>

                </nav>

            </div>
        </div>
    </div>
</header>

  <!-- ***** Header Area End ***** -->