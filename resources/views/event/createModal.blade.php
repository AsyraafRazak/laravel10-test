<!-- Event Create Modal -->
<div class="modal fade" id="eventCreateModal" tabindex="-1" aria-labelledby="eventCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="eventCreateModalLabel">Create Event</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('event.store') }}">
                    @csrf
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
                        <input type="datetime-local" class="form-control" name="start_time" id="start_time" required>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" class="form-control" name="end_time" id="end_time" required>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                    </div>
                    
                    <div class="mt-2 form-group">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity" required>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
