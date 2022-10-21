<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;

class MenusControllers extends Controller
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
        $this->authorize('read', 'menus');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');
        $menus = Menus::paginate(10);

        $options = [
            'search' => true,
            'delete' => true,
            'add'    => [
                'href' => '/admin/menus/add'
            ]
        ];

        return view('admin/menus/index', compact(
            'options',
            'menus',
            'message',
            'type'
        ));
    }

    /**
     * Method for create item menu
     *
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', 'menus');

        $menus = Menus::all();
        $method = 'add';

        return view('admin/menus/addEdit', compact(
            'menus',
            'method'
        ));
    }

    /**
     * Method for store item menu
     *
     * @param Request $request
     * @param CreateServices $create
     * @return mixed
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'menus');

        $create->createItemMneu($request);

        return redirect('/admin/menus');
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
        $this->authorize('delete', 'menus');

        $delete->deleteMenuItem($request, $ID);

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
        $this->authorize('delete', 'menus');

        $delete->deleteSeveralMenuItem($request);

        return redirect()->back();
    }

    /**
     * @param int $ID
     * @return mixed
     */
    public function update(int $ID)
    {
        $this->authorize('update', 'menus');

        $menu = Menus::find($ID);
        $method = 'edit';

        return view('admin/menus/addEdit', compact(
            'menu',
            'method'
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
        $this->authorize('update', 'menus');

        $update->updateMenus($request, $ID);

        return redirect('/admin/menus');
    }
}
