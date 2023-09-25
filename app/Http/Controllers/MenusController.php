<?php

namespace App\Http\Controllers;

use App\Actions\MenuActions;
use App\Models\Menu;
use App\Services\CrudServices\CreateServices;
use App\Services\CrudServices\DeleteServices;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @return View
     */
    public function index(): View
    {
        $this->authorize('read', 'menus');

        return view('admin.menus.index', [
            'body' => 'read',
            'method' => 'read',
            'menus' => Menu::paginate(10),
            'action' => MenuActions::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create', 'menus');

        return view('admin.menus.index', [
            'body' => 'form',
            'method' => 'create',
            'menus' => Menu::all(),
            'action' => MenuActions::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @param CreateServices $create
     * @return RedirectResponse
     */
    public function store(Request $request, CreateServices $create): RedirectResponse
    {
        $this->authorize('create', 'menus');

        $response = $create->menu($request);

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
        $this->authorize('update', 'menus');

        return view('admin.menus.index', [
            'body' => 'form',
            'method' => 'edit',
            'menu' => Menu::find($ID),
            'action' => MenuActions::class,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param int $ID
     * @param UpdateServices $update
     * @return RedirectResponse
     */
    public function update(Request $request, int $ID, UpdateServices $update): RedirectResponse
    {
        $this->authorize('update', 'menus');

        $update->menu($request, $ID);

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param DeleteServices $delete
     * @return RedirectResponse
     */
    public function destroy(Request $request, DeleteServices $delete): RedirectResponse
    {
        $this->authorize('delete', 'menus');

        $delete->menu($request);

        return redirect()->back();
    }
}
