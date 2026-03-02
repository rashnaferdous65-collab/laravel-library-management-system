<!DOCTYPE html>
<html lang="en">

@include('home.css')

<style>
    .page-title {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 40px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .custom-table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        margin-bottom: 60px;
    }

    .custom-table thead {
        background: rgba(21, 142, 138, 0.9);
    }

    .custom-table th {
        padding: 14px;
        color: #fff;
        font-weight: bold;
        white-space: nowrap;
    }

    .custom-table td {
        padding: 12px;
        border: 1px solid #ffffff;
        color: #ffffff;
        vertical-align: middle;
    }

    .custom-table tbody tr {
        background: rgba(21, 142, 138, 0.6);
    }

    .book-image {
        width: 65px;
        border-radius: 6px;
    }

    .wrap-text {
        max-width: 220px;
        word-break: break-word;
    }

    .cancel-btn {
        padding: 6px 12px;
        background: red;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .not-allowed {
        font-weight: bold;
        color: #ffffff;
    }
</style>

<body>

@include('home.header')

<div class="currently-market">
    <div class="container">
        <div class="row">

            {{-- Success Message --}}
            @if(session()->has('message'))
                <div class="alert alert-success text-center mx-auto" style="max-width:600px;">
                    <strong>Success!</strong> {{ session('message') }}
                </div>
            @endif

            <h2 class="page-title">Borrowed Book List</h2>

            <div class="table-wrapper">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Author Name</th>
                            <th>Status</th>
                            <th>Book Image</th>
                            <th>Cancel Request</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td class="wrap-text">
                                    {{ $item->book->title }}
                                </td>

                                <td>
                                    {{ $item->book->auther_name }}
                                </td>

                                <td>
                                    <span class="badge bg-info">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                <td>
                                    <img src="{{ asset('book/'.$item->book->book_img) }}" 
                                         class="book-image" alt="Book Image">
                                </td>

                                <td>
                                    @if($item->status === 'Applied')
                                        <form action="{{ route('cancel_book', $item->id) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Are you sure to cancel this request?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="cancel-btn">
                                                Cancel
                                            </button>
                                        </form>
                                    @else
                                        <span class="not-allowed">
                                            Not Allowed
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Borrow History Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

@include('home.footer')

</body>
</html>