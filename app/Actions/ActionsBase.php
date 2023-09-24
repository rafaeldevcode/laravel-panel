<?php

namespace App\Actions;

use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

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
    public static $route_search;

    /**
     * @var null|string
     */
    public static $sub_options;

    /**
     * @return View
     */
    public static function render(): View
    {
        $breadcrumps = self::normalizeBreadcrumps();

        return view('actions/options', [
            'color' => self::$color,
            'icon' => self::$icon,
            'title' => self::$title,
            'type' => self::$type,
            'route_delete' => self::$route_delete,
            'route_add' => self::$route_add,
            'route_search' => self::$route_search,
            'sub_options' => self::$sub_options,
            'breadcrumps' => $breadcrumps[0],
            'ID' => $breadcrumps[1]
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
    protected static function getType(string|null $method): string
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
    protected static function getColor(string|null $method): string
    {
        $color = '';

        switch ($method):
            case 'edit':
                $color = 'primary';
                break;

            case 'read':
                $color = 'secondary';
                break;

            case 'create':
                $color = 'success';
                break;

            default:
                $color = 'secondary';
                break;
        endswitch;

        return $color;
    }

    /**
     * @param string $path
     * @param string $method
     * @return ?string
     */
    protected static function getRoute(string $path, string $method)
    {
        $uri = request()->route()->uri;

        if($method === 'delete'):
            if(Str::contains($uri, 'create') || Str::contains($uri, 'edit')):
                return null;
            else:
                return "{$path}/{$method}";
            endif;
        elseif($method === 'create'):
            if(Str::contains($uri, 'create')):
                return null;
            else:
                return "{$path}/{$method}";
            endif;
        endif;
    }
}
