<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Super Ready</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        .triangle-orange {
            position: absolute;
            top: 0;
            left: 0;
            border-top: 320px solid #ff922b;
            border-right: 320px solid transparent;
        }

        .triangle-green {
            position: absolute;
            bottom: 0;
            right: 0;
            border-bottom: 320px solid #2f9e44;
            border-left: 320px solid transparent;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .login-card img {
            width: 110px;
            margin-bottom: 15px;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
        }

        .btn-login {
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(to right, #ff922b, #2f9e44);
            border: none;
            color: #fff;
            font-weight: 600;
        }

    </style>
</head>
<body>

<div class="triangle-orange"></div>
<div class="triangle-green"></div>

<div class="login-card">

    <img src="{{ asset('images/logo.jpeg') }}" alt="Super Ready">
    <h5>Super Ready Highway Travels Pvt Ltd</h5>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Enter Email"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="mb-3">
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter Password"
                   required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>   
    </form>
     
    <div class="mt-3">
        <a href="{{ route('register.step1') }}">Register</a> |
        <a href="{{ route('forgot.password') }}">Forgot Password</a>
    </div>

</div>
  
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Super Ready</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        /* TRIANGLES */
        .triangle-orange {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-top: 320px solid #ff922b;
            border-right: 320px solid transparent;
        }

        .triangle-green {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border-bottom: 320px solid #2f9e44;
            border-left: 320px solid transparent;
        }

        /* CARD */
        .login-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 16px;
            padding: 35px 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            text-align: center;
            position: relative;
            z-index: 1;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity:0; transform: translateY(10px); }
            to { opacity:1; transform: translateY(0); }
        }

        .login-card img {
            width: 110px;
            margin-bottom: 15px;
        }

        .login-card h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: #ff922b;
            box-shadow: 0 0 0 2px rgba(255,146,43,0.2);
        }

        .btn-login {
            height: 48px;
            border-radius: 10px;
            background: linear-gradient(to right, #ff922b, #2f9e44);
            border: none;
            color: #fff;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .auth-links {
            margin-top: 18px;
            font-size: 14px;
        }

        .auth-links a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: 500;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="triangle-orange"></div>
<div class="triangle-green"></div>

<div class="login-card">

    <img src="{{ asset('images/logo.jpeg') }}" alt="Super Ready">

    <h2>Super Ready Highway Travels Pvt Ltd</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Enter Email"
                   required>
        </div>

        <div class="mb-3">
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter Password"
                   required>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login
        </button>
    </form>

    <div class="auth-links">
        <a href="{{ route('register') }}">Register</a> |
        <a href="{{ route('forgot.password') }}">Forgot Password</a>
    </div>

</div>

</body>
</html> --}}

