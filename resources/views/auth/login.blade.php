<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | Liberty Book Place</title>
    @include('home.css')

    <style>
        /* ===== Login Page Design ===== */

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top, #2b2e4a, #0f0f1a);
            padding: 40px 15px;
        }

        .login-card {
            background: #1f2122;
            padding: 40px 35px;
            border-radius: 22px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 60px rgba(116, 83, 252, 0.35);
            text-align: center;
        }

        .login-logo {
            margin-bottom: 20px;
        }

        .login-logo img {
            width: 70px;
        }

        .login-title {
            color: #fff;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .login-subtitle {
            color: #afafaf;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        .login-input {
            width: 100%;
            padding: 11px 16px;
            border-radius: 12px;
            background: #2b2d2f;
            border: 1px solid #3a3a3a;
            color: #fff;
            font-size: 14px;
        }

        .login-input:focus {
            outline: none;
            border-color: #7453fc;
            box-shadow: 0 0 0 2px rgba(116, 83, 252, 0.35);
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 25px;
            color: #afafaf;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .remember-row a {
            color: #7453fc;
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            background: linear-gradient(135deg, #7453fc, #fc53f6);
            border: none;
            color: #0000;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: 0.3s ease;
        }

       

       
        
    </style>
</head>

<body>

@include('home.header')

<div class="login-wrapper">
    <div class="login-card">

        <!-- Logo -->
        <div class="login-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <h4 class="login-title">Welcome Back 👋</h4>
        <p class="login-subtitle">Login to continue exploring books</p>

        <x-guest-layout>

            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="login-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="login-input"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Remember + Forgot -->
                <div class="remember-row">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button type="submit" class="login-btn">
                    Log In
                </button>
            </form>

        </x-guest-layout>

    </div>
</div>

@include('home.footer')

</body>
</html>

