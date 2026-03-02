
<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>


        
            
               

        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul>
          </div>
        </div>
   <div class="container mt-5">
    <div class="row">
        @foreach($books as $book)
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm border-0" style="border-radius: 20px; overflow: hidden; background: #27292a; color: #fff;">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="book/{{$book->book_img}}" class="img-fluid h-100" alt="{{$book->title}}" style="object-fit: cover; min-height: 250px;">
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body d-flex flex-column h-100 p-4">
                                <h4 class="card-title fw-bold" style="color: #fff; font-size: 20px;">{{$book->title}}</h4>
                                
                                <div class="author-info d-flex align-items-center my-3">
                                    <img src="auther/{{$book->auther_img}}" alt="" style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #7453fc;">
                                    <h6 class="ms-2 mb-0" style="color: #afafaf;">{{$book->auther_name}}</h6>
                                </div>
                                
                                <div style="height: 1px; background: #444; margin-bottom: 15px;"></div>
                                
                                <div class="availability mb-3">
                                    <span style="color: #7453fc; font-size: 14px;">Current Available</span>
                                    <h5 class="fw-bold text-white">{{$book->quantity}} Copy</h5>
                                </div>
                                
                                <div class="mt-auto">
                                    <a href="{{url('book_details', $book->id)}}" class="btn w-100 shadow-sm" style="background: #7453fc; color: white; border-radius: 25px; font-weight: 500; transition: 0.3s;">
                                        View Item Details
                                    </a>
                                </div>

                            <div class="mt-auto">
                                    <a href="{{url('borrow_books', $book->id)}}" class="btn w-100 shadow-sm" style="background: #fc53f6ff; color: white; border-radius: 25px; font-weight: 500; transition: 0.3s; margin-top:20px;">
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
</style>

          </div>
        </div>
      </div>
    </div>
  </div>