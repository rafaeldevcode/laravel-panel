<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControllers extends Controller
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
        $this->authorize('read', 'dashboard');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');

        return view('admin/dashboard/index', compact(
            'message',
            'type'
        ));
    }
}
