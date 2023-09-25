<?php

namespace App\Services\Crud;

use App\Events\CreateExtraPermissionForAdmin;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Session;

class Update extends Crud
{
    /**
     * @param Request $request
     * @return void
     */
    public function settings(Request $request): void
    {
        $settings = Setting::find(1);

        DB::beginTransaction();
            $site_logo        = isset($request->site_logo) ? $request->file('site_logo')->store('settings', 'public') : '';
            $site_logo_header = isset($request->site_logo_header) ? $request->file('site_logo_header')->store('settings', 'public') : '';
            $site_favicon     = isset($request->site_favicon) ? $request->file('site_favicon')->store('settings', 'public') : '';
            $site_bg_login    = isset($request->site_bg_login) ? $request->file('site_bg_login')->store('settings', 'public') : '';

            $settings->site_name = $request->site_name;
            $settings->site_description = $request->site_description;
            !empty($site_logo)        && $settings->site_logo = $site_logo;
            !empty($site_logo_header) && $settings->site_logo_header = $site_logo_header;
            !empty($site_favicon)     && $settings->site_favicon = $site_favicon;
            !empty($site_bg_login)    && $settings->site_bg_login = $site_bg_login;
            $settings->save();
        DB::commit();

        Session::create($request, 'Configurações do site atualizadas com sucesso!', 'success');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function profile(Request $request): string
    {
        if(!is_null($request->current_password)):
            if(is_null($request->password) || is_null($request->repeat_password)):

                Session::create($request, 'Por favor digite sua nova senha ou deixe o campo "senha atual" em branco, caso não queira altera-la!', 'danger');
                return 'profile.edit';
            elseif($request->password !== $request->repeat_password):

                Session::create($request, 'As senhas não conferem, porfavor tente novamente!', 'danger');
                return 'profile.edit';
            endif;
        endif;

        if(!empty($request->password) && !empty($request->current_password) && !empty($request->repeat_password)):
            $request->merge(['password' => Hash::make($request->password)]);
        endif;

        DB::beginTransaction();
            User::find(Auth::user()->id)->update($request->all());
        DB::commit();

        Session::create($request, 'Perfil Atualizado com sucesso!', 'success');
        return 'profile.edit';
    }

    /**
     * @param Request $request
     * @return void
     */
    public function avatar(Request $request): void
    {
        DB::beginTransaction();
            User::find(Auth::user()->id)->update(['avatar' => $request->avatar]);
        DB::commit();

        Session::create($request, 'Avatar do perfil atualizado com sucesso!', 'success');
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return void
     */
    public function permissions(Request $request, int $ID): void
    {
        $permissions = $request->except(['_token', 'name', 'extra_permissions']);
        $permissions = $this->getPermissionsInJson($permissions, $request->extra_permissions, $ID);

        $request->merge(['permissions' => $permissions['permissions']]);

        if(!is_null($permissions['extra_permissions'])):
            $request->merge(['extra_permissions' => $permissions['extra_permissions']]);
        endif;

        DB::beginTransaction();
            Permission::find($ID)->update($request->all());

            CreateExtraPermissionForAdmin::dispatch($permissions['extra_permissions']);
        DB::commit();

        Session::create($request, 'Permissões atualizadas com sucesso!', 'success');
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return string
     */
    public function user(Request $request, int $ID): string
    {
        if(!is_null($request->password) && $request->password !== $request->repeat_password):

            Session::create($request, 'As senhas não conferem, porfavor tente novamente!', 'danger');
            return "/admin/users/edit/{$ID}";
        endif;

        if(!is_null($request->password)):
            $request->merge([
                'password' => Hash::make($request->password),
                'permission_id' => $request->permission,
            ]);
        endif;

        DB::beginTransaction();
            User::find($ID)->update($request->all());
        DB::commit();

        Session::create($request, 'Usuário atualizado com sucesso!', 'success');
        return '/admin/users';
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return void
     */
    public function menu(Request $request, int $ID): void
    {
        DB::beginTransaction();
            Menu::find($ID)->update($request->all());
        DB::commit();

        Session::create($request, 'Menu atualizado com sucesso!', 'success');
    }
}
