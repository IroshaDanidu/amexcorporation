<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NewPrograme;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\Trainingtypes;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            (new NewUsers)->help('This metric shows the number of new users.'),
            (new NewPrograme())->help('This metric shows the number of Programes.'),
            (new Trainingtypes())->help('This metric shows the number of Training types.'),
        ];
    }
}
