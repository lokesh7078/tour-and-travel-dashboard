<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Step 3 | Super Ready</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    background:#f4f6f9;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI',sans-serif;
}
.card-box{
    width:100%;
    max-width:500px;
    background:#fff;
    padding:30px;
    border-radius:16px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
}
.btn-theme{
    background:linear-gradient(to right,#ff922b,#2f9e44);
    border:none;
    color:#fff;
}
</style>
</head>
<body>

<div class="card-box">
<h4 class="text-center mb-4">Step 3 - Account Setup</h4>

@if($errors->any())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
</div>
@endif

<form method="POST" action="{{ route('register.complete') }}">
@csrf

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email Address" required>
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>

<div class="mb-3">
<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
</div>

<button type="submit" class="btn btn-theme w-100">Complete Registration</button>
</form>
</div>

</body>
</html>