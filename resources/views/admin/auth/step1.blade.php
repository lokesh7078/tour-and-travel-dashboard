<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Step 1 | Super Ready</title>
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
<h4 class="text-center mb-4">Step 1 - Personal Details</h4>

@if($errors->any())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
</div>
@endif

<form method="POST" action="{{ route('register.step1') }}">
@csrf

<div class="mb-3">
<input type="text" name="first_name" class="form-control" placeholder="First Name" required>
</div>

<div class="mb-3">
<input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
</div>

<div class="mb-3">
<select name="gender" class="form-control" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>

<div class="mb-3">
<input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
</div>

<button type="submit" class="btn btn-theme w-100">Next</button>
</form>
</div>

</body>
</html>