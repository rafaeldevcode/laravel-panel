<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class NotificationsActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-bell-fill';
        self::$title        = 'Notificações';
        self::$type         = self::getType($method);
        self::$search       = true;
        self::$delete       = true;
        self::$route_delete = '/admin/delete/several/notifications';
        self::$route_add    = '/admin/notifications/add';
        self::$sub_options  = null;

        return self::render();
    }
}
