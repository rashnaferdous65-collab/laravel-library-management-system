<!DOCTYPE html>
<html> 
  @include('admin.css')

  <style>
.cat{
     text-align: center;
    font-weight: bold;
    color: white;
    padding-bottom: 50px;
}
    .table {
    text-align: center;
    margin: auto;
    width: 1200px;       
    border: 2px solid white;
    table-layout: fixed; 
    margin-top: 50px;
}

th {
    background-color: rgba(21, 142, 138, 0.79);
     padding: 10px;
     color: white;
     font-weight: bold;
}      
td {
    
     color: white;
     border: 3px solid white;
     padding: 10px;
     font-weight: bold;
}

.auther_img{

    width:80px;
    border-radius: 50%;
}

.book_img{

    width:80px;
    height: auto; 
}
  </style>
  <body>
    @include('admin.header')
     @include('admin.slidebar')
   
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            
            <div>
                <h1 class="cat">View Book Detalis List</h1>
            <table class="table">

            <tr>
                <th>Title</th>
                 <th>Author Name</th>
                  <th>Price</th>
                   <th>Description</th>
                    <th>Quantity</th>
                     <th>Book Image</th>
                      <th>Author Image</th>
                      <th>Category</th>
                      <th>Action</th>
            </tr>

            
              @foreach($books as $book)
            <tr>
            <td>{{$book->title}} </td>
             <td>{{$book->auther_name}}</td>
              <td>{{$book->price}}</td>
              <td>{{ Str::limit($book->description, 50) }}</td>
                <td>{{$book->quantity}}</td>
                 <td><img class="book_img" src="book/{{$book->book_img}}" alt=""></td>
                 <td><img class="auther_img"src="auther/{{$book->auther_img}}" alt=""> </td>
                 <td>{{$book->category->cat_title}}</td>
                 <td style="text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
                             <a href="{{url('edit_book', $book->id)}}" 
                                style="padding:5px 15px; background-color:blue;
                             color:white; border:none; text-decoration:none; border-radius:3px; font-size:14px;">
                                 Edit
                                     </a>   
                    <form action="{{route('book_delete' , $book->id)}}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; background-color:red; color:white; border:none; cursor:pointer;">
                        Delete
                    </button>
                </form></td>
            </tr>
            @endforeach
            </table>
            </div>
      <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">
        {{ $books->links() }}
    </div>


</div>
</div>
 </div>
        @include('admin.footer')