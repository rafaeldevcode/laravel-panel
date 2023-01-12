<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class SettingsActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-gear-fill';
        self::$title        = 'Configurações';
        self::$type         = self::getType($method);
        self::$search       = null;
        self::$delete       = null;
        self::$route_delete = null;
        self::$route_add    = null;
        self::$sub_options  = null;

        return self::render();
    }
}
