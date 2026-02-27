<!DOCTYPE html>
<html lang="en">

@include('home.css')

<style>

.form-wrapper{
    max-width:600px;
    margin:100px auto 60px auto;
    padding:30px;
}

.form-wrapper h2{
    text-align:center;
    margin-bottom:40px;
}

.input-label{
    display:block;
    margin-bottom:6px;
    margin-top:20px;
    font-size:14px;
    color:#cfd2dc;
}

.input-field,
.textarea-field,
.file-field{
    width:100%;
    background:#1f2933;
    border:1px solid #374151;
    border-radius:6px;
    color:#fff;
    padding:10px;
    outline:none;
}

.input-field{
    height:42px;
}

.textarea-field{
    min-height:90px;
    resize:none;
}

.input-field:focus,
.textarea-field:focus{
    border-color:#4f46e5;
}

.submit-btn{
    width:100%;
    margin-top:25px;
    padding:12px;
    background:crimson;
    border:none;
    border-radius:6px;
    color:#fff;
    font-weight:bold;
    transition:0.3s;
}

.submit-btn:hover{
    background:#000;
}

</style>

<body>

@include('home.header')

<div class="container">

    {{-- Success Message --}}
    @if(session()->has('message'))
        <div class="alert alert-success text-center" style="max-width:600px; margin:20px auto;">
            {{ session('message') }}
        </div>
    @endif

    <div class="form-wrapper">

        <h2>Add Your Information For Library Card</h2>

        <form action="{{ url('store_create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="input-label">Your Name</label>
            <input type="text" name="title" class="input-field">

            <label class="input-label">Phone Number</label>
            <input type="number" name="phone" class="input-field">

            <label class="input-label">Email Address</label>
            <input type="text" name="email" class="input-field">

            <label class="input-label">Short Description About Reading Book</label>
            <textarea name="description" class="textarea-field"></textarea>

            <label class="input-label">Address</label>
            <input type="text" name="address" class="input-field">

            <label class="input-label">Upload Image</label>
            <input type="file" name="user_img" class="file-field">

            <button type="submit" class="submit-btn">
                Submit Information
            </button>

        </form>
    </div>

</div>

@include('home.footer')

</body>
</html>