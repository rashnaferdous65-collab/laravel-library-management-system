<!DOCTYPE html>
<html>
@include('admin.css')

<style>

.edit-container{
    max-width: 650px;
    margin: 40px auto;
    background: #111827;
    padding: 25px;
    border-radius: 10px;
}

.edit-title{
    text-align: center;
    color: #ffffff;
    margin-bottom: 25px;
}

.form-label{
    color: #cbd5e1;
    font-size: 14px;
    margin-bottom: 5px;
}

.input-field,
.select-field,
.textarea-field{
    width: 100%;
    background: #1f2937;
    border: 1px solid #374151;
    border-radius: 6px;
    color: #fff;
    padding: 8px 12px;
}

.input-field:focus,
.select-field:focus,
.textarea-field:focus{
    border-color: #6366f1;
    box-shadow: 0 0 4px #6366f1;
    outline: none;
}

.image-preview{
    margin-top: 10px;
}

.image-preview img{
    width: 90px;
    border-radius: 8px;
}

.update-btn{
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: crimson;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
}

.update-btn:hover{
    background: black;
}

</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
<div class="container-fluid">

<div class="edit-container">

<h2 class="edit-title">Update Book Information</h2>

<form action="{{ url('update_book', $data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- Book Name -->
<div class="mb-3">
    <label class="form-label">Book Name</label>
    <input type="text" name="book_name" 
           value="{{ $data->title }}" 
           class="input-field">
</div>

<!-- Author Name -->
<div class="mb-3">
    <label class="form-label">Author Name</label>
    <input type="text" name="auther_name" 
           value="{{ $data->auther_name }}" 
           class="input-field">
</div>

<!-- Price -->
<div class="mb-3">
    <label class="form-label">Book Price</label>
    <input type="text" name="price" 
           value="{{ $data->price }}" 
           class="input-field">
</div>

<!-- Quantity -->
<div class="mb-3">
    <label class="form-label">Book Quantity</label>
    <input type="number" name="quantity" 
           value="{{ $data->quantity }}" 
           class="input-field">
</div>

<!-- Current Book Image -->
<div class="mb-3">
    <label class="form-label">Current Book Image</label>
    <div class="image-preview">
        <img src="/book/{{ $data->book_img }}">
    </div>
</div>

<!-- Upload New Book Image -->
<div class="mb-3">
    <label class="form-label">Change Book Image</label>
    <input type="file" name="book_img" class="input-field">
</div>

<!-- Current Author Image -->
<div class="mb-3">
    <label class="form-label">Current Author Image</label>
    <div class="image-preview">
        <img src="/auther/{{ $data->auther_img }}">
    </div>
</div>

<!-- Upload New Author Image -->
<div class="mb-3">
    <label class="form-label">Change Author Image</label>
    <input type="file" name="auther_img" class="input-field">
</div>

<!-- Description -->
<div class="mb-3">
    <label class="form-label">Book Description</label>
    <textarea name="description" class="textarea-field">{{ $data->description }}</textarea>
</div>

<!-- Category -->
<div class="mb-3">
    <label class="form-label">Select Category</label>
    <select name="category_id" class="select-field" required>
        <option disabled>Select Category</option>
        @foreach($category as $cat)
            <option value="{{ $cat->id }}"
                {{ $data->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->cat_title }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="update-btn">
    Update Book Details
</button>

</form>

</div>
</div>
</div>

@include('admin.footer')

</body>
</html>

  