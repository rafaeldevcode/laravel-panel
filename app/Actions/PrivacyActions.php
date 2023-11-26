<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class PrivacyActions extends ActionsBase
{
    public static function handle(string|null $method = null): View
    {
        self::$color = self::getColor($method);
        self::$icon = 'bi bi-file-earmark-text-fill';
        self::$title = 'Políticas de Privacidade';
        self::$type = self::getType($method);
        self::$route_search = null;
        self::$route_delete = null;
        self::$route_add = null;
        self::$sub_options = null;

        return self::render();
    }
}
