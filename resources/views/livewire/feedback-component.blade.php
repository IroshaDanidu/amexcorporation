<div class="container mt-5">
    <form wire:submit.prevent="submit" class="mb-4">
        <div class="form-group">
            <label for="role">Name</label>
            <input type="text" id="role" wire:model="role" class="form-control">
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" id="rating" wire:model="rating" min="1" max="5" class="form-control">
            @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="comment">Add Comment</label>
            <textarea id="comment" wire:model="comment" class="form-control"></textarea>
            @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h3>Feedback</h3>
    <ul class="list-group">
        @foreach($feedbacks as $feedback)
            <li class="list-group-item">
                <strong>{{ $feedback->user->name }}</strong> ({{ $feedback->role }}) -
                @for ($i = 0; $i < $feedback->rating; $i++)
                    &#9733;
                @endfor
                @for ($i = $feedback->rating; $i < 5; $i++)
                    &#9734;
                @endfor
                <br>
                {{ $feedback->comments }}
            </li>
        @endforeach
    </ul>
</div>
