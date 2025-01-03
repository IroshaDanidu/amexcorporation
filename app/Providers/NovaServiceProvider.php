<?php

namespace App\Providers;

use App\Nova\AdminisrationsResource;
use App\Nova\AttributeResource;
use App\Nova\Auth\Administrator;
use App\Nova\Auth\NovaUserResource;
use App\Nova\Dashboards\Main;
use App\Nova\EmployeesResource;
use App\Nova\NovaTaxonomyResource;
use App\Nova\NovaVocabularyResource;
use App\Nova\Resources\Image;
use App\Nova\Resources\Video;
use App\Nova\SuperAdminResource;
use App\Nova\TagsResource;
use App\Nova\TrainersResource;
use App\Nova\TrainingProgramResource;
use App\Nova\TrainingTypeResource;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request): array {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make('People', [
                    MenuItem::resource(SuperAdminResource::class),
                    MenuItem::resource(User::class),
                ])->icon('user-group')->collapsable(),

                MenuSection::make('Adminisrations', [
                    MenuItem::resource(AdminisrationsResource::class),
                ])->icon('bookmark')->collapsable(),

                MenuSection::make('Employees', [
                    MenuItem::resource(EmployeesResource::class),
                ])->icon('key')->collapsable(),


                MenuSection::make('Trainers', [
                    MenuItem::resource(TrainersResource::class),
                ])->icon('camera')->collapsable(),

                MenuSection::make('Training Programes', [
                    MenuItem::resource(TrainingProgramResource::class),
                ])->icon('play')->collapsable(),

                MenuSection::make('Training Types', [
                    MenuItem::resource(TrainingTypeResource::class),
                ])->icon('paper-clip')->collapsable(),

//                MenuSection::make('Contact', [
//                    MenuItem::resource(ContactResource::class),
//                ])->icon('at-symbol')->collapsable(),
//
//
//                MenuSection::make('Blocks', [
//                    MenuItem::resource(BlockResource::class),
//                ])->icon('key')->collapsable(),
//
//                MenuSection::make('Settings', [
//                    MenuItem::resource(ConditionsAndPolicyResource::class),
//                    MenuSection::make('Settings')
//                        ->path('/settings')
//                ])->icon('cog')->collapsable(),



            ];
        });
        Nova::footer(function () {
            $year = date('Y'); // Get current year
            $version = \Laravel\Nova\Nova::version(); // Get current Nova version
            $businessName = 'Amex corporation'; // Get the business name

            return "<div>
                <p class='mt-8 text-center text-xs text-80'>
                    <a href='https://nova.laravel.com' class='text-primary font-bold dim no-underline'>{$businessName}</a>
                    <span class='px-1'>&middot;</span>
                    &copy; {$year} Amex corporation
                            <span class='px-1'>&middot;</span>
                            v{$version}
                </p>
            </div>";
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
