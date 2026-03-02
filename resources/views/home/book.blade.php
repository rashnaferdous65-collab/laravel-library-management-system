<div class="currently-market py-5">
    <div class="container">
        
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h2><em>Items</em> Available In Library</h2>
                </div>
            </div>

            <div class="col-lg-6 text-end">
                <div class="filters">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item active">All Books</li>
                        <li class="list-inline-item">Popular</li>
                        <li class="list-inline-item">Latest</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                
                <div class="book-card p-3 h-100">

                    <div class="book-image mb-3 text-center">
                        <img src="book/{{$book->book_img}}" 
                             alt="{{$book->title}}" 
                             class="img-fluid rounded"
                             style="height:250px; object-fit:cover;">
                    </div>

                    <div class="book-content text-center">
                        <h5 class="fw-bold">{{$book->title}}</h5>

                        <div class="author my-2">
                            <img src="auther/{{$book->auther_img}}" 
                                 style="width:35px; height:35px; border-radius:50%;">
                            <small class="d-block mt-1 text-muted">
                                {{$book->auther_name}}
                            </small>
                        </div>

                        <div class="availability my-3">
                            <span class="badge bg-primary">
                                {{$book->quantity}} Copies Available
                            </span>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{url('book_details', $book->id)}}" 
                               class="btn btn-outline-light">
                               View Details
                            </a>

                            <a href="{{url('borrow_books', $book->id)}}" 
                               class="btn btn-primary">
                               Borrow Now
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.book-card {
    background: #1e1e1e;
    border-radius: 15px;
    color: #fff;
    transition: 0.3s;
}

.book-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}

.filters ul li {
    cursor: pointer;
    margin-left: 15px;
    color: #ccc;
}

.filters ul li.active,
.filters ul li:hover {
    color: #7453fc;
    font-weight: 600;
}
</style>