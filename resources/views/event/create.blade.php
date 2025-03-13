<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Create Event') }}
        </h2>
    </x-slot>
    <div class="bg-gray-700 shadow-sm sm:rounded-lg">
        <div class="px-4 py-3 dark:text-gray-100">
            <div class="card-body">
                <form method="post" action="{{ route('event.store') }}">
                @csrf
                    <div clas="form-row">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Description" required></textarea>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="start_time">Start Time</label>
                            <input type="datetime-local" class="form-control" name="start_time" id="start_time" placeholder="Start Time" required>
                        </div>

                        <div class="mt-2 form-group3">
                            <label for="end_time">End Time</label>
                            <input type="datetime-local" class="form-control" name="end_time" id="end_time" placeholder="End Time" required>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                        </div>
                        
                        <div class="mt-2 form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity" required>
                        </div>

                        <div class="clearfix">
                            <button type="submit" class="mt-4 btn btn-primary" style="float: right;">Submit</button>
                            <a href="/dashboard" class="mt-4 mx-2 btn btn-danger" style="float: right;">Cancel</a>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>