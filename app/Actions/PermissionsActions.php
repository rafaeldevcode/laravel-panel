<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class PermissionsActions extends ActionsBase
{
    public static function handle(string|null $method = null): View
    {
        self::$color = self::getColor($method);
        self::$icon = 'bi bi-file-earmark-lock-fill';
        self::$title = 'Permissões';
        self::$type = self::getType($method);
        self::$route_search = true;
        self::$route_delete = self::getRoute('/admin/permissions', 'delete');
        self::$route_add = self::getRoute('/admin/permissions', 'create');
        self::$sub_options = null;

        return self::render();
    }
}
