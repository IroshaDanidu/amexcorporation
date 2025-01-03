<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TrainingPrograms extends Model implements HasMedia
{
    use Actionable,
        HasSpatial,
        InteractsWithMedia;


    protected $table = 'training_programs';

    protected $fillable = [
        'name',
        'description',
        'schedule_start',
        'schedule_end',
        'venue',
        'prerequisites',
        'max_participants',
        'status',
        'program_id',
        'is_feature',
    ];

    protected $casts = [
        'schedule_start' => 'datetime',
        'schedule_end' => 'datetime',
    ];

    public function trainingTypes()
    {
        return $this->belongsToMany(TrainingTypes::class, 'program_type', 'program_id', 'type_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover');
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->format('webp');
    }


    public function trainers()
    {
        return $this->belongsToMany(User::class, 'program_trainer', 'program_id', 'user_id');
    }

}
