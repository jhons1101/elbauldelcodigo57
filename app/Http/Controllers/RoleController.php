<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use elbauldelcodigo\User;
use elbauldelcodigo\RolUser;
use elbauldelcodigo\RolUserUser;
use Illuminate\Support\Facades\DB;
use elbauldelcodigo\Http\Requests\StoreRolRequest;


class RoleController extends Controller
{
    /**
     * Valida que se haya iniciado sesión para poder acceder a cualquier método
     * del controlador postController
     */

    public function __construct()
    {
        $this->middleware('auth');
        \App::setLocale('en');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();


        return View('rol.index')
        ->with('seccion',      trans('message.seccionRol'))
        ->with('roles',        $roles[0])
        ->with('user',         $user[0]);
    }

    /**
     * Show the form for creating a new resource.
     * Muestra la vitsa para crear un ROL
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }
        
        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();
        

        // traemos los roles de la DB
        $roleSelects = RolUser::orderBy('rol_nombre', 'asc')->get();
        $usuarios    = User::orderBy('email', 'asc')->get();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return View('rol.create')
        ->with('roles',        $roles[0])
        ->with('roleSelects',  $roleSelects)
        ->with('seccion',      trans('message.seccionRol'))
        ->with('user',         $user[0])
        ->with('usuarios',     $usuarios)
        ;
    }

    /**
     * Store a newly created resource in storage.
     * Almacena un rol en la DB tablas 'rol_users' y 'rol_user_user'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolRequest $request)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        // guardamos el nuevo rol en la tabla 'rol_users'
        $rol              =  new RolUser();
        $rol->rol_nombre  =  $request->get('txtTitrol');
        $rol->rol_descrip =  $request->get('txtdescrol');
        $rol->created_at  =  date("Y-m-d H:i:s");
        $rol->updated_at  =  date("Y-m-d H:i:s");


        try {

            $rol->save();

            if ($request->get('txtUsersList') != null) {

                // guardamos la relación del usuario con el rol en la tabla 'rol_user_user'
                $rolUserUser              =  new RolUserUser();
                $rolUserUser->rol_user_id = $rol->id;
                $rolUserUser->user_id     = $request->get('txtUsersList');
                $rolUserUser->created_at  = date("Y-m-d H:i:s");
                $rolUserUser->updated_at  = date("Y-m-d H:i:s");

                try {

                    $rolUserUser->save();
                    return  redirect()->route('rol.show',  [ $rol->rol_nombre ])
                            ->with('msgStatus',     1)
                            ->with('status',        1)
                            ->with('statusModule',  'moduleRol');

                } catch (\Illuminate\Database\QueryException $ex) {
                    return  redirect()->route('rol.create')
                            ->with('sqlerror',      $ex->errorInfo[2])
                            ->with('msgStatus',     1)
                            ->with('status',        0)
                            ->with('statusModule',  'moduleRol');
                }
            } else {
                return  redirect()->route('rol.show',  [ $rol->rol_nombre ])
                            ->with('msgStatus',     1)
                            ->with('status',        1)
                            ->with('statusModule',  'moduleRol');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('rol.create')
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'moduleRol');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        $usuPost  = Auth::user()->id;
        $user     = User::where('id', $usuPost)->get();
        $objRol   = RolUser::where('rol_nombre', $slug)->get();
        
        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();

        //Listado de usuario que tienen el rol asignado.
        $UserRoles  = DB::table('rol_user_user as r')
                    ->select('r.user_id', 'us.name', 'us.email')
                    ->join('users as us', 'us.id', '=', 'user_id')
                    ->where('rol_user_id', $objRol[0]->id)
                    ->get();
        

        return View('rol.show')
        ->with('seccion',      trans('message.seccionShowRol'))
        ->with('roles',        $roles[0])
        ->with('user',         $user[0])
        ->with('objRol',       $objRol[0])
        ->with('userRoles',    $UserRoles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
