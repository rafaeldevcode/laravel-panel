<?php

namespace App\Actions;

class PermissionsActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-file-earmark-lock-fill';
        self::$title        = 'Permissões';
        self::$type         = self::getType();
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/permissions';
        self::$route_add    = '/admin/permissions/add';
        self::$sub_options  = null;

        return self::render();
    }
}
