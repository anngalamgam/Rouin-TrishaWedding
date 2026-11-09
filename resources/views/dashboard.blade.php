<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            💒 Wedding RSVP Dashboard
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-gray-500 text-sm">
                        Total Guests
                    </h3>

                    <h1 class="text-4xl font-bold mt-2">
                        {{ $totalGuests }}
                    </h1>
                </div>

                <div class="bg-green-500 text-white shadow rounded-lg p-6">
                    <h3 class="text-sm">
                        Attending
                    </h3>

                    <h1 class="text-4xl font-bold mt-2">
                        {{ $attending }}
                    </h1>
                </div>

                <div class="bg-red-500 text-white shadow rounded-lg p-6">
                    <h3 class="text-sm">
                        Not Attending
                    </h3>

                    <h1 class="text-4xl font-bold mt-2">
                        {{ $notAttending }}
                    </h1>
                </div>

            </div>

            <!-- Search -->
            <div class="mb-6">
                <label for="search" class="sr-only">Search guests</label>
                <input
                    id="search"
                    type="search"
                    placeholder="🔍 Search guest name..."
                    class="w-full md:w-80 rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
            </div>

            <!-- Two Tables -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Attending -->
                <div class="bg-white shadow rounded-lg">

                    <div class="bg-green-500 text-white px-6 py-4 rounded-t-lg flex items-center justify-between gap-3">

                        <h2 class="text-lg font-bold">
                            ✅ Attending Guests ({{ $attending }})
                        </h2>

                        <a href="{{ route('rsvp.export.attending') }}"
                           class="bg-white text-green-700 hover:bg-green-50 font-semibold text-sm px-4 py-2 rounded-lg shadow whitespace-nowrap">
                            ⬇️ Download Excel
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="bg-green-100">
                                <tr>
                                    <th class="px-6 py-3 text-left">#</th>
                                    <th class="px-6 py-3 text-left">Guest Name</th>
                                    <th class="px-6 py-3 text-left">Date</th>
                                </tr>
                            </thead>

                            <tbody id="attendingTable">

                                @forelse($attendingGuests as $guest)

                                    <tr class="border-b">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $guest->guest_name }}</td>
                                        <td class="px-6 py-4">{{ $guest->created_at->format('M d, Y') }}</td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3" class="text-center py-6">
                                            No guests yet.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- Not Attending -->
                <div class="bg-white shadow rounded-lg">

                    <div class="bg-red-500 text-white px-6 py-4 rounded-t-lg">

                        <h2 class="text-lg font-bold">
                            ❌ Not Attending ({{ $notAttending }})
                        </h2>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead class="bg-red-100">
                                <tr>
                                    <th class="px-6 py-3 text-left">#</th>
                                    <th class="px-6 py-3 text-left">Guest Name</th>
                                    <th class="px-6 py-3 text-left">Date</th>
                                </tr>
                            </thead>

                            <tbody id="notAttendingTable">

                                @forelse($notAttendingGuests as $guest)

                                    <tr class="border-b">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $guest->guest_name }}</td>
                                        <td class="px-6 py-4">{{ $guest->created_at->format('M d, Y') }}</td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="3" class="text-center py-6">
                                            No guests yet.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        // Filters rows in both guest tables as you type
        document.getElementById('search').addEventListener('input', function () {

            let value = this.value.toLowerCase();

            document.querySelectorAll('#attendingTable tr, #notAttendingTable tr').forEach(function (row) {
                row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
            });

        });
    </script>

</x-app-layout>