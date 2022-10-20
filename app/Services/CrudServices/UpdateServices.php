<?php

namespace App\Services\CrudServices;

use App\Models\Menus;
use App\Models\Permissions;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\SessionMessage\SessionMessage;

class UpdateServices extends BaseCrud
{
    /**
     * @param Request $request
     * @return void
     */
    public function updateSettings(Request $request): void
    {
        $settings = Settings::find(1);

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

        SessionMessage::create($request, 'Configurações do site atualizadas com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateProfile(Request $request)
    {
        if(!is_null($request->current_password)):
            if(is_null($request->password) || is_null($request->repeat_password)):

                SessionMessage::create($request, 'Por favor digite sua nova senha ou deixe o campo "senha atual" em branco, caso não queira altera-la!', 'cm-danger');
                return;
            elseif($request->password !== $request->repeat_password):

                SessionMessage::create($request, 'As senhas não conferem, porfavor tente novamente!', 'cm-danger');
                return;
            endif;
        endif;

        $updatePass = !empty($request->password) && !empty($request->current_password) && !empty($request->repeat_password) ? true : false;

        DB::beginTransaction();
            $profile = User::find(Auth::user()->id);
            !is_null($request->name)              && $profile->name = $request->name;
            !is_null($request->phone)             && $profile->phone = $request->phone;
            !is_null($request->birth_date)        && $profile->birth_date = $request->birth_date;
            !is_null($request->permission)        && $profile->permission = $request->permission;
            !is_null($request->initials_campaign) && $profile->campaign = $request->initials_campaign;
            !is_null($request->user_type)         && $profile->user_type = $request->user_type;

            $updatePass == true && $profile->password = Hash::make($request->password);

            $profile->save();
        DB::commit();

        SessionMessage::create($request, 'Perfil Atualizado com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function updateAvatarProfile(Request $request)
    {
        DB::beginTransaction();
            $profile = User::find(Auth::user()->id);
            $profile->avatar = $request->avatar;
            $profile->save();
        DB::commit();

        SessionMessage::create($request, 'Avatar do perfil atualizado com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return mixed
     */
    public function updatePermissions(Request $request, int $ID)
    {
        $permissions = $request->except(['_token', 'name', 'extra_permissions']);
        $permissions = $this->getPermissionsInJson($permissions, $request->extra_permissions);

        DB::beginTransaction();
            $permission = Permissions::find($ID);

            $permission->name        = $request->name;
            $permission->permissions = $permissions['permissions'];
            !is_null($permissions['extra_permissions']) && $permission->extra_permissions = $permissions['extra_permissions'];
            $permission->save();

        DB::commit();

        SessionMessage::create($request, 'Permissões atualizadas com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return mixed
     */
    public function updateUser(Request $request, int $ID)
    {
        if(!is_null($request->password) && $request->password !== $request->repeat_password):

            SessionMessage::create($request, 'As senhas não conferem, porfavor tente novamente!', 'cm-danger');
            return;
        endif;

        DB::beginTransaction();
            $user = User::find($ID);

            $user->name               = $request->name;
            $user->phone              = $request->phone;
            $user->birth_date         = $request->birth_date;
            $user->initials_campaign  = $request->initials_campaign;
            $user->permission_id      = $request->permission;
            $user->user_status        = $request->user_status;

            $request->user_type          !== 'default' && $user->user_type = $request->user_type;
            !is_null($request->password) && $user->password = Hash::make($request->password);

            $user->save();
        DB::commit();

        SessionMessage::create($request, 'Usuário atualizado com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @param int $ID
     * @return mixed
     */
    public function updateMenus(Request $request, int $ID)
    {
        DB::beginTransaction();
            Menus::find($ID)
                ->update([
                    'name'           => $request->name,
                    'slug'           => $request->slug,
                    'icon'           => $request->icon,
                    'position'       => $request->position,
                    'view_dashboard' => $request->name,
                ]);
        DB::commit();

        SessionMessage::create($request, 'Item do menu atualizado com sucesso!', 'cm-success');
    }
}
