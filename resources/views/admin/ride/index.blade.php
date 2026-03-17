    @extends('admin.layout')

@section('content')

<h4 class="mb-4">🚖 Ride Request List</h4>

<div class="card border-0 shadow-sm">
    <div class="card-body">

        {{-- 🔝 Filters --}}
        <form method="GET" action="{{ route('admin.rides') }}">
            <div class="row g-2 mb-3">

                {{-- 📅 Date --}}
                <div class="col-md-3">
                    <input type="date"
                           name="date"
                           value="{{ request('date') }}"
                           class="form-control form-control-sm">
                </div>

                {{-- 🔍 Search --}}
                <div class="col-md-4">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control form-control-sm"
                           placeholder="Search rider / phone / driver">
                </div>

                {{-- 🔥 Quick buttons --}}
                <div class="col-md-5 d-flex gap-2">
                    <button class="btn btn-sm btn-primary">Filter</button>

                    <a href="{{ route('admin.rides') }}"
                       class="btn btn-sm btn-secondary">
                        Reset
                    </a>

                    {{-- ⚡ Quick today --}}
                    <a href="{{ route('admin.rides', ['date' => now()->toDateString()]) }}"
                       class="btn btn-sm btn-success">
                        Today
                    </a>
                </div>

            </div>
        </form>

        {{-- ✅ Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Rider</th>
                        <th>Phone</th>
                        <th>Driver</th>
                        <th>Date Time</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>
                <tbody>

                @forelse($rides as $ride)
                    <tr>
                      <td>
                            {{ method_exists($rides, 'firstItem')
                           ? $rides->firstItem() + $loop->index
                            : $loop->iteration }}
                         </td>
                        <td>{{ $ride->rider_name ?? 'N/A' }}</td>
                        <td>{{ $ride->phone ?? '-' }}</td>
                        <td>{{ $ride->driver_name ?? '-' }}</td>
                        <td>{{ $ride->created_at?->format('d M Y h:i A') }}</td>

                        <td>
                            <span class="badge bg-warning">
                                {{ ucfirst($ride->payment_status ?? 'pending') }}
                            </span>
                        </td>

                        <td>
                            @if($ride->status == 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif($ride->status == 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">Pending</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('admin.rides.show', $ride->id) }}"
                                   class="btn btn-sm btn-primary">
                                           👁
                                      </a>

                            <form action="{{ route('admin.rides.delete', $ride->id) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('Delete this ride?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No Rides Found</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>

        {{-- ✅ Pagination --}}


    </div>
</div>

@endsection
