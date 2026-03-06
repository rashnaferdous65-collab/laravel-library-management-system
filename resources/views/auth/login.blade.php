<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Liberty Book Place</title>

```
@include('home.css')

<style>

    /* ===== Login Page Layout ===== */

    .auth-container{
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        background: radial-gradient(circle at top,#2b2e4a,#0f0f1a);
        padding:40px 20px;
    }

    .auth-box{
        width:100%;
        max-width:420px;
        background:#1f2122;
        padding:40px;
        border-radius:20px;
        box-shadow:0 25px 60px rgba(116,83,252,.35);
        text-align:center;
    }

    .logo-area img{
        width:70px;
        margin-bottom:15px;
    }

    .auth-heading{
        color:#fff;
        font-weight:600;
        margin-bottom:5px;
    }

    .auth-text{
        color:#afafaf;
        font-size:14px;
        margin-bottom:28px;
    }

    .field{
        margin-bottom:18px;
        text-align:left;
    }

    .form-control{
        width:100%;
        padding:11px 15px;
        border-radius:12px;
        background:#2b2d2f;
        border:1px solid #3a3a3a;
        color:#fff;
        font-size:14px;
    }

    .form-control:focus{
        outline:none;
        border-color:#7453fc;
        box-shadow:0 0 0 2px rgba(116,83,252,.35);
    }

    .options{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-size:13px;
        margin-bottom:22px;
        color:#afafaf;
    }

    .options label{
        display:flex;
        align-items:center;
        gap:6px;
    }

    .options a{
        color:#7453fc;
        text-decoration:none;
    }

    .submit-btn{
        width:100%;
        padding:12px;
        border:none;
        border-radius:30px;
        background:linear-gradient(135deg,#7453fc,#fc53f6);
        font-weight:600;
        letter-spacing:.5px;
        color:#000;
        transition:.3s;
    }

    .submit-btn:hover{
        opacity:.9;
    }

</style>
```

</head>

<body>

@include('home.header')

<div class="auth-container">

```
<div class="auth-box">

    <div class="logo-area">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <h4 class="auth-heading">Welcome Back 👋</h4>
    <p class="auth-text">Login to continue exploring books</p>

    <x-guest-layout>

        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="field">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control"
                    :value="old('email')"
                    required autofocus
                />

                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="field">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    required
                />

                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Remember & Forgot -->
            <div class="options">

                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif

            </div>

            <button type="submit" class="submit-btn">
                Login
            </button>

        </form>

    </x-guest-layout>

</div>
```

</div>

@include('home.footer')

</body>
</html>


