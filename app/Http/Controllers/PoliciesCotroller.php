<?php

namespace App\Http\Controllers;

use App\Actions\PrivacyActions;
use App\Actions\TermsActions;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PoliciesCotroller extends Controller
{
    public function privacy(): View
    {
        return view('policies.privacy.index', [
            'method' => 'read',
            'settings' => Setting::first(),
            'action' => PrivacyActions::class,
        ]);
    }

    public function terms(): View
    {
        return view('policies.terms.index', [
            'method' => 'read',
            'settings' => Setting::first(),
            'action' => TermsActions::class,
        ]);
    }
}
