<?php

namespace App\Http\Controllers;

use App\Actions\ProfileActions;
use App\Models\Permission;
use App\Services\Crud\Update;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function edit(): View
    {
        $user = Auth::user();

        return view('admin.profile.index', [
            'user' => $user,
            'method' => 'edit',
            'action' => ProfileActions::class,
            'user_permission' => Permission::find($user->permission_id)->name,
        ]);
    }

    public function update(Request $request, Update $update): RedirectResponse
    {
        $response = $update->profile($request);

        return redirect()->route($response);
    }

    public function updateAvatar(Request $request, Update $update): RedirectResponse
    {
        $update->avatar($request);

        return redirect()->back();
    }
}
