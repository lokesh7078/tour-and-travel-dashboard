<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register Step 2 | Super Ready</title>
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
<h4 class="text-center mb-4">Step 2 - Bank Details</h4>

@if($errors->any())
<div class="alert alert-danger">
@foreach($errors->all() as $error)
<div>{{ $error }}</div>
@endforeach
</div>
@endif

<form method="POST" action="{{ route('register.step2') }}">
@csrf


<div class="mb-3">
<input type="text"
name="aadhaar_card"
maxlength="12"
pattern="\d{12}"
oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,12)"
class="form-control"
placeholder="Enter Aadhaar Number">
</div>



<div class="mb-3">
<input type="text"
name="account_number"
maxlength="17"
oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,17)"
class="form-control"
placeholder="Enter Account Number">
</div>



<div class="mb-3">
<input type="text"
name="ifsc_code"
class="form-control"
style="text-transform:uppercase"
placeholder="Enter IFSC Code">
</div>



<div class="mb-3">
<select name="bank_name" class="form-control">
<option value="">Select Bank</option>

<option>State Bank of India</option>
<option>HDFC Bank</option>
<option>ICICI Bank</option>
<option>Punjab National Bank</option>
<option>Axis Bank</option>
<option>Bank of Baroda</option>
<option>Union Bank of India</option>
<option>Canara Bank</option>
<option>Indian Bank</option>
<option>Central Bank of India</option>
<option>UCO Bank</option>
<option>Yes Bank</option>
<option>IDFC First Bank</option>
<option>Kotak Mahindra Bank</option>
<option>IndusInd Bank</option>

</select>
</div>

<div class="mb-3">
<input type="text" name="account_holder_name" class="form-control" placeholder="Account Holder Name" required>
</div>

<button type="submit" class="btn btn-theme w-100">Next</button>
</form>
</div>

</body>
</html>