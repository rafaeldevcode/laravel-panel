<?php

namespace App\Actions;

class DashboardActions extends ActionsBase
{
    public static function handle()
    {
        self::$color       = 'cm-secondary';
        self::$icon        = 'bi bi-speedometer';
        self::$title       = 'Dashboard';
        self::$type        = 'Visualizar';
        self::$options     = null;
        self::$route       = null;

        return self::render();
    }
}
