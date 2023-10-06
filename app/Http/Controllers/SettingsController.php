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
}
