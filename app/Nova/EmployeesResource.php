<?php

namespace App\Nova;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Illuminate\Validation\Rules;
use Laravel\Nova\Http\Requests\NovaRequest;

class EmployeesResource extends Resource
{
    public static $model = User::class;

    public static $title = 'id';

    public static $search = [
        'name', 'email', 'role'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Gravatar::make()->maxWidth(50),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

            Text::make('Role')
                ->sortable()
                ->rules('required', 'max:255')
                ->default('Employees'),

            Text::make('Phone','phone_number')->sortable()->rules('required', 'max:255'),

            Text::make('Address','address')->sortable()->rules('required', 'max:255'),

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
        return 'Employees';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('role', 'Employees');
    }


}
