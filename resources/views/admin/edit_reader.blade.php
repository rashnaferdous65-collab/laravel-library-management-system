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

            <h1>Edit Book Detalis </h1>

            <form action="{{url('update_reader', $data->id)}}" method="POST" enctype="multipart/form-data">
             @csrf   @method('PUT')
            <div class="form-group">
                <label for="">Edit Name</label>
                <input type="text" name="title" class="form-control custom-input" value="{{$data->title}}">
            </div>

             <div class="form-group">
                <label for="">Edit Phone</label>
                <input type="number" name="phone" class="form-control custom-input"value="{{$data->phone}}">
            </div>

             <div class="form-group">
                <label for="">Edit Email</label>
                <input type="text" name="email" class="form-control custom-input" value="{{$data->email}}">
            </div>
                    <div class="form-group">
                <label for="">Add Book Description</label>
               <textarea name="description"  class="form-control custom-textarea" >{{$data->description}}</textarea>
            </div>

             <div class="form-group">
                <label for="">Edit Address</label>
                <input type="address" name="address" class="form-control custom-input"value="{{$data->address}}">
            </div>

                    <div class="form-group">
        <label>Current Reader Image</label>
           <img src="/user_images/{{$data->user_img}}" style="border:50%; width:80px;" >                 
    </div>

             <div class="form-group">
                <label for="">Edit Reader Image</label>
                <input type="file" name="user_img" class="form-control custom-file">
            </div>


                 
           
                                                                              
    

            </div>

             <div class="form-group">
              
                <input type="submit" value="Update Reader Details" class="custom-btn">
            </div>
            </form>
            </div>
</div>
</div> 
</div>

        @include('admin.footer')