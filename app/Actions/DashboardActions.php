<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class DashboardActions extends ActionsBase
{
    public static function handle(string|null $method = null): View
    {
        self::$color  = self::getColor($method);
        self::$icon = 'bi bi-speedometer';
        self::$title = 'Dashboard';
        self::$type = self::getType($method);
        self::$route_search = null;
        self::$route_delete = null;
        self::$route_add = null;
        self::$sub_options = null;

        return self::render();
    }
}
