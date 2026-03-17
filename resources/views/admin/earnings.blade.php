<!DOCTYPE html>
<html>
<head>

<title>Earnings Dashboard</title>

<style>

body{
font-family:Arial;
margin:0;
background:#f4f6f9;
}

/* HEADER */

.header{
background:#FF9933;
padding:15px;
color:white;
font-size:22px;
font-weight:bold;
}

.sub-header{
height:5px;
background:#ffffff;
}

.green-line{
height:5px;
background:#138808;
}

/* CONTAINER */

.container{
width:90%;
margin:auto;
margin-top:30px;
}

/* FILTER CARD */

.filter-card{
background:white;
padding:15px;
border-radius:8px;
margin-bottom:20px;
box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

input,button{
padding:8px;
border-radius:5px;
border:1px solid #ccc;
}

button{
background:#FF9933;
color:white;
border:none;
cursor:pointer;
}

/* TOTAL CARD */

.total-card{
background:#138808;
color:white;
padding:20px;
border-radius:8px;
font-size:22px;
margin-bottom:20px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

/* TABLE */

.table-card{
background:white;
padding:20px;
border-radius:8px;
box-shadow:0 2px 8px rgba(0,0,0,0.1);
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

table tr:hover{
background:#f1f1f1;
}

</style>

</head>

<body>

<div class="header">
🇮🇳 Admin Earnings Dashboard
</div>

<div class="sub-header"></div>
<div class="green-line"></div>

<div class="container">

<div class="filter-card">

<form method="GET">

<input type="date" name="date" value="{{ $date }}">

<input type="text" name="search" placeholder="Search Driver / Phone / Vehicle">

<button type="submit">Search</button>

</form>

</div>

<div class="total-card">

Total Earning : ₹ {{ $total }}

</div>

<div class="table-card">

<table>

<tr>
<th>Driver</th>
<th>Phone</th>
<th>Vehicle</th>
<th>Ride Price</th>
<th>Date</th>
</tr>

@foreach($rides as $ride)

<tr>

<td>{{ $ride->driver_name }}</td>
<td>{{ $ride->phone }}</td>
<td>{{ $ride->vehicle_number }}</td>
<td>₹ {{ $ride->price }}</td>
<td>{{ $ride->created_at }}</td>

</tr>

@endforeach

</table>

</div>

</div>

</body>
</html>