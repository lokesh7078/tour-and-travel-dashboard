<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password | Super Ready</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* ORANGE TRIANGLE */
        .triangle-orange {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-top: 260px solid #ff922b;
            border-right: 260px solid transparent;
            z-index: 0;
        }

        /* GREEN TRIANGLE */
        .triangle-green {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border-bottom: 260px solid #2f9e44;
            border-left: 260px solid transparent;
            z-index: 0;
        }

        .forgot-card {
            width: 100%;
            max-width: 380px;
            background: #fff;
            border-radius: 12px;
            padding: 30px 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .forgot-card img {
            width: 140px;
            margin-bottom: 10px;
        }

        .forgot-card h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
        }

        .btn-reset {
            height: 45px;
            border-radius: 8px;
            background: linear-gradient(to right, #ff922b, #2f9e44);
            border: none;
            color: #fff;
            font-weight: 600;
        }

        .auth-links {
            margin-top: 15px;
            font-size: 14px;
        }

        .auth-links a {
            text-decoration: none;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<!-- TRIANGLES -->
<div class="triangle-orange"></div>
<div class="triangle-green"></div>

<!-- FORGOT CARD -->
<div class="forgot-card">

    <img src="{{ asset('images/logo.jpeg') }}" alt="Super Ready App">

    <h2>Reset Password</h2>

    <form method="POST" action="/forgot-password">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="New Password" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn btn-reset w-100">
            Reset Password
        </button>
    </form>

    <div class="auth-links">
        <a href="/login">Back to Login</a>
    </div>

</div>

</body>
</html>



{{-- <!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card mx-auto p-4" style="max-width:400px">
<form method="POST" action="/forgot-password">
@csrf

<input class="form-control mb-2" name="email" placeholder="Email" required>
<input class="form-control mb-3" type="password" name="password" placeholder="New Password" required>

<button class="btn btn-warning w-100">Reset Password</button>
</form>
</div>
</div>

</body>
</html> --}}
