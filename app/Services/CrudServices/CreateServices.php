<?php

namespace App\Services\CrudServices;

use App\Models\Menus;
use App\Models\Notifications;
use App\Models\Permissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\SessionMessage\SessionMessage;

class CreateServices extends BaseCrud
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function createItemMneu(Request $request)
    {
        $slug = "/admin{$this->normalizeSlug($request->slug)}";
        $prefix = $this->normalizeName(explode('/', $request->slug)[1]);

        $slugs = DB::table('menus')
            ->where('slug', $slug)
            ->first();

        $prefixs = DB::table('menus')
            ->where('prefix', $prefix)
            ->first();

            if($slugs):
                SessionMessage::create($request, 'Esta slug já está sendo utilizada, porfavor tente outra!', 'cm-danger');
                return;
            endif;

            if($prefixs):
                SessionMessage::create($request, 'Esta slug já está sendo utilizada, porfavor tente outra!', 'cm-danger');
                return;
            endif;

        DB::beginTransaction();
            Menus::create([
                'name'           => $request->name,
                'icon'           => $request->icon,
                'slug'           => $slug,
                'position'       => $request->position,
                'view_dashboard' => $request->view_dashboard,
                'prefix'         => $prefix
            ]);

            // Adicionar permições para admin
            $this->createPermissionForAdmin($prefix);
        DB::commit();

        SessionMessage::create($request, 'Item adicionado ao menu com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @param bool $auth
     * @param bool $remember
     * @return mixed
     */
    public function createUser(Request $request, bool $auth, bool $remember)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->get();

        if(isset($user[0])):
            SessionMessage::create($request, 'Este email já está em uso, porfavor escolha outro email!', 'cm-danger');
            return;
        endif;

        $phone      = isset($request->phone) && $request->phone;
        $birth_date = isset($request->birth_date) && $request->birth_date;

        DB::beginTransaction();
            $user = User::create([
                'name'               => $request->name,
                'email'              => $request->email,
                'password'           => Hash::make($request->password),
                'permission_id'      => $request->permission,
                'phone'              => $phone,
                'birth_date'         => $birth_date,
                'user_type'          => $request->user_type,
                'user_status'        => $request->user_status,
                'initials_campaign'  => $request->initials_campaign
            ]);

            if($auth):
                Auth::attempt([
                    'email'    => $request->email,
                    'password' => $request->password
                ], $remember);
            endif;

            $notification = Notifications::create([
                'name'                => 'Boas Vindas!',
                'notification'        => "<h2><span style='color: rgb(53, 152, 219);'>Ol&aacute; {$user->name}, seja bem vindo! :)</span></h2><p>O que voc&ecirc; ir&aacute; encontrar por aqui:</p><p><strong>1:&nbsp;</strong>Relat&oacute;rios de ROI de suas campanhas atualizadas de hora em hora;</p><p><strong>2: </strong>Pausar suas campanhas que n&atilde;o est&atilde;o com resultados esperados;</p> <p><strong>3: </strong>Baixar seus relat&oacute;rios;</p><p><strong>4:</strong> E muito mais, isso aqui est&aacute; apenas come&ccedil;ando.</p><p>&nbsp;</p><p><em><strong>Como j&aacute; dizia um autor desconhecido:</strong><br><span style='color: rgb(52, 73, 94);'>'A grande conquista &eacute; o resultado de pequenas vit&oacute;rias que passam despercebidas.'</span></em></p>"
            ]);

            $user->notifications()->attach($notification->id);
            $user->notifications()->update(['notification_status' => 'on']);
        DB::commit();

        if($auth):
            SessionMessage::create($request, "{$request->name}, seja bem vindo!", 'cm-success');
        else:
            SessionMessage::create($request, 'Usuário adicionado ao sistema com sucesso!', 'cm-success');
        endif;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function createPermissions(Request $request)
    {
        $permissions = $request->except(['_token', 'name', 'extra_permissions']);
        $permissions = $this->getPermissionsInJson($permissions, $request->extra_permissions);

        $eng_name =  $this->normalizeName($request->name);

        $permission = DB::table('permissions')
            ->where('eng_name', $eng_name)
            ->get();

            if(isset($permission[0])):
                SessionMessage::create($request, 'O nome desta permissão já está em uso, porfavor escolha outro nome!', 'cm-danger');
                return;
            endif;

            DB::beginTransaction();
                Permissions::create([
                    'name'              => $request->name,
                    'permissions'       => $permissions['permissions'],
                    'extra_permissions' => $permissions['extra_permissions'],
                    'eng_name'          => $eng_name
                ]);
            DB::commit();

        SessionMessage::create($request, 'Permissão adicionada com sucesso!', 'cm-success');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function createNotifications(Request $request): void
    {
        DB::beginTransaction();
            $users = User::all();
            $notification = Notifications::create($request->all());

            foreach($users as $user):
                $user->notifications()->attach($notification->id);
                $user->notifications()->update(['notification_status' => $request->notification_status]);
            endforeach;
        DB::commit();
        SessionMessage::create($request, 'Notificação adicionada com sucesso!', 'cm-success');
    }
}
