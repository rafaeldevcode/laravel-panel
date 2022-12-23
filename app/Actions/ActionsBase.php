<?php

namespace App\Actions;

class ActionsBase
{
    /**
     * @var string
     */
    public static $color;

    /**
     * @var string
     */
    public static $icon;

    /**
     * @var string
     */
    public static $title;

    /**
     * @var string
     */
    public static $type;

    /**
     * @var null|string
     */
    public static $route_delete;

    /**
     * @var null|string
     */
    public static $route_add;

    /**
     * @var null|bool
     */
    public static $search;

    /**
     * @var null|bool
     */
    public static $delete;

    /**
     * @var null|string
     */
    public static $sub_options;

    /**
     * Renderizar html
     */
    public static function render()
    {
        $breadcrumps = self::normalizeBreadcrumps();

        return view('actions/options', [
            'color'        => self::$color,
            'icon'         => self::$icon,
            'title'        => self::$title,
            'type'         => self::$type,
            'route_delete' => self::$route_delete,
            'route_add'    => self::$route_add,
            'delete'       => self::$delete,
            'search'       => self::$search,
            'sub_options'  => self::$sub_options,
            'breadcrumps'  => $breadcrumps[0],
            'ID'           => $breadcrumps[1]
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

    /**
     * @param string|null $method
     * @return string
     */
    protected static function getType(string|null $method = null): string
    {
        $type = '';

        switch ($method):
            case 'edit':
                $type = 'Editar';
                break;

            case 'read':
                $type = 'Visualizar';
                break;

            case 'create':
                $type = 'Adicionar';
                break;

            default:
                $type = 'Visualizar';
                break;
        endswitch;

        return $type;
    }

    /**
     * @param string|null $method
     * @return string
     */
    protected static function getColor(string|null $method = null): string
    {
        $color = '';

        switch ($method):
            case 'edit':
                $color = 'cm-primary';
                break;

            case 'read':
                $color = 'cm-secondary';
                break;

            case 'create':
                $color = 'cm-success';
                break;

            default:
                $color = 'cm-secondary';
                break;
        endswitch;

        return $color;
    }
}
