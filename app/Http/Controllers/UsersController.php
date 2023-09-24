<?php

namespace App\Http\Controllers;

use App\Actions\UsersActions;
use App\Models\Permission;
use App\Models\User;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
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

        return view('admin/users/index', [
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

        return view('admin/users/index', [
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
     * @param CreateServices $create
     * @return RedirectResponse
     */
    public function store(Request $request, CreateServices $create): RedirectResponse
    {
        $this->authorize('create', 'users');

        $create->createUser($request, false, false);

        return redirect('/admin/users');
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

        return view('admin/users/index', [
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
     * @param UpdateServices $update
     * @return RedirectResponse
     */
    public function update(Request $request, int $ID, UpdateServices $update): RedirectResponse
    {
        $this->authorize('update', 'users');

        $update->updateUser($request, $ID);

        return redirect('/admin/users');
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
        $this->authorize('delete', 'users');

        $delete->deleteUser($request, $ID);

        return redirect()->back();
    }
}
