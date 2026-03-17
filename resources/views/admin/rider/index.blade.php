<x-master-layout>

<div class="container mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            🚖 Riders Management
        </h1>

        <input type="text" id="searchInput"
            placeholder="Search rider..."
            class="border rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Card -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Created</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="riderTable" class="divide-y">

                    @forelse($riders as $key => $rider)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4 font-medium">
                            {{ $key + 1 }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $rider->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $rider->email }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $rider->phone }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $rider->created_at->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            @if($rider->status == 'active')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Active
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                    Blocked
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs">
                                View
                            </button>

                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs">
                                Block
                            </button>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-500">
                            🚫 No Riders Found
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- 🔍 Search Script -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#riderTable tr");

    rows.forEach(row => {
        row.style.display =
            row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

</x-master-layout>
