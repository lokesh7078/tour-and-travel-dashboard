<x-master-layout>

<h2>⏳ Pending Drivers</h2>

<div class="table-box">

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Vehicle Type</th>
            <th>Vehicle Number</th>
            <th>Action</th>
        </tr>

        @forelse($pendingDrivers as $driver)
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
        @empty
        <tr>
            <td colspan="5" style="text-align:center;">
                No Pending Drivers Found
            </td>
        </tr>
        @endforelse

    </table>

</div>

</x-master-layout>



{{-- <x-master-layout>

<h2 style="margin-bottom:20px;">Pending Driver List</h2>

<div class="table-box">
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <thead style="background:#f1f1f1;">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($drivers as $key => $driver)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $driver->first_name ?? $driver->name }}</td>
                    <td>{{ $driver->phone }}</td>
                    <td>
                        <a href="#" class="btn-view">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">No Pending Drivers</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</x-master-layout> --}}
