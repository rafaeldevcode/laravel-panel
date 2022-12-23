<?php

namespace App\Actions;

class GalleryActions extends ActionsBase
{
    public static function handle()
    {
        self::$color        = self::getColor();
        self::$icon         = 'bi bi-images';
        self::$title        = 'Galeria';
        self::$type         = self::getType();
        self::$search       = null;
        self::$delete       = null;
        self::$route_delete = null;
        self::$route_add    = null;
        self::$sub_options  = 'admin/gallery/partials/sub-options';

        return self::render();
    }
}
