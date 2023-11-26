<?php

namespace App\Http\Controllers;

use App\Actions\MenuActions;
use App\Models\Menu;
use App\Services\Crud\Create;
use App\Services\Crud\Delete;
use App\Services\Crud\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenusController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

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

    public function store(Request $request, Create $create): RedirectResponse
    {
        $this->authorize('create', 'menus');

        $response = $create->menu($request);

        return redirect()->route($response);
    }

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

    public function update(Request $request, int $ID, Update $update): RedirectResponse
    {
        $this->authorize('update', 'menus');

        $update->menu($request, $ID);

        return redirect()->route('menus.index');
    }

    public function destroy(Request $request, Delete $delete): RedirectResponse
    {
        $this->authorize('delete', 'menus');

        $delete->menu($request);

        return redirect()->back();
    }
}
