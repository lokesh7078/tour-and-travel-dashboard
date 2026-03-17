@extends('admin.layout')

@section('content')

<div class="row">

    {{-- LEFT --}}
    <div class="col-md-8">

        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="mb-3">Ride Request <span class="float-end">#{{ $ride->id }}</span></h5>

                <h6 class="fw-bold">Pickup Address</h6>
                <p>{{ $ride->pickup_address ?? 'N/A' }}</p>

                <h6 class="fw-bold">Drop Address</h6>
                <p>{{ $ride->drop_address ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Payment</h5>

                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>Payment Method</span>
                    <strong>{{ $ride->payment_method ?? 'Cash' }}</strong>
                </div>

                <div class="d-flex justify-content-between py-2">
                    <span>Amount</span>
                    <strong>{{ $ride->amount ?? '-' }}</strong>
                </div>
            </div>
        </div>

    </div>

    {{-- RIGHT --}}
    <div class="col-md-4">

        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5>Rider Detail</h5>
                <p class="mb-1"><strong>{{ $ride->rider_name ?? 'N/A' }}</strong></p>
                <p class="mb-1">{{ $ride->phone ?? '-' }}</p>
                <p class="mb-0">{{ $ride->email ?? '-' }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Service Detail</h5>
                <p class="mb-0">Electric Bike</p>
            </div>
        </div>

    </div>

</div>

@endsection
