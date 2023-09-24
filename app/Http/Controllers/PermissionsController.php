<?php

namespace App\Http\Controllers;

use App\Actions\PermissionsActions;
use App\Models\Menu;
use App\Models\Permission;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @return View
     */
    public function index(): View
    {
        $this->authorize('read', 'permissions');

        return view('admin/permissions/index', [
            'body' => 'read',
            'method' => 'read',
            'action' => PermissionsActions::class,
            'permissions' => Permission::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create', 'permissions');

        return view('admin/permissions/index', [
            'body' => 'form',
            'method' => 'create',
            'menus' => Menu::all(),
            'action' => PermissionsActions::class,
            'permissions' => Permission::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CreateServices $create
     * @return RedirectResponse
     */
    public function store(Request $request, CreateServices $create): RedirectResponse
    {
        $this->authorize('create', 'permissions');

        $create->createPermissions($request);

        return redirect('/admin/permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $ID
     * @return View
     */
    public function edit(int $ID): View
    {
        $this->authorize('update', 'permissions');

        $permissions = Permission::find($ID);

        return view('admin/permissions/index', [
            'body' => 'form',
            'method' => 'edit',
            'menus' => Menu::all(),
            'permissions' => $permissions,
            'action' => PermissionsActions::class,
            'permissions_in_array' => json_decode($permissions->permissions, true),
            'permissions_edit' => $this->getPermisionsEdit($permissions->extra_permissions)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ID
     * @param UpdateServices $update
     * @return RedirectResponse
     */
    public function update(Request $request, int $ID, UpdateServices $update): RedirectResponse
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
     * @return RedirectResponse
     */
    public function destroy(Request $request, int $ID, DeleteServices $delete): RedirectResponse
    {
        $this->authorize('delete', 'permissions');

        $delete->deletePermission($request, $ID);

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
