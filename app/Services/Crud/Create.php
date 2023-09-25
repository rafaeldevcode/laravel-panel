<?php

namespace App\Services\Crud;

use App\Events\CreateExtraPermissionForAdmin;
use App\Events\CreatePermissionForAdmin;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Session;
use App\Services\Slug;

class Create extends Crud
{
    /**
     * @param Request $request
     * @return string
     */
    public function menu(Request $request): string
    {
        if(isset($request->is_submenu) && $request->is_submenu == 'on'):
            $menu = Menu::find($request->submenu);
            $slug = Slug::normalize($request->slug);
            $submenus = $this->getSubmenus($menu->submenus, [$slug => $request->name]);

            $menu->update(['submenus' => $submenus]);

            Session::create($request, 'Submenu adicionado com sucesso!', 'success');

            return 'menus.index';
        endif;

        $slug = Slug::normalize($request->slug);
        $prefix = $this->normalizeName(explode('/', $request->slug)[1]);

        $slug_count = Menu::where('slug', $slug)->count();
        $prefix_count =Menu::where('prefix', $prefix)->count();

        if($slug_count > 0):
            Session::create($request, 'Esta slug já está sendo utilizada, porfavor tente outra!', 'danger');
            return 'menus.create';
        endif;

        if($prefix_count > 0):
            Session::create($request, 'Esta slug já está sendo utilizada, porfavor tente outra!', 'danger');
            return 'menus.create';
        endif;

        $request->merge(['slug' => $slug, 'prefix' => $prefix]);

        DB::beginTransaction();
            Menu::create($request->all());

            // Add permissions for admin
            CreatePermissionForAdmin::dispatch($prefix);
        DB::commit();

        Session::create($request, 'Item adicionado ao menu com sucesso!', 'success');
        return 'menus.index';
    }

    /**
     * @param Request $request
     * @param bool $remember
     * @return string
     */
    public function user(Request $request, bool $remember): string
    {
        $count_user = User::where('email', $request->email)->count();

        if($count_user > 0):
            Session::create($request, 'Este email já está em uso, porfavor escolha outro email!', 'danger');
            return 'users.create';
        endif;

        if($request->password !== $request->repeat_password):
            Session::create($request, 'As senhas digitadas não conferem!', 'danger');
            return 'users.create';
        endif;

        $request->merge([
            'password' => Hash::make($request->password),
            'permission_id' => $request->permission
        ]);

        DB::beginTransaction();
            User::create($request->all());
        DB::commit();

        if(!auth()):
            Auth::attempt([
                'email'    => $request->email,
                'password' => $request->password
            ], $remember);

            Session::create($request, "{$request->name}, seja bem vindo!", 'success');
        else:
            Session::create($request, 'Usuário adicionado ao sistema com sucesso!', 'success');
        endif;

        return 'users.index';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function permissions(Request $request): string
    {
        $permissions = $request->except(['_token', 'name', 'extra_permissions']);
        $permissions = $this->getPermissionsInJson($permissions, $request->extra_permissions);

        $eng_name =  $this->normalizeName($request->name);
        $permission_count = Permission::where('eng_name', $eng_name)->count();

        if($permission_count > 0):
            Session::create($request, 'O nome desta permissão já está em uso, porfavor escolha outro nome!', 'danger');
            return 'permissions.create';
        endif;

        $request->merge([
            'eng_name' => $eng_name,
            'permissions' => $permissions['permissions'],
            'extra_permissions' => $permissions['extra_permissions'],
        ]);

        DB::beginTransaction();
            Permission::create($request->all());

            CreateExtraPermissionForAdmin::dispatch($permissions['extra_permissions']);
        DB::commit();

        Session::create($request, 'Permissão adicionada com sucesso!', 'success');
        return 'permissions.index';
    }
}
