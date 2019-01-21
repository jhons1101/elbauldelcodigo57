<?php

namespace elbauldelcodigo\Http\Controllers\Auth;

use elbauldelcodigo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    | Este controlador es responsable de manejar las solicitudes de restablecimiento de contraseña.
    | utiliza un rasgo simple para incluir este comportamiento. Eres libre de
    | explorar este rasgo y anulae cualquier método que desees modificar.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     * Dónde redirigir a los usuarios después de restablecer su contraseña.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \App::setLocale('en');
        $this->middleware('guest');
    }
}
