<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class UsersActions extends ActionsBase
{
    public static function handle(string|null $method = null): View
    {
        self::$color = self::getColor($method);
        self::$icon = 'bi bi-people-fill';
        self::$title = 'Usuários';
        self::$type = self::getType($method);
        self::$route_search = true;
        self::$route_delete = self::getRoute('/admin/users', 'delete');
        self::$route_add = self::getRoute('/admin/users', 'create');
        self::$sub_options = null;

        return self::render();
    }
}
