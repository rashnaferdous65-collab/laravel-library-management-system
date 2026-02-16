<!DOCTYPE html>
<html>
@include('admin.css')

<style>
    .form-wrapper {
        max-width: 550px;
        padding: 25px;
    }

    .form-title {
        color: #ffffff;
        margin-bottom: 25px;
    }

    .input-field,
    .textarea-field,
    .file-field {
        width: 100%;
        background: #1f2933;
        border: 1px solid #374151;
        border-radius: 6px;
        color: #ffffff;
        padding: 10px;
        margin-bottom: 15px;
    }

    .input-field:focus,
    .textarea-field:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 5px #4f46e5;
        outline: none;
    }

    .textarea-field {
        min-height: 90px;
        resize: none;
    }

    .submit-btn {
        padding: 10px 25px;
        background: crimson;
        border: none;
        border-radius: 6px;
        color: #ffffff;
        font-weight: bold;
        cursor: pointer;
    }

    .submit-btn:hover {
        background: #000000;
    }

    .reader-img {
        width: 80px;
        border-radius: 50%;
        margin-bottom: 15px;
    }
</style>

<body>

@include('admin.header')
@include('admin.slidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">

            <div class="form-wrapper">

                <h2 class="form-title">Update Reader Information</h2>

                <form action="{{ url('update_reader', $data->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <label>Name</label>
                    <input type="text" 
                           name="title" 
                           value="{{ $data->title }}" 
                           class="input-field">

                    <label>Phone</label>
                    <input type="number" 
                           name="phone" 
                           value="{{ $data->phone }}" 
                           class="input-field">

                    <label>Email</label>
                    <input type="text" 
                           name="email" 
                           value="{{ $data->email }}" 
                           class="input-field">

                    <label>Description</label>
                    <textarea name="description" 
                              class="textarea-field">{{ $data->description }}</textarea>

                    <label>Address</label>
                    <input type="text" 
                           name="address" 
                           value="{{ $data->address }}" 
                           class="input-field">

                    <label>Current Image</label><br>
                    <img src="{{ asset('user_images/'.$data->user_img) }}" 
                         class="reader-img">

                    <label>Change Image</label>
                    <input type="file" 
                           name="user_img" 
                           class="file-field">

                    <br><br>
                    <input type="submit" 
                           value="Update Reader Details" 
                           class="submit-btn">

                </form>

            </div>

        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
