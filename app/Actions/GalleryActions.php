<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class GalleryActions extends ActionsBase
{
    public static function handle(string|null $method = null): View
    {
        self::$color  = self::getColor($method);
        self::$icon = 'bi bi-images';
        self::$title = 'Gallery';
        self::$type = self::getType($method);
        self::$route_search = null;
        self::$route_delete = self::getRoute('/admin/gallery', 'delete');
        self::$route_add = null;
        self::$sub_options = null;

        return self::render();
    }
}
