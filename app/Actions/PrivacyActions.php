<?php

namespace App\Actions;

class PrivacyActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-file-earmark-text-fill';
        self::$title        = 'Políticas de Privacidade';
        self::$type         = self::getType();
        self::$search       = null;
        self::$delete       = null;
        self::$route_delete = null;
        self::$route_add    = null;
        self::$sub_options  = null;

        return self::render();
    }
}
