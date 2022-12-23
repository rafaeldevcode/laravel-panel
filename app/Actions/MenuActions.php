<?php

namespace App\Actions;

class MenuActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-menu-button-wide-fill';
        self::$title        = 'Menus';
        self::$type         = self::getType();
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/menus';
        self::$route_add    = '/admin/menus/add';
        self::$sub_options  = null;

        return self::render();
    }
}
