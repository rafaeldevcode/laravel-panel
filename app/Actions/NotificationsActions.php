<?php

namespace App\Actions;

class NotificationsActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-bell-fill';
        self::$title        = 'Notificações';
        self::$type         = self::getType();
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/notifications';
        self::$route_add    = '/admin/notifications/add';
        self::$sub_options  = null;

        return self::render();
    }
}
