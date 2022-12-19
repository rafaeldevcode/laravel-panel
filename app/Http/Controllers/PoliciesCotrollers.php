<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PoliciesCotrollers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexPrivacy()
    {
        $settings = Settings::first();

        return view('policies/privacy/index', compact(
            'settings'
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexTerms()
    {
        $settings = Settings::first();

        return view('policies/terms/index', compact(
            'settings'
        ));
    }
}
