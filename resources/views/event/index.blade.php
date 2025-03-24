<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-light text-center text-md-start">
            {{ __('Event') }}
        </h2>
    </x-slot>
    <div class="bg-dark shadow-sm rounded-lg p-4">
        <div class="text-light">

            <div class="clearfix mb-3">
                <a class="btn btn-success float-end" href="{{ route('event.create') }}">Add Event</a>
            </div>

            <div class="mt-3 card bg-secondary">
                <div class="card-body bg-secondary">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped rounded-3 overflow-hidden">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Location</th>
                                    <th>Capacity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-wrap">{{ $event->title }}</td>
                                    <td class="text-wrap">{{ $event->description }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d') }}<br>
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}<br>
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                    </td>
                                    <td>
                                        <span class="badge {{ now()->lt($event->start_time) ? 'bg-primary' : (now()->between($event->start_time, $event->end_time) ? 'bg-success' : 'bg-danger') }}">
                                            {{ now()->lt($event->start_time) ? 'Upcoming' : (now()->between($event->start_time, $event->end_time) ? 'Ongoing' : 'Ended') }}
                                        </span>
                                    </td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->capacity }}</td>
                                    <td>
                                        <div class="d-flex flex-column flex-sm-row gap-2">
                                            <a class="btn btn-primary btn-sm" href="{{ route('event.edit', $event) }}">Edit</a>
                                            <form action="{{ route('event.destroy', $event) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End Table Responsive -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
F