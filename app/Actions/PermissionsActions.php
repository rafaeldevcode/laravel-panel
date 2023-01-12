<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class PermissionsActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-file-earmark-lock-fill';
        self::$title        = 'Permissões';
        self::$type         = self::getType($method);
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/permissions';
        self::$route_add    = '/admin/permissions/add';
        self::$sub_options  = null;

        return self::render();
    }
}
