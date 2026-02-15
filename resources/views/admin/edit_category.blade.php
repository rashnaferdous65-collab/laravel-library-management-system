<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style>
        .category {
            text-align: center;
            margin: auto;
        }

        .cat {
            font-weight: bold;
            color: white;
            padding-bottom: 40px;
        }

        .field {
            width: 500px;
            height: 40px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="category">

                <h1 class="cat">Edit Category</h1>

                {{-- Success Message --}}
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Validation Error --}}
                @error('cat_name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <form action="{{ route('update_category', ['id' => $data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label>Category Name</label><br>

                        <input 
                            type="text"
                            name="cat_name"
                            class="field"
                            value="{{ old('cat_name') ?? $data->cat_title }}"
                            placeholder="Enter Category Name"
                        >
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            Update Category
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

</body>
</html>