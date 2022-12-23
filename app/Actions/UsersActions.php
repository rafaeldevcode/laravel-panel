<?php

namespace App\Actions;

class UsersActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-people-fill';
        self::$title        = 'Usuários';
        self::$type         = self::getType();
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/users';
        self::$route_add    = '/admin/users/add';
        self::$sub_options  = null;

        return self::render();
    }
}
