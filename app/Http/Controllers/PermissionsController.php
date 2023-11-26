<?php

namespace App\Http\Controllers;

use App\Actions\PermissionsActions;
use App\Models\Menu;
use App\Models\Permission;
use App\Services\Crud\Create;
use App\Services\Crud\Delete;
use App\Services\Crud\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $this->authorize('read', 'permissions');

        return view('admin.permissions.index', [
            'body' => 'read',
            'method' => 'read',
            'action' => PermissionsActions::class,
            'permissions' => Permission::paginate(10),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', 'permissions');

        return view('admin.permissions.index', [
            'body' => 'form',
            'method' => 'create',
            'menus' => Menu::all(),
            'action' => PermissionsActions::class,
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request, Create $create): RedirectResponse
    {
        $this->authorize('create', 'permissions');

        $create->permissions($request);

        return redirect('/admin/permissions');
    }

    public function edit(int $ID): View
    {
        $this->authorize('update', 'permissions');

        $permission = Permission::find($ID);

        return view('admin.permissions.index', [
            'body' => 'form',
            'method' => 'edit',
            'menus' => Menu::all(),
            'permission' => $permission,
            'action' => PermissionsActions::class,
            'permissions_in_array' => json_decode($permission->permissions, true),
            'permissions_edit' => $this->getPermisionsEdit($permission->extra_permissions)
        ]);
    }

    public function update(Request $request, int $ID, Update $update): RedirectResponse
    {
        $this->authorize('update', 'permissions');

        $update->permissions($request, $ID);

        return redirect('/admin/permissions');
    }

    public function destroy(Request $request, Delete $delete): RedirectResponse
    {
        $this->authorize('delete', 'permissions');

        $delete->permission($request);

        return redirect()->back();
    }

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
