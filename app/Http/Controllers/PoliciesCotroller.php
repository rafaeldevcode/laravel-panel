<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PoliciesCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexPrivacy()
    {
        $settings = Setting::first();

        $method = 'read';

        return view('policies/privacy/index', compact(
            'settings',
            'method'
        ));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexTerms()
    {
        $settings = Setting::first();

        $method = 'read';

        return view('policies/terms/index', compact(
            'settings',
            'method'
        ));
    }
}
