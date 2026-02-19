<!DOCTYPE html>
<html> 
  @include('admin.css')
   <style>
  .cat {
        text-align: center;
        font-weight: bold;
        color: white;
        padding-bottom: 30px;
        font-size: 28px;
    }

   
    .table_container {
        overflow-x: auto;
        margin-top: 20px;
    }

    .table {
        text-align: center;
        margin: auto;
        width: 100%;       
        border: 1px solid rgba(255, 255, 255, 0.1); 
        table-layout: auto; 
    }

    th {
        background-color: rgba(21, 142, 138, 0.79);
        padding: 15px;
        color: white;
        font-weight: bold;
        white-space: nowrap;
    }      

    td {
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 12px;
        font-size: 15px; 
        vertical-align: middle;
    }

    .user_img {
        width: 60px; 
        height: auto; 
        border-radius: 5px;
    }

    
    .text-wrap {
        white-space: normal;
        max-width: 200px;
        word-wrap: break-word;
    }
  </style>

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

  <div>
                <h1 class="cat">View Book Detalis List</h1>
            <table class="table">

            <tr>
                <th>Name</th>
                 <th>Phone Number</th>
                  <th>Email</th>
                   <th>Description</th>
                    <th>Address</th>
                     <th>User Image</th>
                      <th>Action</th>
            </tr>

            @foreach($create as $item)
            <tr>
            <td>{{$item->title}} </td>
             <td>{{$item->phone}}</td>
              <td>{{$item->email}}</td>
              <td>{{ Str::limit($item->description, 50) }}</td>
                <td>{{$item->address}}</td>
                 <td><img class="user_img" src="user_images/{{$item->user_img}}" alt=""></td>
                
                
                 <td style="text-align: center;">
                    <div style="display: flex; justify-content: center; gap: 10px; align-items: center;">
                             <a href="{{url('edit_reader', $item->id)}}" 
                                style="padding:5px 15px; background-color:blue;
                             color:white; border:none; text-decoration:none; border-radius:3px; font-size:14px;">
                                 Edit
                                     </a>   
                    <form action="{{route('reader_delete' , $item->id)}}" method="POST" 
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

            
</div>
</div>
 </div>
        @include('admin.footer')