<?php

namespace App\Services\Crud;

use App\Models\Permission;

class Crud
{
    public function normalizeName(string $name): string
    {
        $name = strtolower($name);
        $name = str_replace(' ', '_', $name);
        $name = str_replace('-', '_', $name);
        $name = preg_replace(["/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"], explode(" ","a A e E i I o O u U n N c C"), $name);

        return $name;
    }

    protected function getPermissionsInJson(array $permissions, ?string $extra_permissions, int|null $ID = null): array
    {
        $extra_permissions_array = [];
        $extra_permissions_json = !is_null($ID) ? json_decode(Permission::find($ID)->get()[0]->extra_permissions, true) : [];

        // Formatar as permissões extras
        if(!is_null($extra_permissions)):
            $extra_permissions = explode(',', $extra_permissions);

            foreach($extra_permissions as $permission):

                $permission = explode('=', $permission);
                array_push($extra_permissions_array, [$permission[0] => $permission[1]]);
            endforeach;

            for ($i = 0; $i < count($extra_permissions_array) ; $i++):

                $permissions = array_merge($permissions, $extra_permissions_array[$i]);
                $extra_permissions_json = array_merge($extra_permissions_json, $extra_permissions_array[$i]);
            endfor;
        endif;

        $extra_permissions_json = empty($extra_permissions) ? null : json_encode($extra_permissions_json);

        return [
            'permissions' => json_encode($permissions),
            'extra_permissions' => $extra_permissions_json,
        ];
    }

    protected function getSubmenus(null|string $submenus, array $new_submenu): string
    {
        if(is_null($submenus)):
            $submenus = $new_submenu;
        else:
            $submenus = json_decode($submenus, true);
            $submenus = $submenus + $new_submenu;
        endif;

        return json_encode($submenus);
    }
}
