<?php

namespace App\Services\CrudServices;

use App\Models\Menu;
use App\Models\Notification;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Services\Session;
use Illuminate\Http\Request;

class DeleteServices extends BaseCrud
{
    /**
     * @param Request $request
     * @return void
     */
    public function menu(Request $request): void
    {
        foreach($request->ids as $ID):
            DB::beginTransaction();
                Menu::find($ID)->delete();
            DB::commit();
        endforeach;

        Session::create($request, 'Menu(s) removido(s) com sucesso!', 'success');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function user(Request $request): void
    {
        // Prevent admin user from being deleted
        foreach($request->ids as $ID):
            if($ID == 1):
                $message = 'Um dos usuários é administrador master e não pode ser removido!';
                $type = 'danger';
            else:
                DB::beginTransaction();
                    User::find($ID)->delete();
                DB::commit();

                $message = 'Usuário(s) removido(s) com sucesso!';
                $type = 'success';
            endif;
        endforeach;

        Session::create($request, $message, $type);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function permission(Request $request): void
    {
        foreach($request->ids as $ID):
            // Prevent admin permission from being deleted
            if($ID == 1):
                $message = 'Uma das permissões pertence ao sistema e não pode ser removida!';
                $type = 'danger';
            else:
                DB::beginTransaction();
                    Permission::find($ID)->delete();
                DB::commit();

                $message = 'Permissões removidas com sucesso!';
                $type = 'success';
            endif;
        endforeach;

        Session::create($request, $message, $type);
    }
}
