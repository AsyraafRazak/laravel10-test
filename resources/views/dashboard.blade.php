<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="bg-gray-700 shadow-sm sm:rounded-lg">
            <div class="p-4 dark:text-gray-100">
                <div class="card-body">
                    <table class="min-w-full table-auto border border-gray-300 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-2 py-2 text-left">#</th>
                                <th class="px-2 py-2 text-left">Title</th>
                                <th class="px-2 py-2 text-left">Description</th>
                                <th class="px-2 py-2 text-left">Date</th>
                                <th class="px-2 py-2 text-left">Time</th>
                                <th class="px-2 py-2 text-left">Status</th>
                                <th class="px-2 py-2 text-left">Location</th>
                                <th class="px-2 py-2 text-left">Capacity</th>
                                <th class="px-2 py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100 text-black">
                            @foreach ($events as $event)
                            <tr class="hover:bg-gray-100">
                                <td class="px-2 py-2">{{ $loop->iteration }}</td>
                                <td class="px-2 py-2">{{ $event->title }}</td>
                                <td class="px-2 py-2">{{ $event->description }}</td>
                                <td class="px-2 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d') }}</td>
                                <td class="px-2 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i A') }}</td>
                                <td class="px-2 py-2">
                                    <span class="px-2 py-1 rounded text-white
                    {{ now()->lt($event->start_time) ? 'bg-blue-500' : (now()->between($event->start_time, $event->end_time) ? 'bg-green-500' : 'bg-red-500') }}">
                                        {{ now()->lt($event->start_time) ? 'Upcoming' : (now()->between($event->start_time, $event->end_time) ? 'Ongoing' : 'Ended') }}
                                    </span>
                                </td>
                                <td class="px-2 py-2">{{ $event->location }}</td>
                                <td class="px-2 py-2">{{ $event->capacity }}</td>
                                <td class="px-2 py-2">
                                    <div class="flex space-x-2">
                                        <a class="no-underline bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600" href="/edit-ticket/{{$event->id}}">Edit</a>
                                        <a class="no-underline bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600" href="/delete-ticket/{{$event->id}}">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>

</x-app-layout>