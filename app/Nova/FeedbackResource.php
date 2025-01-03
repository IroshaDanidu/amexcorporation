<?php

namespace App\Nova;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class FeedbackResource extends Resource
{
    public static $model = Feedback::class;

    public static $title = 'id';

    public static $search = [
        ''
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            //comment
            Text::make('Comment')
                ->sortable()
                ->rules('required', 'max:255'),

            //rating
            Number::make('Rating')
                ->sortable()
                ->rules('required', 'integer', 'min:1', 'max:5'),

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
}
