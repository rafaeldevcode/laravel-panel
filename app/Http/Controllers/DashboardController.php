<?php

namespace App\Http\Controllers;

use App\Actions\DashboardActions;
use Illuminate\View\View;

class DashboardController extends Controller
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
        $this->authorize('read', 'dashboard');

        return view('admin/dashboard/index', [
            'action' => DashboardActions::class,
            'method' => 'read',
        ]);
    }
}
