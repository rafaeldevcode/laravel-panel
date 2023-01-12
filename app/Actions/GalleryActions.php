<?php

namespace App\Actions;

class GalleryActions extends ActionsBase
{
    /**
     * @param string|null $method
     * @return void
     */
    public static function handle(string|null $method = null)
    {
        self::$color        = self::getColor($method);
        self::$icon         = 'bi bi-images';
        self::$title        = 'Galeria';
        self::$type         = self::getType($method);
        self::$search       = null;
        self::$delete       = null;
        self::$route_delete = null;
        self::$route_add    = null;
        self::$sub_options  = 'admin/gallery/partials/sub-options';

        return self::render();
    }
}
