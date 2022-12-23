<?php

namespace App\Actions;

class ActionsBase
{
    /**
     * @var string $color
     */
    public static $color;

    /**
     * @var string $icon
     */
    public static $icon;

    /**
     * @var string $title
     */
    public static $title;

    /**
     * @var string $type
     */
    public static $type;

    /**
     * @var null|array $options
     */
    public static $options;

    /**
     * @var null|string $route
     */
    public static $route;

    public static function render()
    {
        $breadcrumps = self::normalizeBreadcrumps();

        return view('actions/breadcrumps', [
            'color'       => self::$color,
            'icon'        => self::$icon,
            'title'       => self::$title,
            'type'        => self::$type,
            'options'     => self::$options,
            'route'       => self::$route,
            'breadcrumps' => $breadcrumps[0],
            'ID'          => $breadcrumps[1]
        ]);
    }

    /**
     * @return array
     */
    protected static function normalizeBreadcrumps(): array
    {
        $breadcrumps_normalize = [];
        $breadcrumps = request()->route();
        $ID = isset($breadcrumps->parameters['ID']) ? $breadcrumps->parameters['ID'] : null;

        $breadcrumps = explode('/', $breadcrumps->uri);

        if(in_array('{ID}', $breadcrumps)):
            unset($breadcrumps[count($breadcrumps)-1]);
        endif;

        foreach($breadcrumps as $breadcrump):
            if(empty($breadcrumps_normalize)):
                $slug = "{$breadcrump}";
                array_push($breadcrumps_normalize, [
                    "name" => $breadcrump,
                    "slug" =>$slug
                ]);
            else:
                $slug = "{$breadcrumps_normalize[count($breadcrumps_normalize)-1]['slug']}/{$breadcrump}";
                array_push($breadcrumps_normalize, [
                    "name" => $breadcrump,
                    "slug" =>$slug
                ]);
            endif;
        endforeach;

        return [$breadcrumps_normalize, $ID];
    }
}
