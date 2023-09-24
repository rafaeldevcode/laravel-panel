<?php

namespace App\Http\Controllers;

use App\Actions\ProfileActions;
use App\Models\Permission;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
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
        $user = Auth::user();

        return view('admin/profile/index', [
            'user' => $user,
            'method' => 'edit',
            'action' => ProfileActions::class,
            'user_permission' => Permission::find($user->permission_id)->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UpdateServices $update
     * @return RedirectResponse
     */
    public function update(Request $request, UpdateServices $update): RedirectResponse
    {
        $update->updateProfile($request);

        return redirect('/admin/profile/edit');
    }

    /**
     *  Update avatar of the specified user in storage.
     *
     * @param Request $request
     * @param UpdateServices $update
     * @return RedirectResponse
     */
    public function updateAvatar(Request $request, UpdateServices $update): RedirectResponse
    {
        $update->updateAvatarProfile($request);

        return redirect()->back();
    }
}
