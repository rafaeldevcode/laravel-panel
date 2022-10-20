<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliciesCotrollers extends Controller
{
    /**
     * @return mixed
     */
    public function privacy()
    {
        $settings = DB::table('settings')->first();

        return view('policies/privacy/index', compact(
            'settings'
        ));
    }

    /**
     * @return mixed
     */
    public function terms()
    {
        $settings = DB::table('settings')->first();

        return view('policies/terms/index', compact(
            'settings'
        ));
    }
}
