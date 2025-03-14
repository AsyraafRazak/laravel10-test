<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>
    <div class="bg-gray-700 shadow-sm sm:rounded-lg">
        <div class="px-4 py-3 dark:text-gray-100">
            <div class="card-body">
                <form method="post" action="{{ route('event.update', $event) }}">
                @csrf
                @method('PUT')
                    <div clas="form-row">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{$event->title}}"required>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Description" required>{{$event->description}}</textarea>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="start_time">Start Time</label>
                            <input type="datetime-local" class="form-control" name="start_time" id="start_time" placeholder="Start Time" value="{{$event->start_time}}" required>
                        </div>

                        <div class="mt-2 form-group3">
                            <label for="end_time">End Time</label>
                            <input type="datetime-local" class="form-control" name="end_time" id="end_time" placeholder="End Time" value="{{$event->end_time}}" required>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{$event->location}}" required>
                        </div>
                        
                        <div class="mt-2 form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity" value="{{$event->capacity}}" required>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="mt-4 btn btn-primary" style="float: right;">Submit</button>
                            <a href="{{ route('event.index') }}" class="mt-4 mx-2 btn btn-danger" style="float: right;">Cancel</a>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>