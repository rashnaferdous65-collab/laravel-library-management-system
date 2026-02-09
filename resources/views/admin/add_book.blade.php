<!DOCTYPE html>
<html> 
  @include('admin.css')

  <style>



.book-form {
    max-width: 520px;
    padding: 20px;
    
}


.book-form .form-group {
    margin-bottom: 15px;
}


.book-form label {
    display: block;
    margin-bottom: 6px;
    color: #cfd2dc;
    font-size: 14px;
}


.custom-input {
    width: 100%;
    height: 40px;
    background: #1f2933;
    border: 1px solid #374151;
    border-radius: 5px;
    color: #ffffff;
    padding: 0 12px;
    outline: none;
}

.custom-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 1px #4f46e5;
}

.custom-file {
    background: #1f2933;
    border: 1px solid #374151;
    color: #cfd2dc;
    padding: 6px;
    border-radius: 5px;
}


.custom-textarea {
    width: 100%;
    min-height: 80px;
    background: #1f2933;
    border: 1px solid #374151;
    border-radius: 5px;
    color: #ffffff;
    padding: 10px;
    resize: none;
}


.custom-btn {
    margin-top: 10px;
    padding: 10px 20px;
    background:crimson;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    color:white;
    font-weight: bold;
}

.custom-btn:hover {
    background: black;
}

  </style>
  <body>
    @include('admin.header')
     @include('admin.slidebar')
   
     
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">


            <div class="book_div">

            <h1>Add Book Detalis </h1>

            <form action="{{url('store_book')}}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label for="">Add Book Name</label>
                <input type="text" name="book_name" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="">Add Auther Name</label>
                <input type="text" name="auther_name" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="">Add Book Price</label>
                <input type="text" name="price" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="">Add Book Quantity</label>
                <input type="number" name="quantity" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="">Add Book Image</label>
                <input type="file" name="book_img" class="form-control custom-file">
            </div>

            <div class="form-group">
        <label>Add Author Image</label>
        <input type="file" name="auther_img" class="form-control custom-file">
    </div>

            <div class="form-group">
                <label for="">Add Book Description</label>
               <textarea name="description"  class="form-control custom-textarea"></textarea>
            </div>

                   <div class="form-group">
                <label for="">Add Book Category</label>
               <select name="category" id="" required class="form-control custom-file">
                <option value="">Select a Category</option>
                @foreach($data as $data)
                <option value="{{$data->id}}">{{$data->cat_title}}

                </option>
                 @endforeach
               </select>
            </div>

             <div class="form-group">
              
                <input type="submit" value="Add book Details" class="custom-btn">
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>

        @include('admin.footer')