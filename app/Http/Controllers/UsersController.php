<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function index()
    {
        $this->authorize('read', 'users');

        $users = User::paginate(10);

        $method = 'read';

        return view('admin/users/index', compact(
            'method',
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', 'users');

        $users = User::all();
        $permissions = Permission::all();
        $method = 'create';

        return view('admin/users/index', compact(
            'users',
            'permissions',
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
        $this->authorize('create', 'users');

        $create->createUser($request, false, false);

        return redirect('/admin/users');
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
        $this->authorize('update', 'users');

        $user = User::find($ID);
        $permissions = Permission::all();

        $method = 'edit';

        return view('admin/users/index', compact(
            'user',
            'method',
            'permissions'
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
     * @return Response
     */
    public function destroy(Request $request, int $ID, DeleteServices $delete)
    {
        $this->authorize('delete', 'users');

        $delete->deleteUser($request, $ID);

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
        $this->authorize('delete', 'users');

        $delete->deleteSeveralUsers($request);

        return redirect()->back();
    }
}
