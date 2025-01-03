<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingTypes extends Model
{
    use HasFactory;

    protected $table = 'training_types';

    protected $fillable = [
        'name',
        'description',
        'difficulty_level',
        'duration_in_time',
    ];

    protected $casts = [
        'difficulty_level' => 'string',
        'duration_in_time' => 'integer',
    ];

    public function trainingPrograms()
    {
        return $this->belongsToMany(TrainingPrograms::class, 'program_type', 'type_id', 'program_id');
    }
}
