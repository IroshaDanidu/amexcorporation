<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feedback as FeedbackModel;

class Feedback extends Component
{
    public $program;
    public $comment;

    protected $rules = [
        'comment' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        FeedbackModel::create([
            'program_id' => $this->program->id,
            'comment' => $this->comment,
        ]);

        $this->comment = '';
    }

    public function render()
    {
        $feedbacks = FeedbackModel::where('program_id', $this->program->id)->get();

        return view('livewire.feedback', ['feedbacks' => $feedbacks]);
    }
}
