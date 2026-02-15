<!DOCTYPE html>
<html lang="en">
<head>

 <style>


.category{


    text-align: center;
    margin: auto;
}

.cat{

    font-weight: bold;
    color: white;
    padding-bottom: 50px;
}

.field{

    width: 500px;
    height: 40px;
}
   

 </style>
    @include('admin.css')
</head>
<body>

    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

               <div class="category">


               <h1 class="cat">Edit Category</h1>

               <div class="alert alert-success alert-dismissible fade show" role="alert">
                @if(session()->has('message'))
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>

               <div>
               {{session()->get('message')}}
                </div>
               @endif
                 
               </div> 
     

                  <form action="{{ route('update_category', $data->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Category Name</label>
    <input 
        type="text" 
        name="cat_name" 
        value="{{ old('cat_name', $data->cat_title) }}" 
        class="field" 
        required
    >

    <button class="btn btn-primary"  type="submit">Update Category</button>
</form>

            
              
               </div> 
</div>
</div>
</div>
</div>