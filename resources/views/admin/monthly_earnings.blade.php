<!DOCTYPE html>
<html>
<head>

<title>Monthly Earnings</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

.header{
background:linear-gradient(90deg,#FF9933,#ffffff,#138808);
padding:20px;
text-align:center;
font-size:24px;
font-weight:bold;
}

.container{
width:90%;
margin:auto;
margin-top:30px;
}

.card{
background:white;
padding:20px;
border-radius:8px;
margin-bottom:20px;
box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.total{
background:#138808;
color:white;
padding:15px;
font-size:22px;
text-align:center;
border-radius:8px;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#FF9933;
color:white;
padding:10px;
}

table td{
padding:10px;
border-bottom:1px solid #ddd;
text-align:center;
}

</style>

</head>

<body>

<div class="header">🇮🇳 Monthly Earnings</div>

<div class="container">

<div class="card">

<form method="GET">

<input type="month" name="month">

<input type="text" name="search" placeholder="Driver / Phone / Vehicle">

<button type="submit">Search</button>

</form>

</div>

<div class="total">

Monthly Total Earnings : ₹ {{ $total }}

</div>

<div class="card">

<table>

<tr>
<th>Driver</th>
<th>Phone</th>
<th>Vehicle</th>
<th>Amount</th>
<th>Date</th>
</tr>

@foreach($rides as $ride)

<tr>

<td>{{ $ride->driver_name }}</td>
<td>{{ $ride->phone }}</td>
<td>{{ $ride->vehicle_number }}</td>
<td>₹ {{ $ride->amount }}</td>
<td>{{ $ride->created_at }}</td>

</tr>

@endforeach

</table>

</div>

</div>

</body>
</html>