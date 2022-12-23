<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permission;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionsController extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('read', 'permissions');

        $permissions = Permission::paginate(10);

        $method = 'read';

        return view('admin/permissions/index', compact(
            'method',
            'permissions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', 'permissions');

        $permissions = Permission::all();
        $menus = Menu::all();
        $method = 'create';

        return view('admin/permissions/index', compact(
            'permissions',
            'menus',
            'method'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CreateServices $create
     * @return Response
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'permissions');

        $create->createPermissions($request);

        return redirect('/admin/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $ID
     * @return Response
     */
    public function edit(int $ID)
    {
        $this->authorize('update', 'permissions');

        $permissions = Permission::find($ID);
        $permissions_in_array = json_decode($permissions->permissions, true);
        $permissions_edit = $this->getPermisionsEdit($permissions->extra_permissions);
        $menus = Menu::all();
        $method = 'edit';

        return view('admin/permissions/index', compact(
            'permissions',
            'menus',
            'permissions_in_array',
            'method',
            'permissions_edit'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ID
     * @param UpdateServices $update
     * @return Response
     */
    public function update(Request $request, int $ID, UpdateServices $update)
    {
        $this->authorize('update', 'permissions');

        $update->updatePermissions($request, $ID);

        return redirect('/admin/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $ID
     * @param DeleteServices $delete
     * @return Response
     */
    public function destroy(Request $request, int $ID, DeleteServices $delete)
    {
        $this->authorize('delete', 'permissions');

        $delete->deletePermission($request, $ID);

        return redirect()->back();
    }

    /**
     * Remove the several resource from storage.
     *
     * @param Request $request
     * @param DeleteServices $delete
     * @return mixed
     */
    public function destroySeveral(Request $request, DeleteServices $delete)
    {
        $this->authorize('delete', 'permissions');

        $delete->deleteSeveralPermission($request);

        return redirect()->back();
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
