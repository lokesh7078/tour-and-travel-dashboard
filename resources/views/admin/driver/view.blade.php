<x-master-layout>

<div class="table-box">

<h2>Driver Details</h2>

<table width="100%" cellpadding="10">
<tr><td>First Name</td><td>{{ $driver->first_name }}</td></tr>
<tr><td>Last Name</td><td>{{ $driver->last_name }}</td></tr>
<tr><td>Email</td><td>{{ $driver->email }}</td></tr>
<tr><td>Contact</td><td>{{ $driver->contact_number }}</td></tr>
<tr><td>Gender</td><td>{{ $driver->gender }}</td></tr>
<tr><td>Vehicle Type</td><td>{{ $driver->vehicle_type }}</td></tr>
<tr><td>Car Model(Year)</td><td>{{ $driver->car_model }} ({{ $driver->car_year }})</td></tr>
<tr><td>Vehicle Number</td><td>{{ $driver->vehicle_number }}</td></tr>
<tr><td>Bank Name</td><td>{{ $driver->bank_name }}</td></tr>
<tr><td>Account HolderName</td><td>{{ $driver->account_holdername }}</td></tr>
<tr><td>Account Number</td><td>{{ $driver->account_number }}</td></tr>
<tr><td>IFSC Code</td><td>{{ $driver->ifsc_code }}</td></tr>
<tr><td>Address</td><td>{{ $driver->address }}</td></tr>
</table>

</div>

</x-master-layout>
