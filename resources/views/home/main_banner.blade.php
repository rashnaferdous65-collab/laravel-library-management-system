<!-- ===== Main Banner Section Start ===== -->
<section class="main-banner py-5">
  <div class="container">
    <div class="row align-items-center">

      {{-- Success Message --}}
      @if(session()->has('message'))
        <div class="col-12">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif

      <!-- Left Content -->
      <div class="col-lg-6">
        <div class="banner-content">
          <span class="text-primary fw-bold">Book is Knowledge</span>
          <h1 class="my-3">Knowledge is Power</h1>
          <p class="text-muted">
            Library is a modern and professional template built with Bootstrap 5.
            Perfect for book portals and educational websites. Download and customize it easily from GitHub.
          </p>

          <div class="d-flex gap-3 mt-4">
            <a href="{{ url('explore') }}" class="btn btn-outline-primary">
              Explore Top Books
            </a>

            <a href="#" class="btn btn-primary" target="_blank">
              Watch Our Videos
            </a>
          </div>
        </div>
      </div>

      <!-- Right Images -->
      <div class="col-lg-5 offset-lg-1">
        <div class="banner-images text-center">
          <img src="{{ asset('assets/images/banner.png') }}" 
               class="img-fluid mb-3" 
               alt="Library Banner Image 1">

          <img src="{{ asset('assets/images/banner2.png') }}" 
               class="img-fluid" 
               alt="Library Banner Image 2">
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ===== Main Banner Section End ===== -->