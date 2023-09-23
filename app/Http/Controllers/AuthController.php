<?php

namespace App\Http\Controllers;

use App\Services\CrudServices\CreateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SessionMessage\SessionMessage;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::check()):

            return redirect('/admin/dashboard');
        endif;

        return view('auth/login');
    }

    /**
     * Perform user login
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $remember = isset($request->remember) ? true : false;

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)):
            $request->session()->regenerate();

            return redirect('/admin/dashboard');
        endif;

        SessionMessage::create($request, 'Senha ou usuário inválidos, porfavor tente novamente!', 'danger');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', 'users');

        return view('auth/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CreateServices $create
     * @return Response
     */
    public function store(Request $request, CreateServices $create)
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
            $create->createUser($request, true, $remember);

            return redirect('/admin/dashboard');
        endif;
    }

    /**
     * Update user password
     *
     * @param Request $request
     * @return Response
     */
    public function resetPassword(Request $request)
    {
        $insert = $request->query()['insert'];

        return view('auth/reset-password', compact('insert'));
    }

    /**
     * Check user email
     *
     * @return Response
     */
    public function verifyEmail()
    {

        return view('auth/verify-email');

    }

    /**
     * Log out user
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
