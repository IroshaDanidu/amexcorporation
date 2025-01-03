<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback;
use App\Models\TrainingPrograms;
use Illuminate\Support\Facades\Auth;

class FeedbackComponent extends Component
{
    public $program;
    public $comment;
    public $rating;
    public $role;

    protected $rules = [
        'comment' => 'required|string|max:500',
        'rating' => 'required|integer|min:1|max:5',
        'role' => 'required|string|max:255',
    ];

    public function mount(TrainingPrograms $program)
    {
        $this->program = $program;
    }

    public function submit()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to submit feedback.');
            return;
        }

        $this->validate();

        Feedback::create([
            'training_id' => $this->program->id,
            'user_id' => Auth::id(),
            'role' => $this->role,
            'rating' => $this->rating,
            'comments' => $this->comment,
        ]);

        $this->reset(['comment', 'rating', 'role']);
        session()->flash('message', 'Feedback submitted successfully.');
    }

    public function render()
    {
        $feedbacks = Feedback::where('training_id', $this->program->id)->with('user')->get();

        return view('livewire.feedback-component', compact('feedbacks'));
    }
}
