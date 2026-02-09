<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .book-form {
            max-width: 520px;
            padding: 20px;
        }

        .book-form .form-group {
            margin-bottom: 15px;
        }

        .book-form label {
            display: block;
            margin-bottom: 6px;
            color: #cfd2dc;
            font-size: 14px;
        }

        .custom-input,
        .custom-textarea,
        .custom-file {
            width: 100%;
            background: #1f2933;
            border: 1px solid #374151;
            border-radius: 5px;
            color: #ffffff;
        }

        .custom-input {
            height: 40px;
            padding: 0 12px;
        }

        .custom-textarea {
            min-height: 80px;
            padding: 10px;
            resize: none;
        }

        .custom-file {
            padding: 6px;
            color: #cfd2dc;
        }

        .custom-input:focus,
        .custom-textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 1px #4f46e5;
            outline: none;
        }

        .custom-btn {
            padding: 10px 20px;
            background: crimson;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .custom-btn:hover {
            background: black;
        }
    </style>
</head>

<body>
@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="book-form">
                <h1>Add Book Details</h1>

                <form action="{{ url('store_book') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Book Name</label>
                        <input type="text" name="book_name" class="custom-input">
                    </div>

                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="text" name="auther_name" class="custom-input">
                    </div>

                    <div class="form-group">
                        <label>Book Price</label>
                        <input type="text" name="price" class="custom-input">
                    </div>

                    <div class="form-group">
                        <label>Book Quantity</label>
                        <input type="number" name="quantity" class="custom-input">
                    </div>

                    <div class="form-group">
                        <label>Book Image</label>
                        <input type="file" name="book_img" class="custom-file">
                    </div>

                    <div class="form-group">
                        <label>Author Image</label>
                        <input type="file" name="auther_img" class="custom-file">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="custom-textarea"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Book Category</label>
                        <select name="category" required class="custom-file">
                            <option value="">Select a Category</option>
                            @foreach($data as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->cat_title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add Book Details" class="custom-btn">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')
</body>
</html>
