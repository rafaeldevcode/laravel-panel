<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\Permissions;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

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
    * Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $user_permission = Permissions::find($user->permission_id)->name;
        $status = [UserStatus::getColor($user->user_status), UserStatus::getMessage($user->user_status)];

        return view('admin/profile/index', compact(
            'user',
            'user_permission',
            'status'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UpdateServices $update
     * @return Response
     */
    public function update(Request $request, UpdateServices $update)
    {
        $update->updateProfile($request);

        return redirect('/admin/profile/edit');
    }

    /**
     *  Update avatar of the specified user in storage.
     *
     * @param Request $request
     * @param UpdateServices $update
     * @return Response
     */
    public function updateAvatar(Request $request, UpdateServices $update)
    {
        $update->updateAvatarProfile($request);

        return redirect()->back();
    }
}
