<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';

    protected $fillable = [
        'training_id',
        'user_id',
        'role',
        'rating',
        'comments',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingProgram()
    {
        return $this->belongsTo(TrainingProgram::class, 'training_id');
    }
}
