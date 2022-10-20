<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\User;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;

class UsersControllers extends Controller
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
        $this->authorize('read', 'users');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');
        $users = User::all();

        $options = [
            'search' => true,
            'delete' => true,
            'add'    => [
                'href' => '/admin/users/add'
            ]
            ];

        return view('admin/users/index', compact(
            'options',
            'users',
            'message',
            'type'
        ));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $this->authorize('create', 'users');

        $users = User::all();
        $permissions = Permissions::all();
        $method = 'add';

        return view('admin/users/addEdit', compact(
            'users',
            'permissions',
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
        $this->authorize('create', 'users');

        $create->createUser($request, false, false);

        return redirect('/admin/users');
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
        $this->authorize('delete', 'users');

        $delete->deleteUser($request, $ID);

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
        $this->authorize('delete', 'users');

        $delete->deleteSeveralUsers($request);

        return redirect()->back();
    }

    /**
     * @param int $ID
     * @return mixed
     */
    public function update(int $ID)
    {
        $this->authorize('update', 'users');

        $user = User::find($ID);
        $permissions = Permissions::all();

        $method = 'edit';

        return view('admin/users/addEdit', compact(
            'user',
            'method',
            'permissions'
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
        $this->authorize('update', 'users');

        $update->updateUser($request, $ID);

        return redirect('/admin/users');
    }
}
