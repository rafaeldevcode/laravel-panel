<?php

namespace App\Http\Controllers;

use App\Services\Crud\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if(Auth::check()):

            return redirect()->route('dashboard');
        endif;

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $remember = isset($request->remember) ? true : false;

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)):
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        endif;

        Session::create($request, 'Senha ou usuário inválidos, porfavor tente novamente!', 'danger');

        return redirect()->back();
    }

    public function create(): View
    {
        $this->authorize('create', 'users');

        return view('auth.create');
    }

    public function store(Request $request, Create $create): RedirectResponse
    {
        $this->authorize('create', 'users');

        $remember = isset($request->remember) ? true : false;

        if($request->password !== $request->confirm_password):
            $this->createMessageSession($request, [
                'message' => 'Senhas não conferem, porfavor tente novamente!',
                'status'  => 'danger'
            ]);

            return redirect()->back();
        else:
            $create->user($request, $remember);

            return redirect()->route('dashboard');
        endif;
    }

    public function resetPassword(Request $request): View
    {
        return view('auth.reset-password', [
            'insert' => $request->insert,
        ]);
    }

    public function verifyEmail(): View
    {
        return view('auth.verify-email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
