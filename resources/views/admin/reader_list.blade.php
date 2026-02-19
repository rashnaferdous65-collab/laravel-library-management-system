<!DOCTYPE html>
<html lang="en">

@include('admin.css')

<style>
    .page-title {
        text-align: center;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .reader-table-wrapper {
        overflow-x: auto;
        margin-top: 25px;
    }

    .reader-table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    .reader-table th {
        background: rgba(21, 142, 138, 0.85);
        padding: 14px;
        color: #fff;
        font-weight: 600;
    }

    .reader-table td {
        padding: 12px;
        border: 1px solid rgba(255,255,255,0.1);
        color: #ffffff;
        vertical-align: middle;
    }

    .reader-image {
        width: 65px;
        border-radius: 6px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-edit {
        padding: 5px 15px;
        background: #0d6efd;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn-delete {
        padding: 5px 12px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            {{-- Success Message --}}
            @if(session()->has('message'))
                <div class="alert alert-success text-center mx-auto mt-3" style="max-width:600px;">
                    {{ session('message') }}
                </div>
            @endif

            <h2 class="page-title">Reader Details List</h2>

            <div class="reader-table-wrapper">
                <table class="reader-table">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th>User Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($create as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <img src="user_images/{{ $item->user_img }}" 
                                         class="reader-image" 
                                         alt="User Image">
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ url('edit_reader', $item->id) }}" 
                                           class="btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{ route('reader_delete', $item->id) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this reader?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No Reader Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
