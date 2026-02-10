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

.table {
    text-align: center;
    margin: auto;
    width: 100px;       
    border: 2px solid white;
    table-layout: fixed; 
    margin-top: 50px;
}

th {
    background-color: rgba(21, 142, 138, 0.79);
     padding: 10px;
     color: white;
}      
td {
    
     color: white;
     border: 2px solid white;
     padding: 10px;
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
              
                @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show text-center mx-auto" role="alert" style="max-width: 600px; margin-top: 20px;">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>

             
               {{session()->get('message')}}
                </div>
               @endif

               <div class="category">
               <h1 class="cat">Add Category</h1>

               

              
               </div> 

               <form action="{{url('made_category')}}" method="POST">
               @csrf
                <span >
               <label for="">Add Category</label>
               <input class="field" type="text" name="category" required>
               </span>

               <input type="submit" value="Add Category" class="btn btn-primary">
               </form>

               <div>

               <table class="table">

               <tr>
                <th>Category Name</th>
                 <th>Action</th>
               </tr>
                @foreach($data as $data)
               <tr>
                

                <td>{{$data->cat_title}}</td>
                <td style="text-align: center;"> 
                    <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
                             <a href="{{url('edit_category', $data->id)}}" 
                                style="padding:5px 15px; background-color:blue;
                             color:white; border:none; text-decoration:none; border-radius:3px; font-size:14px;">
                                 Edit
                                     </a>   
                <form action="{{ route('cat_delete', $data->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; background-color:red; color:white; border:none; cursor:pointer;">
                        Delete
                    </button>
                </form>
              </div>
              </td>
          
               </tr>
               @endforeach
               </table>
               </div>
               </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>
</html>
