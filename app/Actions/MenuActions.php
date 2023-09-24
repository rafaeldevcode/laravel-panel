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
        self::$color = self::getColor($method);
        self::$icon = 'bi bi-menu-button-wide-fill';
        self::$title = 'Menus';
        self::$type = self::getType($method);
        self::$route_search = true;
        self::$route_delete = self::getRoute('/admin/menus', 'delete');
        self::$route_add = self::getRoute('/admin/menus', 'create');
        self::$sub_options = null;

        return self::render();
    }
}
