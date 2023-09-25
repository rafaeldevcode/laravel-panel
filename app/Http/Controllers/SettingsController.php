<?php

namespace App\Http\Controllers;

use App\Actions\SettingsActions;
use App\Models\Setting;
use App\Services\Crud\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * @return mixed
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(): View
    {
        $this->authorize('update', 'settings');

        $settings = Setting::first();

        return view('admin.settings.index', [
            'method' => 'edit',
            'settings' => $settings,
            'action' => SettingsActions::class,
            'images' => $this->returnPathsImagesOfSettings($settings),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Update $update
     * @return RedirectResponse
     */
    public function update(Request $request, Update $update): RedirectResponse
    {
        $this->authorize('read', 'settings');

        $update->settings($request);

        return redirect()->back();
    }

    /**
     * @param mixed $settings
     * @return array
     */
    private function returnPathsImagesOfSettings(mixed $settings): array
    {
        $site_logo = '/assets/images/logo.png';
        $site_logo_header = '/assets/images/logo_header.png';
        $site_favicon = '/assets/images/favicon.png';
        $site_bg_login = '/assets/images/login_bg.png';

        if($settings->site_logo !== 'logo.png'):
            $site_logo = "/storage/{$settings->site_logo}";
        endif;

        if($settings->site_logo_header !== 'logo_header.png'):
            $site_logo_header = "/storage/{$settings->site_logo_header}";
        endif;

        if($settings->site_favicon !== 'favicon.png'):
            $site_favicon = "/storage/{$settings->site_favicon}";
        endif;

        if($settings->site_bg_login !== 'login_bg.png'):
            $site_bg_login = "/storage/{$settings->site_bg_login}";
        endif;

        return [
            'site_logo'        => $site_logo,
            'site_logo_header' => $site_logo_header,
            'site_favicon'     => $site_favicon,
            'site_bg_login'    => $site_bg_login
        ];
    }
}
