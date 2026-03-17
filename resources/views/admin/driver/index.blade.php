<x-master-layout>

<h2>🚗 Driver List</h2>

<div class="table-box">

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Vehicle Type</th>
            <th>Vehicle Number</th>
        </tr>

        @forelse($verifiedDrivers as $driver)
        <tr>
            <td>{{ $driver->first_name }} {{ $driver->last_name }}</td>
            <td>{{ $driver->contact_number }}</td>
            <td>{{ $driver->vehicle_type }}</td>
            <td>{{ $driver->vehicle_number }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align:center;">
                No Verified Drivers Found
            </td>
        </tr>
        @endforelse

    </table>

</div>

</x-master-layout>


{{-- <x-master-layout>

<h2>🚗 Driver Management</h2>

<div style="margin-bottom:20px">
    <button class="tab-btn active" onclick="showTab('verified')">Driver List</button>
    <button class="tab-btn" onclick="showTab('pending')">Pending List</button>
</div>

<!-- VERIFIED -->
<div id="verified" class="table-box">
    <h3>Verified Drivers</h3>

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Vehicle_Type</th>
            <th>Vehicle_Number</th>
        </tr>

        @foreach($verifiedDrivers as $driver)
        <tr>
            <td>{{ $driver->first_name }} {{ $driver->last_name }}</td>
            <td>{{ $driver->contact_number }}</td>
            <td>{{ $driver->vehicle_type }}</td>
            <td>{{ $driver->vehicle_number }}</td>
        </tr>
        @endforeach
    </table>
</div>

<!-- PENDING -->
<div id="pending" class="table-box" style="display:none">
    <h3>Pending Drivers</h3>

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Vehicle_Type</th>
            <th>Vehicle_Number</th>
        </tr>

        @foreach($pendingDrivers as $driver)
        <tr>
            <td>{{ $driver->first_name }} {{ $driver->last_name }}</td>
            <td>{{ $driver->contact_number }}</td>
            <td>{{ $driver->vehicle_type }}</td>
            <td>{{ $driver->vehicle_number }}</td>
            <td>
                <a href="{{ route('admin.driver.view',$driver->id) }}" class="btn-view">
                    View
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<script>
function showTab(type){
    document.getElementById('verified').style.display = 'none';
    document.getElementById('pending').style.display = 'none';

    document.getElementById(type).style.display = 'block';
}
</script>

</x-master-layout> --}}
