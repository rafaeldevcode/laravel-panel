<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menus;
use App\Models\Permissions;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
            $menus = [];
            $permissionsID = [];

            foreach(config('seeders.menus') as $menu):
                $itemMenu = Menus::create([
                    'name'           => $menu['name'],
                    'icon'           => $menu['icon'],
                    'slug'           => $menu['slug'],
                    'position'       => $menu['position'],
                    'prefix'         => $menu['prefix']
                ]);

                array_push($menus, $itemMenu);
            endforeach;

            foreach(config('seeders.permissions') as $permissions):
                $permission = Permissions::create([
                    'name'        => $permissions['name'],
                    'eng_name'    => $permissions['eng_name'],
                    'permissions' => $this->generatePermissions($menus, $permissions['permission'])
                ]);

                array_push($permissionsID, $permission->id);
            endforeach;

            User::create([
                'name'             => config('seeders.user.name'),
                'email'            => config('seeders.user.email'),
                'password'         => Hash::make(config('seeders.user.password')),
                'user_status'      => config('seeders.user.user_status'),
                'permission_id'    => $permissionsID[0]
            ]);

            Settings::create([
                'site_name'        => config('seeders.settings.site_name'),
                'site_description' => config('seeders.settings.site_description'),
                'site_logo'        => config('seeders.settings.site_logo'),
                'site_logo_header' => config('seeders.settings.site_logo_header'),
                'site_favicon'     => config('seeders.settings.site_favicon'),
                'site_bg_login'    => config('seeders.settings.site_bg_login')
            ]);
        DB::commit();
    }

    /**
     * @param array $menus
     * @param string $value
     * @return string
     */
    private function generatePermissions(array $menus, string $value): string
    {
        $keys = [];
        $values = [];

        foreach($menus as $menu):
            array_push($keys, "read_{$menu->prefix}");
            array_push($keys, "create_{$menu->prefix}");
            array_push($keys, "delete_{$menu->prefix}");
            array_push($keys, "update_{$menu->prefix}");

            array_push($values, $value);
            array_push($values, $value);
            array_push($values, $value);
            array_push($values, $value);
        endforeach;

        $combine = array_combine($keys, $values);

        return json_encode($combine);
    }
}
