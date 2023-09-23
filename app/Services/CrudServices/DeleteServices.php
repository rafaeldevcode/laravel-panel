<?php

namespace App\Services\CrudServices;

use App\Models\Menu;
use App\Models\Notification;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Services\SessionMessage\SessionMessage;
use Illuminate\Http\Request;

class DeleteServices extends BaseCrud
{
    /**
     * @param int $ID
     * @param Request $request
     * @return void
     */
    public function deleteMenuItem(Request $request, int $ID): void
    {
        DB::beginTransaction();
            Menu::find($ID)->delete();
        DB::commit();

        SessionMessage::create($request, 'Item removido com sucesso!', 'success');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function deleteSeveralMenuItem(Request $request): void
    {
        DB::beginTransaction();
            foreach($request->ids as $ID):
                Menu::find($ID)->delete();
            endforeach;
        DB::commit();

        SessionMessage::create($request, 'Todos os items foram removido com sucesso!', 'success');
    }

    /**
     * @param int $ID
     * @param Request $request
     * @return void
     */
    public function deleteUser(Request $request, int $ID): void
    {
        // Imperdir que usuário admin seja excluido
        if($ID == 1):
            SessionMessage::create($request, 'Este é um usuário do sistema, não pode ser excluido!', 'danger');
            return;
        endif;

        DB::beginTransaction();
            $user = User::find($ID);

            $user->delete();
        DB::commit();

        SessionMessage::create($request, 'Usuário removido com sucesso!', 'success');
    }

    /**
     * @param array $IDs
     * @param Request $request
     * @return void
     */
    public function deleteSeveralUsers(Request $request): void
    {
        // Imperdir que usuário admin seja excluido
        if(in_array(1, $request->ids)):
            SessionMessage::create($request, 'Existe um usuário do sistema na lista para excluir, este não pode ser excluido!', 'danger');
            return;
        endif;

        DB::beginTransaction();
            foreach($request->ids as $ID):
                $user = User::find($ID);

                $user->delete();
            endforeach;
        DB::commit();

        SessionMessage::create($request, 'Todos os usuários foram removido com sucesso!', 'success');
    }

    /**
     * @param int $ID
     * @param Request $request
     * @return void
     */
    public function deletePermission(Request $request, int $ID): void
    {
        // Imperdir que que a permição admin seja excluida
        if($ID == 1):
            SessionMessage::create($request, 'Este é uma permissão do sistema, não pode ser excluida!', 'danger');
            return;
        endif;

        DB::beginTransaction();
            Permission::find($ID)->delete();
        DB::commit();

        SessionMessage::create($request, 'Permição removida com sucesso!', 'success');
    }

    /**
     * @param array $IDs
     * @param Request $request
     * @return void
     */
    public function deleteSeveralPermission(Request $request): void
    {
        // Imperdir que que a permição admin seja excluida
        if(in_array(1, $request->ids)):
            SessionMessage::create($request, 'Existe uma permição do sistema na lista para excluir, esta não pode ser excluida!', 'danger');
            return;
        endif;

        DB::beginTransaction();
            foreach($request->ids as $ID):
                Permission::find($ID)->delete();
            endforeach;
        DB::commit();

        SessionMessage::create($request, 'Todas as permições foram removido com sucesso!', 'success');
    }
}
