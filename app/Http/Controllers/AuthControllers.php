<?php

namespace App\Http\Controllers;

use App\Services\CrudServices\CreateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SessionMessage\SessionMessage;

class AuthControllers extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        if(Auth::check()):

            return redirect('/admin/dashboard');
        endif;

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');

        return view('auth/login', compact(
            'message',
            'type'
        ));
    }

    /**
     * @param Request $request
     * @return mixed
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

        SessionMessage::create($request, 'Senha ou usuário inválidos, porfavor tente novamente!', 'cm-danger');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $this->authorize('create', 'users');

        $message = $request->session()->get('message');
        $type = $request->session()->get('type');

        return view('auth/create', compact(
            'message',
            'type'
        ));
    }

    /**
     * @param Request $request
     * @param CreateServices $create
     * @return mixed
     */
    public function store(Request $request, CreateServices $create)
    {
        $this->authorize('create', 'users');

        $remember = isset($request->remember) ? true : false;

        if($request->password !== $request->confirm_password):
            $this->createMessageSession($request, [
                'message' => 'Senhas não conferem, porfavor tente novamente!',
                'status'  => 'cm-danger'
            ]);

            return redirect()->back();
        else:
            $create->createUser($request, true, $remember);

            return redirect('/admin/dashboard');
        endif;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function resetPassword(Request $request)
    {
        $insert = $request->query()['insert'];

        return view('auth/reset-password', compact('insert'));
    }

    public function verifyEmail()
    {
        $metas_config = [
            'title'       => 'Verificar meu email',
            'description' => ''
        ];

        return view('auth/verify-email', compact('metas_config'));

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
