<!DOCTYPE html>
<html lang="en">
  <base href="/public">
  @include('home.css')

<body>

   @include('home.header')

    <div class="currently-market">
    <div class="container">
      <div class="row">
            



        
            
               

      <div class="col-lg-12 text-center explore-category-wrap">
    <h4 class="explore-title">Book Category</h4>

    <div class="explore-category">
        <a href="{{ url('explore') }}" 
           class="explore-cat active">
            All Books
        </a>

        @foreach($category as $cat)
            <a href="{{ url('cat_search', $cat->id) }}" 
               class="explore-cat">
                {{ $cat->cat_title }}
            </a>
        @endforeach
    </div>
</div>

 
      <!-- Search Bar Start -->
<div class="container my-3">
    <form action="{{url('search')}}" class="d-flex justify-content-center" method="GET">
        @csrf
        <!-- Input -->
        <input 
            class="form-control me-2" 
            type="search" 
            name="search" 
            placeholder="Search Here..." 
            aria-label="Search"
            style="max-width: 400px; border-radius: 25px; padding: 10px 20px;"
        >
        <!-- Button -->
        <button type="submit" class="btn btn-info text-white" 
                style="border-radius: 25px; padding: 10px 25px; box-shadow: 0 3px 6px rgba(0,0,0,0.2);">
            Search
        </button>
    </form>
</div>
<!-- Search Bar End -->

       
   <div class="container mt-5">
    <div class="row">
        @foreach($data as $item)
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 20px; overflow: hidden; background: #27292a; color: #fff;">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="book/{{$item->book_img}}" class="img-fluid h-100" alt="{{$item->title}}" style="object-fit: cover; min-height: 250px;">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <h4 class="card-title fw-bold" style="color: #fff; font-size: 20px;">{{$item->title}}</h4>
                                
                                <div class="author-info d-flex align-items-center my-3">
                                    <img src="auther/{{$item->auther_img}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #7453fc;">
                                    <h6 class="ms-2 mb-0" style="color: #afafaf;">{{$item->auther_name}}</h6>
                                </div>
                                
                                <div style="height: 1px; background: #444; margin-bottom: 15px;"></div>
                                
                                <div class="availability mb-3">
                                    <span style="color: #7453fc; font-size: 14px;">Current Available</span>
                                    <h5 class="fw-bold text-white">{{$item->quantity}} Copy</h5>
                                </div>
                                
                                <div class="mt-auto">
                                    <a href="{{url('book_details', $item->id)}}" class="btn w-100 shadow-sm" style="background: #7453fc; color: white; border-radius: 25px; font-weight: 500; transition: 0.3s;">
                                        View Item Details
                                    </a>
                                </div>

                            <div class="mt-auto">
                                    <a href="{{url('borrow_books', $item->id)}}" class="btn w-100 shadow-sm" style="background: #fc53f6ff; color: white; border-radius: 25px; font-weight: 500; transition: 0.3s; margin-top:20px;">
                                        Apply To Borrow
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
   
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(116, 83, 252, 0.2) !important;
    }
    .btn:hover {
        background: #00000000 !important;
        color: #ffff !important;
    }

.explore-category-wrap {
    margin-top: 120px;
    margin-bottom: 50px;
}

.explore-title {
    color: #fff;
    font-weight: 600;
    margin-bottom: 25px;
    letter-spacing: 0.5px;
}

.explore-category {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Category Button */
.explore-cat {
    text-decoration: none;
    padding: 9px 22px;
    border-radius: 35px;
    border: 1px solid #7453fc;
    color: #ffffff;
    font-size: 14px;
    transition: all 0.3s ease;
    background: transparent;
}

/* Hover Effect */
.explore-cat:hover {
    background: #7453fc;
    color: #fff;
    box-shadow: 0 6px 18px rgba(116, 83, 252, 0.45);
    transform: translateY(-2px);
}

/* Active Category */
.explore-cat.active {
    background: #7453fc;
    font-weight: 600;
}




</style>

          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
</div>
  @include('home.footer')