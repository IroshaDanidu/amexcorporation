<?php

namespace App\Nova;

use App\Models\TrainingTypes;
use App\Models\TranningType;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class TrainingTypeResource extends Resource
{
    public static $model = TrainingTypes::class;

    public static $title = 'name';

    public static $search = [
        'name', 'description', 'difficulty_level', 'duration_in_hours'
    ];

    public function fields(Request $request): array
    {

        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable()->rules('required', 'max:255'),
            Text::make('Description')->sortable()->rules('nullable'),
            Select::make('Difficulty Level')->options([
                'Beginner' => 'Beginner',
                'Intermediate' => 'Intermediate',
                'Advanced' => 'Advanced',
            ])->sortable()->rules('required'),
            Number::make('Duration in Time', 'duration_in_time')->sortable()->rules('required', 'integer', 'min:1'),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }

    public static function label()
    {
        return 'Training Types';
    }
}
