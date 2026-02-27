<!DOCTYPE html>
<html lang="en">

  @include('home.css')
  <style>



.book-form {
    max-width: 520px;
    padding: 20px;
    
}


.book-form .form-group {
    margin-bottom: 15px;
}



.group{

    display: block;
    margin-bottom: 6px;
    color: #cfd2dc;
    font-size: 14px;
      margin-top:30px;
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

.head{

        text-align: center;
        margin-top:100px;
        margin-bottom:60px;

    }

  </style>

<body>

   @include('home.header')

  <div class="currently-market">
    <div class="container">
      <div class="row">
           <div class="book_div">
               @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show text-center mx-auto" role="alert" style="max-width: 600px; margin-top: 20px;">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>

             
               {{session()->get('message')}}
                </div>
               @endif
            <h1 class="head">Add You Information For Library Card </h1>

            <form action="{{url('store_create')}}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
                <label for="" class="group">Write You Name</label>
                <input type="text" name="title" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="" class="group">Write Your Phone Number</label>
                <input type="number" name="phone" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="" class="group">Write Your Email</label>
                <input type="text" name="email" class="form-control custom-input">
            </div>

              <div class="form-group">
                <label for="" class="group">Write a Short Description About Reading book</label>
               <textarea name="description"  class="form-control custom-textarea"></textarea>
            </div>

             <div class="form-group">
                <label for="" class="group">Write Your Address</label>
                <input type="text" name="address" class="form-control custom-input">
            </div>

             <div class="form-group">
                <label for="" class="group">Add Your Image</label>
                <input type="file" name="user_img" class="form-control custom-file">
            </div>

       

          

              

             <div class="form-group">
              
                <input type="submit" value="Add Your Information" class="custom-btn">
            </div>
            </form>
            </div>
      </div>
    </div>
  </div>
  @include('home.footer')