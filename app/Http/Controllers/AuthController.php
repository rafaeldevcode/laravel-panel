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
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        if(Auth::check()):

            return redirect()->route('dashboard');
        endif;

        return view('auth.login');
    }

    /**
     * Perform user login
     *
     * @param Request $request
     * @return RedirectResponse
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return View
     */
    public function create(): View
    {
        $this->authorize('create', 'users');

        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Create $create
     * @return RedirectResponse
     */
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

    /**
     * Update user password
     *
     * @param Request $request
     * @return View
     */
    public function resetPassword(Request $request): View
    {
        return view('auth.reset-password', [
            'insert' => $request->insert,
        ]);
    }

    /**
     * Check user email
     *
     * @return View
     */
    public function verifyEmail(): View
    {
        return view('auth.verify-email');
    }

    /**
     * Log out user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
