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
        $this->authorize('read', 'users');

        return view('admin.users.index', [
            'body' => 'read',
            'method' => 'read',
            'users' => User::paginate(10),
            'action' => UsersActions::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Create $create
     * @return RedirectResponse
     */
    public function store(Request $request, Create $create): RedirectResponse
    {
        $this->authorize('create', 'users');

        $response = $create->user($request, false);

        return redirect()->route($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $ID
     * @return View
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $ID
     * @param Update $update
     * @return RedirectResponse
     */
    public function update(Request $request, int $ID, Update $update): RedirectResponse
    {
        $this->authorize('update', 'users');

        $response = $update->user($request, $ID);

        return redirect($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Delete $delete
     * @return RedirectResponse
     */
    public function destroy(Request $request, Delete $delete): RedirectResponse
    {
        $this->authorize('delete', 'users');

        $delete->user($request);

        return redirect()->back();
    }
}
