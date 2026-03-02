<!DOCTYPE html>
<html lang="en">

  @include('home.css')
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
        margin-bottom:50px;
    }

    th {
        background-color: rgba(21, 142, 138, 0.79);
        padding: 15px;
        color: white;
        font-weight: bold;
        white-space: nowrap;
    }  
    
    .tr{
           background-color: rgba(21, 142, 138, 0.79);

    }

    td {
        color: white;
        border: 1px solid #ffff;
        padding: 12px;
        font-size: 15px; 
        vertical-align: middle;
    }

    .book_img {
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

   @include('home.header')

 <div class="currently-market">
    <div class="container">
      <div class="row">

    
             @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto" role="alert" style="max-width: 600px; margin-top: 20px;">
        <strong>Success!</strong> {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right; background: none; border: none; font-weight: bold;">X</button>
    </div>
@endif
        
            <h1 class="cat">View Borrow Book</h1>
            
            <div class="table_container">
              <table class="table">
                <thead>
                  <tr class="tr">
                    <th>Book Name</th>
                     <th>Auther Name</th>
                      <th> Status</th>
                    <th>Book Image</th>
                    <th>Cancel Request</th>
                 
                  </tr>
                </thead>

                    <tbody>
                  @foreach($data as $item) <tr>
                    
                  
                    <td class="text-wrap">{{$item->book->title}}</td>
                    <td>{{$item->book->auther_name}}</td>
                    <td><span class="badge badge-info">{{$item->status}}</span></td>
                  <td><img src="book/{{$item->book->book_img}}" class="book_img"></td>
                   <td> 
                    @if($item->status== 'Applied')
                   <form action="{{route('cancel_book' , $item->id)}}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to cancel this book?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:5px 10px; background-color:red; color:white; border:none; cursor:pointer;">
                        Cancel
                    </button>
                    @else
                    <p style="color:white; font-weight:bold;">Not Allowed</p>
                @endif
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
      </div>
      </div>
      </div>
  @include('home.footer')