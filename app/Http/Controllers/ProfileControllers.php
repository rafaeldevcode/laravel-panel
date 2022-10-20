<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Services\CrudServices\UpdateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileControllers extends Controller
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
        $message = $request->session()->get('message');
        $type = $request->session()->get('type');
        $user = Auth::user();
        $user_permission = Permissions::find($user->permission_id)->name;

        return view('admin/profile/index', compact(
            'user',
            'message',
            'type',
            'user_permission'
        ));
    }

    /**
     * @param Request $request
     * @param UpdateServices $update
     * @return mixed
     */
    public function store(Request $request, UpdateServices $update)
    {
        $update->updateProfile($request);

        return redirect('/admin/profile/edit');
    }

    /**
     * @param Request $request
     * @param UpdateServices $update
     * @return mixed
     */
    public function updateAvatar(Request $request, UpdateServices $update)
    {
        $update->updateAvatarProfile($request);

        return redirect()->back();
    }
}
