<div class="container my-5">
    <form wire:submit.prevent="submit" class="p-4 border rounded bg-light">
        <div class="mb-3">
            <label for="comment" class="form-label fw-bold">Add Comment</label>
            <textarea id="comment" wire:model="comment" class="form-control" rows="4" placeholder="Write your comment here..."></textarea>
            @error('comment') <span class="text-danger small">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

    <h3 class="mt-5">Feedback</h3>
    <ul class="list-group">
        @foreach($feedbacks as $feedback)
            <li class="list-group-item">{{ $feedback->comment }}</li>
        @endforeach
    </ul>
</div>
