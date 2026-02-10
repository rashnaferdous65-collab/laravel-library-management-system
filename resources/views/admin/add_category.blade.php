<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .category-wrapper {
            text-align: center;
            margin: auto;
        }

        .category-title {
            font-weight: bold;
            color: white;
            margin-bottom: 40px;
        }

        .category-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        .category-input {
            width: 500px;
            height: 40px;
            padding: 5px 10px;
        }

        .category-table {
            margin: auto;
            width: 60%;
            border-collapse: collapse;
        }

        .category-table th {
            background-color: rgba(21, 142, 138, 0.79);
            color: white;
            padding: 12px;
            border: 2px solid white;
        }

        .category-table td {
            color: white;
            padding: 12px;
            border: 2px solid white;
            text-align: center;
        }

        .action-btns {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .edit-btn {
            padding: 5px 15px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
        }

        .delete-btn {
            padding: 5px 12px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show text-center mx-auto"
                     style="max-width:600px; margin-top:20px;">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="category-wrapper">
                <h1 class="category-title">Add Category</h1>

                <form action="{{ url('made_category') }}" method="POST" class="category-form">
                    @csrf
                    <input type="text" name="category" class="category-input" placeholder="Enter category name" required>
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </form>
            </div>

            <table class="category-table">
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>

                @foreach($data as $data)
                    <tr>
                        <td>{{ $data->cat_title }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ url('edit_category', $data->id) }}" class="edit-btn">
                                    Edit
                                </a>

                                <form action="{{ route('cat_delete', $data->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">
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

@include('admin.footer')

</body>
</html>

