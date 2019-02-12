<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \App::setLocale('es');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request->get('lang') != null) {
            \App::setLocale($request->get('lang'));
        } else {
            \App::setLocale('es');
        }

        if(!$this->validateSessionUser($request)){
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $idUser  = Auth::user()->id;
        $user    = User::where('id', Auth::user()->id)->get();

        // traemos los roles de usuario
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $idUser)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return view('home')
                ->with('idUser',   $idUser)
                ->with('user',     $user[0])
                ->with('roles',    $roles[0])
                ->with('seccion',  trans('message.seccionHome'))
                ->with('urlLang',  'home/');
    }

    /**
     * Valia las credenciales de acceso a este controlador
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Boolean
     */
    public function validateSessionUser (request $request) {
        
        if ($request->user()) {
            
            $this->middleware('auth');

            // se autentica los roles del usuario
            if (!$request->user()->authorizeRole(['Admin'])) {
                return false;
            }
        } else {
            return false;
        }
        
        return true;
    }
}
