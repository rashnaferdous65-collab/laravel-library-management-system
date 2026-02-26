<!DOCTYPE html>
<html lang="en">
<base href="/public">

@include('home.css')

<body>

@include('home.header')

<div class="currently-market">
    <div class="container">

        {{-- ================= CATEGORY SECTION ================= --}}
        <div class="row">
            <div class="col-lg-12 text-center explore-category-wrap">

                <h4 class="explore-title">Book Category</h4>

                <div class="explore-category">

                    {{-- All Books --}}
                    <a href="{{ url('explore') }}"
                       class="explore-cat {{ request()->is('explore') ? 'active' : '' }}">
                        All Books
                    </a>

                    {{-- Dynamic Categories --}}
                    @foreach($category as $cat)
                        <a href="{{ url('cat_search', $cat->id) }}"
                           class="explore-cat">
                            {{ $cat->cat_title }}
                        </a>
                    @endforeach

                </div>
            </div>
        </div>


        {{-- ================= SEARCH SECTION ================= --}}
        <div class="row my-4">
            <div class="col-lg-12">
                <form action="{{ url('search') }}"
                      method="GET"
                      class="d-flex justify-content-center">

                    <input type="search"
                           name="search"
                           class="form-control me-2"
                           placeholder="Search Here..."
                           style="max-width:400px; border-radius:30px; padding:10px 20px;">

                    <button type="submit"
                            class="btn btn-info text-white"
                            style="border-radius:30px; padding:10px 25px;">
                        Search
                    </button>

                </form>
            </div>
        </div>


        {{-- ================= BOOK LIST SECTION ================= --}}
        <div class="row mt-4">

            @forelse($data as $item)

                <div class="col-lg-6 mb-4">

                    <div class="card book-card">

                        <div class="row g-0">

                            {{-- Book Image --}}
                            <div class="col-md-5">
                                <img src="{{ asset('book/'.$item->book_img) }}"
                                     alt="{{ $item->title }}"
                                     class="img-fluid book-img">
                            </div>

                            {{-- Book Details --}}
                            <div class="col-md-7">
                                <div class="card-body d-flex flex-column h-100 p-4">

                                    <h4 class="book-title">
                                        {{ $item->title }}
                                    </h4>

                                    {{-- Author Info --}}
                                    <div class="author-info my-3">
                                        <img src="{{ asset('auther/'.$item->auther_img) }}"
                                             class="author-img">
                                        <span class="author-name">
                                            {{ $item->auther_name }}
                                        </span>
                                    </div>

                                    <hr class="divider">

                                    {{-- Availability --}}
                                    <div class="mb-3">
                                        <small class="availability-label">
                                            Current Available
                                        </small>
                                        <h5 class="fw-bold">
                                            {{ $item->quantity }} Copy
                                        </h5>
                                    </div>

                                    {{-- Buttons --}}
                                    <div class="mt-auto">

                                        <a href="{{ url('book_details', $item->id) }}"
                                           class="btn btn-details w-100">
                                            View Item Details
                                        </a>

                                        <a href="{{ url('borrow_books', $item->id) }}"
                                           class="btn btn-borrow w-100 mt-3">
                                            Apply To Borrow
                                        </a>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12 text-center text-white">
                    <h5>No Books Found</h5>
                </div>
            @endforelse

        </div>
    </div>
</div>


{{-- ================= STYLES ================= --}}
<style>

.book-card {
    border-radius: 20px;
    background: #27292a;
    color: #fff;
    overflow: hidden;
    transition: 0.3s;
}

.book-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 22px rgba(116,83,252,0.3);
}

.book-img {
    object-fit: cover;
    min-height: 250px;
}

.book-title {
    font-size: 20px;
    font-weight: 600;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.author-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 2px solid #7453fc;
}

.author-name {
    color: #afafaf;
}

.divider {
    border-color: #444;
}

.availability-label {
    color: #7453fc;
}

.btn-details {
    background: #7453fc;
    color: #fff;
    border-radius: 25px;
}

.btn-borrow {
    background: #fc53f6;
    color: #fff;
    border-radius: 25px;
}

.btn:hover {
    background: transparent !important;
    color: #fff !important;
    border: 1px solid #7453fc;
}


/* Category Section */
.explore-category-wrap {
    margin-top: 120px;
    margin-bottom: 50px;
}

.explore-category {
    display: flex;
    gap: 14px;
    justify-content: center;
    flex-wrap: wrap;
}

.explore-cat {
    padding: 9px 22px;
    border-radius: 35px;
    border: 1px solid #7453fc;
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

.explore-cat:hover,
.explore-cat.active {
    background: #7453fc;
    box-shadow: 0 6px 18px rgba(116,83,252,0.45);
}

</style>

@include('home.footer')

</body>
</html>