<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;

class GalleryActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return View
     */
    public static function handle(string|null $method = null): View
    {
        self::$color  = self::getColor($method);
        self::$icon = 'bi bi-images';
        self::$title = 'Gallery';
        self::$type = self::getType($method);
        self::$route_search = null;
        self::$route_delete = null;
        self::$route_add = null;
        self::$sub_options = null;

        return self::render();
    }
}