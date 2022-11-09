<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Permissions;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;

class PermissionsControllers extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $this->authorize('read', 'permissions');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');
        $permissions = Permissions::paginate(10);

        $options = [
            'search' => true,
            'delete' => true,
            'add'    => [
                'href' => '/admin/permissions/add'
            ]
        ];

        return view('admin/permissions/index', compact(
            'options',
            'permissions',
            'message',
            'type'
        ));
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', 'permissions');

        $permissions = Permissions::all();
        $menus = Menus::all();
        $method = 'add';

        return view('admin/permissions/addEdit', compact(
            'permissions',
            'menus',
            'method'
        ));
    }

    /**
     * @param Request $request
     * @param CreateServices $create
     * @return mixed
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'permissions');

        $create->createPermissions($request);

        return redirect('/admin/permissions');
    }

    /**
     * Method for delete item menu
     *
     * @param Request $request
     * @param int $ID
     * @param DeleteServices $delete
     * @return mixed
     */
    public function delete(Request $request, int $ID, DeleteServices $delete)
    {
        $this->authorize('delete', 'permissions');

        $delete->deletePermission($request, $ID);

        return redirect()->back();
    }

    /**
     * Method for delete several item menu
     *
     * @param Request $request
     * @param DeleteServices $delete
     * @return mixed
     */
    public function deleteSeveral(Request $request, DeleteServices $delete)
    {
        $this->authorize('delete', 'permissions');

        $delete->deleteSeveralPermission($request);

        return redirect()->back();
    }

    /**
     * @param int $ID
     * @return mixed
     */
    public function update(int $ID)
    {
        $this->authorize('update', 'permissions');

        $permissions = Permissions::find($ID);
        $permissions_in_array = json_decode($permissions->permissions, true);
        $permissions_edit = $this->getPermisionsEdit($permissions->extra_permissions);
        $menus = Menus::all();
        $method = 'edit';

        return view('admin/permissions/addEdit', compact(
            'permissions',
            'menus',
            'permissions_in_array',
            'method',
            'permissions_edit'
        ));
    }

    /**
     * @param Request $request
     * @param int $ID
     * @param UpdateServices $update
     * @return mixed
    */
    public function updateStore(Request $request, int $ID, UpdateServices $update)
    {
        $this->authorize('update', 'permissions');

        $update->updatePermissions($request, $ID);

        return redirect('/admin/permissions');
    }

    /**
     * @param string $extra_permissions
     * @return string|null
     */
    private function getPermisionsEdit(string|null $extra_permissions): string
    {
        if($extra_permissions):
            $permissions = [];
            $permissions_edit = json_decode($extra_permissions, true);

            foreach($permissions_edit as $indice => $permission):
                array_push($permissions, "{$indice}={$permission}");
            endforeach;

            return implode(',', $permissions);
        else:
            return '';
        endif;
    }
}
