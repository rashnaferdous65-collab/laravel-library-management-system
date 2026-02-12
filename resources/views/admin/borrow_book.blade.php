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
    @include('admin.header')
    @include('admin.slidebar')
    
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          
          <div>
            <h1 class="cat">View Borrow Book</h1>
            
            <div class="table_container">
              <table class="table">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Book Title</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th>Book Image</th>
                    <th>Change Status</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($data as $borrow) <tr>
                    <td>{{$borrow->user->name}}</td>
                    <td>{{$borrow->user->phone}}</td>
                    <td>{{$borrow->user->email}}</td>
                    <td class="text-wrap">{{$borrow->book->title}}</td>
                    <td>
                        <span class="badge badge-info">{{$borrow->status}}</span>
                    </td>
                    <td>{{$borrow->book->quantity}}</td>
                    <td>
                        <img src="book/{{$borrow->book->book_img}}" class="book_img">
                    </td>
                    <td style="display: flex; gap: 5px; justify-content: center; ">
                        <a href="{{url('approve_book', $borrow->id)}}" class="btn btn-primary btn-sm">Approved</a>
                    <a href=" {{url('reject_book', $borrow->id)}}" class="btn btn-warning btn-sm">Rejected</a>
                    <a href="{{url('return_book', $borrow->id)}}"class="btn btn-light btn-sm">Returned</a>
                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
                      <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
          </div>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>