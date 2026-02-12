<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        body {
            background-color: #1a1a1a;
            color: white;
            font-family: Arial, sans-serif;
        }

        .page-header h1 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            padding: 30px 0;
            color: #fff;
        }

        .table-container {
            overflow-x: auto;
            margin: 20px auto;
            max-width: 95%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th, td {
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.1);
        }

        th {
            background-color: rgba(21,142,138,0.8);
            color: white;
            white-space: nowrap;
        }

        td {
            color: white;
            font-size: 15px;
            vertical-align: middle;
        }

        .book-img {
            width: 60px;
            border-radius: 5px;
        }

        .text-wrap {
            max-width: 200px;
            word-wrap: break-word;
            white-space: normal;
        }

        .action-buttons a {
            margin: 0 3px;
        }

        .badge-info {
            background-color: #17a2b8;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.slidebar')

    <div class="page-content">
        <div class="page-header">
            <h1>View Borrow Book</h1>
        </div>

        <div class="table-container">
            <table>
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
                    @forelse($data as $borrow)
                        <tr>
                            <td>{{ $borrow->user->name }}</td>
                            <td>{{ $borrow->user->phone }}</td>
                            <td>{{ $borrow->user->email }}</td>
                            <td class="text-wrap">{{ $borrow->book->title }}</td>
                            <td><span class="badge-info">{{ $borrow->status }}</span></td>
                            <td>{{ $borrow->book->quantity }}</td>
                            <td><img src="{{ asset('book/'.$borrow->book->book_img) }}" class="book-img" alt="Book Image"></td>
                            <td class="action-buttons">
                                <a href="{{ url('approve_book', $borrow->id) }}" class="btn btn-primary btn-sm">Approve</a>
                                <a href="{{ url('reject_book', $borrow->id) }}" class="btn btn-warning btn-sm">Reject</a>
                                <a href="{{ url('return_book', $borrow->id) }}" class="btn btn-light btn-sm">Return</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No borrow records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
