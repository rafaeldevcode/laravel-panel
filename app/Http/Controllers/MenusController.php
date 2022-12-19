<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenusController extends Controller
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
        $this->authorize('read', 'menus');

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
            'menus'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @param CreateServices $create
     * @return Response
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'menus');

        $create->createItemMneu($request);

        return redirect('/admin/menus');
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
     * @parm int $ID
     * @return Response
     */
    public function edit(int $ID)
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
     * Update the specified resource in storage.
     *
     * @param $request
     * @param int $ID
     * @param UpdateServices $update
     * @return Response
     */
    public function update(Request $request, int $ID, UpdateServices $update)
    {
        $this->authorize('update', 'menus');

        $update->updateMenus($request, $ID);

        return redirect('/admin/menus');
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
        $this->authorize('delete', 'menus');

        $delete->deleteMenuItem($request, $ID);

        return redirect()->back();
    }

    /**
     * Remove the several resource from storage.
     *
     * @param Request $request
     * @param DeleteServices $delete
     * @return Response
     */
    public function destroySeveral(Request $request, DeleteServices $delete)
    {
        $this->authorize('delete', 'menus');

        $delete->deleteSeveralMenuItem($request);

        return redirect()->back();
    }
}
