<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class UsersActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-people-fill';
        self::$title        = 'Usuários';
        self::$type         = self::getType($method);
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/users';
        self::$route_add    = '/admin/users/add';
        self::$sub_options  = null;

        return self::render();
    }
}
