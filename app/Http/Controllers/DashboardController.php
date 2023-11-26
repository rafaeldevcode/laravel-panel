<?php

namespace App\Http\Controllers;

use App\Actions\DashboardActions;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $this->authorize('read', 'dashboard');

        return view('admin.dashboard.index', [
            'action' => DashboardActions::class,
            'method' => 'read',
        ]);
    }
}
