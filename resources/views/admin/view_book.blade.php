<!DOCTYPE html>
<html>
@include('admin.css')

<style>

.page-title{
    text-align:center;
    font-weight:bold;
    color:#fff;
    margin-bottom:40px;
}

.custom-table{
    width:100%;
    max-width:1200px;
    margin:40px auto;
    border-collapse:collapse;
    table-layout:fixed;
    border:2px solid #fff;
}

.custom-table th{
    background:rgba(21,142,138,0.85);
    color:#fff;
    padding:12px;
    font-weight:bold;
}

.custom-table td{
    padding:10px;
    border:2px solid #fff;
    color:#fff;
    font-weight:600;
    word-wrap:break-word;
}

.book-img,
.author-img{
    width:80px;
}

.author-img{
    border-radius:50%;
}

.action-btn{
    padding:6px 14px;
    border:none;
    border-radius:4px;
    font-size:14px;
    text-decoration:none;
    color:#fff;
}

.btn-edit{
    background:#0d6efd;
}

.btn-delete{
    background:#dc3545;
    cursor:pointer;
}

.action-wrapper{
    display:flex;
    justify-content:center;
    gap:8px;
}

</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="container-fluid">

        <h2 class="page-title">Book Details List</h2>

        <table class="custom-table">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Book Image</th>
                    <th>Author Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->auther_name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ Str::limit($book->description, 50) }}</td>
                    <td>{{ $book->quantity }}</td>

                    <td>
                        <img class="book-img" 
                             src="{{ asset('book/'.$book->book_img) }}" 
                             alt="Book Image">
                    </td>

                    <td>
                        <img class="author-img" 
                             src="{{ asset('auther/'.$book->auther_img) }}" 
                             alt="Author Image">
                    </td>

                    <td>{{ $book->category->cat_title }}</td>

                    <td>
                        <div class="action-wrapper">

                            <a href="{{ url('edit_book', $book->id) }}" 
                               class="action-btn btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('book_delete', $book->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this category?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" 
                                        class="action-btn btn-delete">
                                    Delete
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>

    </div>
</div>

@include('admin.footer')

</body>
</html>