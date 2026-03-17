<x-master-layout>

<style>
.card {
    padding:20px;
    background:#f5f5f5;
    border-radius:10px;
    text-align:center;
    font-size:18px;
    transition:0.3s;
    cursor:pointer;
}
.card:hover {
    transform:scale(1.05);
    background:#e3f2fd;
}
a {
    text-decoration:none;
    color:black;
}
</style>

<div style="padding:30px">

    <h2 style="text-align:center">🇮🇳 Admin Dashboard</h2>

    <!-- ROW 1 -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:30px">

        <a href="{{ route('admin.drivers.index') }}">
            <div class="card">
                Total Drivers<br>
                <b>{{ $data['dashboard']['total_driver'] }}</b>
            </div>
        </a>

        <a href="{{ route('admin.drivers.pending') }}">
        <div class="card">
            Waiting For Approval<br>
            <b>{{ $data['dashboard']['waiting_for_approval'] }}</b>
        </div>
        </a>

        <a href="{{ route('admin.riders') }}">
            <div class="card">
                Total Rider<br>
                <b>{{ $data['dashboard']['total_rider'] }}</b>
            </div>
        </a>

        <a href="{{ route('admin.rides') }}">
            <div class="card">
                Total Rides<br>
                <b>{{ $data['dashboard']['total_rides'] }}</b>
            </div>
        </a>

    </div>

    <!-- ROW 2 -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:30px">

        <a href="{{ route('admin.earnings') }}">
            <div class="card">
                Today Earning<br>
                <b>₹ {{ $data['dashboard']['today_earning'] }}</b>
            </div>
        </a>

        <a href="{{ route('admin.earnings') }}">
            <div class="card">
                Monthly Earning<br>
                <b>₹ {{ $data['dashboard']['monthly_earning'] }}</b>
            </div>
        </a>

        <a href="{{ route('admin.earnings') }}">
            <div class="card">
                Total Earning<br>
                <b>₹ {{ $data['dashboard']['total_earning'] }}</b>
            </div>
        </a>

        <a href="{{ route('admin.complaints') }}">
            <div class="card">
                Complaint<br>
                <b>₹ {{ $data['dashboard']['complaint'] }}</b>
            </div>
        </a>

    </div>

    <!-- ROW 3 -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-top:30px">

        <div class="card">
            Today KM<br>
            <b>{{ $data['dashboard']['today_km'] ?? 0 }}</b>
        </div>

        <div class="card">
            Monthly KM<br>
            <b>{{ $data['dashboard']['monthly_km'] ?? 0 }}</b>
        </div>

        <div class="card">
            Total KM<br>
            <b>{{ $data['dashboard']['total_km'] ?? 0 }}</b>
        </div>

        <div class="card">
            Accident/Incident<br>
            <b>₹ {{ $data['dashboard']['accident_incident'] ?? 0 }}</b>
        </div>

    </div>

    <!-- RECENT RIDES -->
    <div class="card" style="margin-top:40px">
        <h3>Recent Ride Requests</h3>

        <table border="1" width="100%" cellpadding="10">
            <tr>
                <th>#</th>
                <th>Rider</th>
                <th>Date</th>
                <th>Driver</th>
                <th>Status</th>
            </tr>

            @forelse($recent_riderequest ?? [] as $key => $ride)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $ride->rider->name ?? 'N/A' }}</td>
                    <td>{{ $ride->created_at->format('d-m-Y') ?? '' }}</td>
                    <td>{{ $ride->driver->name ?? 'Not Assigned' }}</td>
                    <td>{{ $ride->status ?? 'Pending' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">No Data</td>
                </tr>
            @endforelse
        </table>
    </div>

</div>

</x-master-layout>
