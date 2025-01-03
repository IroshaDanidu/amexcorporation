<?php

namespace App\Nova;

use App\Models\TrainingPrograms;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Outl1ne\MultiselectField\Multiselect;
use Stepanenko3\NovaMediaField\Fields\Media;

class TrainingProgramResource extends Resource
{
    public static $model = TrainingPrograms::class;

    public static $title = 'name';

    public static $search = [
        'name', 'description', 'schedule_start', 'schedule_end', 'venue', 'status'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable()->rules('required', 'max:255'),
            Text::make('Description')->sortable()->rules('nullable'),
            DateTime::make('Schedule Start')->sortable()->rules('required', 'date'),
            DateTime::make('Schedule End')->sortable()->rules('required', 'date'),
            Text::make('Venue')->sortable()->rules('required', 'max:255'),
            Text::make('Prerequisites')->sortable()->rules('nullable'),
            Number::make('Max Participants')->sortable()->rules('required', 'integer', 'min:1')->default(20),
            Select::make('Status')->options([
                'Scheduled' => 'Scheduled',
                'Ongoing' => 'Ongoing',
                'Completed' => 'Completed',
                'Cancelled' => 'Cancelled',
            ])->sortable()->rules('required')->default('Scheduled'),

            Panel::make('Media', [
                Media::make('Cover Image', 'cover'),
                Media::make('Gallery Images', 'gallery')->hideFromIndex(),
            ]),

            Panel::make('Select Training Types', [
            Multiselect::make('Training Types','trainingTypes')
                ->belongsToMany(\App\Nova\TrainingTypeResource::class)
                ->hideFromIndex(),
            ]),

            Panel::make('Select Trainers', [
                Multiselect::make('Trainers', 'trainers')
                    ->belongsToMany(\App\Nova\TrainersResource::class)
                    ->hideFromIndex(),
            ]),


            Select::make('Is Feature', 'is_feature')->options([
                '1' => 'Yes',
                '0' => 'No',
            ])->sortable()->rules('required')->default('0'),
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
        return 'Training Programs';
    }
}
