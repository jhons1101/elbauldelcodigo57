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
        $this->middleware('auth');
        \App::setLocale('en');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
                ->with('seccion',  trans('message.seccionHome'));
    }
}
