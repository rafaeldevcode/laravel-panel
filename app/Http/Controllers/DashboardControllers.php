<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('read', 'dashboard');

        return view('admin/dashboard/index');
    }
}
