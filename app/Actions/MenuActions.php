<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class MenuActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-menu-button-wide-fill';
        self::$title        = 'Menus';
        self::$type         = self::getType($method);
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/menus';
        self::$route_add    = '/admin/menus/add';
        self::$sub_options  = null;

        return self::render();
    }
}
