<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        // Verificamos si hay sesión activa
        if (Auth::check()){
            // Si tenemos sesión activa mostrará la página de inicio
            return Redirect::to($this->redirectTo);
        }

        return view('adminlte::auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $messages = [
            'username.required' => 'El RUT es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
        ];

        $request->validate([
            $this->username() => ['required', 'regex:/^(\d{7,9}-)([a-zA-Z]{1}$|\d{1}$)/'],
            'password' => 'required|string',
        ], $messages);
    }
}
