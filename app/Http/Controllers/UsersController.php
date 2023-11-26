<?php

namespace App\Http\Controllers;

use App\Actions\UsersActions;
use App\Models\Permission;
use App\Models\User;
use App\Services\Crud\Create;
use App\Services\Crud\Delete;
use App\Services\Crud\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $this->authorize('read', 'users');

        return view('admin.users.index', [
            'body' => 'read',
            'method' => 'read',
            'users' => User::paginate(10),
            'action' => UsersActions::class,
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', 'users');

        return view('admin.users.index', [
            'body' => 'form',
            'method' => 'create',
            'users' => User::all(),
            'action' => UsersActions::class,
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request, Create $create): RedirectResponse
    {
        $this->authorize('create', 'users');

        $response = $create->user($request, false);

        return redirect()->route($response);
    }

    public function edit(int $ID): View
    {
        $this->authorize('update', 'users');

        return view('admin.users.index', [
            'body' => 'form',
            'method' => 'edit',
            'user' => User::find($ID),
            'action' => UsersActions::class,
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Request $request, int $ID, Update $update): RedirectResponse
    {
        $this->authorize('update', 'users');

        $response = $update->user($request, $ID);

        return redirect($response);
    }

    public function destroy(Request $request, Delete $delete): RedirectResponse
    {
        $this->authorize('delete', 'users');

        $delete->user($request);

        return redirect()->back();
    }
}
