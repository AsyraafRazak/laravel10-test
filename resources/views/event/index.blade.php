<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4 text-light text-center text-md-start">
            {{ __('Event') }}
        </h2>
    </x-slot>
    <div class="bg-dark shadow-sm rounded-lg p-4">
        <div class="text-light">

            <div class="clearfix mb-3">
                <a class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#eventCreateModal"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>

            <div class="mt-3 card bg-secondary">
                <div class="card-body bg-secondary">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped rounded-3 overflow-hidden">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Location</th>
                                    <th class="text-center">Capacity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-wrap text-center">{{ $event->title }}</td>
                                    <td class="text-wrap text-center">{{ $event->description }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d') }}<br>
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d') }}
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}<br>
                                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ now()->lt($event->start_time) ? 'bg-primary' : (now()->between($event->start_time, $event->end_time) ? 'bg-success' : 'bg-danger') }}">
                                            {{ now()->lt($event->start_time) ? 'Upcoming' : (now()->between($event->start_time, $event->end_time) ? 'Ongoing' : 'Ended') }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $event->location }}</td>
                                    <td class="text-center">{{ $event->capacity }}</td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column flex-sm-row gap-2">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#eventEditModal" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <form action="{{ route('event.destroy', $event) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @include('event.createModal')
                            @include('event.editModal')
                        </table>
                    </div> <!-- End Table Responsive -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
F