<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use elbauldelcodigo\General;
use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\TemaPost;
use elbauldelcodigo\RolUser;
use elbauldelcodigo\RolUserUser;
use elbauldelcodigo\User;
use elbauldelcodigo\Http\Requests\StoreThemeRequest;

class ThemeController extends Controller
{
    /**
     * Valida que se haya iniciado sesión para poder acceder a cualquier método
     * del controlador postController
     */

    public function __construct()
    {
        \App::setLocale('en');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $this->middleware('auth');

        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $usuPost    = Auth::user()->id;
        $user       = User::where('id', $usuPost)->get();

        // Si está autenticado... traemos los roles de usuario para mostrar las acciones disponibles
        if (auth()->user()) {
            $usuPost        = Auth::user()->id;
        
            $roles  = DB::table('rol_user_user as r')
                    ->select('r.rol_user_id', 'rs.rol_nombre')
                    ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                    ->where('user_id', $usuPost)
                    ->orderBy('rol_user_id', 'asc')
                    ->get();
        } else {
            $roles = new RolUserUser(); 
        }

        $theme = TemaPost::orderBy('tema_txt', 'asc')
                ->paginate(10);
        
        if (count($theme) < 1) {
            $error = "No hay más resultados para mostrar.";
        } else {
            $error = "";
        }
        
        return View(
            'theme.index', array(
                'alltheme'    => $theme,
                'paginate'    => $theme,
                'user'        => $user[0],
                'msgStatus'   => 1,
                'status'      => 2,
                'errores'     => $error,
                'seccion'     => trans('message.moduleTheme'),
                'roles'       => $roles[0]
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $this->middleware('auth');

        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        // recursos de la pagina
        $usuPost    = Auth::user()->id;
        $user       = User::where('id', $usuPost)->get();

        // traemos los roles de usuario
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();

        return View('theme.create')
        ->with('roles',      $roles[0])
        ->with('seccion',    trans('message.moduleTheme'))
        ->with('user',       $user[0])
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThemeRequest $request)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $theme              =  new TemaPost();
        $theme->tema_txt    =  ucfirst(slugify($request->get('txtTitTheme')));
        $theme->tema_img    =  strtolower($request->get('txtImgTheme'));
        $theme->tema_tag    =  strtolower($request->get('txtTagTheme'));
        $theme->created_at  =  date("Y-m-d H:i:s");
        $theme->updated_at  =  date("Y-m-d H:i:s");

        try {

            $theme->save();

            return  redirect()->route('tema.show',  [ $theme->tema_txt ])
                        ->with('msgStatus',     1)
                        ->with('status',        1)
                        ->with('statusModule',  'msgModuleTheme');
        
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('tema.create')
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'msgModuleTheme');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $txtTheme
     * @return \Illuminate\Http\Response
     */
    public function show($txtTheme)
    {

        $theme = TemaPost::where('tema_txt', $txtTheme)->get();
        
        if (count($theme) < 1) {
            $error = "No hay más resultados para mostrar.";
        } else {
            $error = "";
        }

        $tema = DB::table('posts as p')
                ->select('tm.tema_txt', 'tm.tema_img')
                ->distinct()
                ->join('users as u', 'p.post_usu', '=', 'u.id')
                ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                ->orderBy('tm.tema_txt', 'asc')
                ->get();

        $entradas =  DB::table('posts as p')
                    ->select('p.*', 'u.name', 'tm.tema_txt')
                    ->join('users as u', 'p.post_usu', '=', 'u.id')
                    ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                    ->orderBy('p.post_fec', 'desc')
                    ->get();
        
        $postTheme  = DB::table('tema_posts as t')
                    ->select('p.post_desc', 'u.name', 'p.updated_at', 'p.post_tit', 'p.slug')
                    ->join('posts as p', 'p.post_tema', '=', 't.tema_id')
                    ->join('users as u', 'u.id', '=', 'p.post_usu')
                    ->where('t.tema_txt', $txtTheme)
                    ->where('p.flg_publicar', 1)
                    ->orderBy('p.post_tit', 'asc')
                    ->paginate(10);

        if (count($postTheme) < 1) {
            $errorsPostTheme = "No existen post relacionados para mostrar.";
        } else {
            $errorsPostTheme = "";
        }

        return View(
            'theme.show', array(
                'alltheme'        => $theme[0],
                'paginate'        => $postTheme,
                'entradas'        => $entradas,
                'temas'           => $tema,
                'msgStatus'       => 1,
                'status'          => 2,
                'errores'         => $error,
                'errorsPostTheme' => $errorsPostTheme,
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $themeTxt
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request, $themeTxt)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();
        $themes      = TemaPost::where('tema_txt', $themeTxt)->get();
        $usuarios    = User::orderBy('email', 'asc')->get();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return View('theme.edit')
        ->with('roles',        $roles[0])
        ->with('seccion',      trans('message.moduleTheme'))
        ->with('user',         $user[0])
        ->with('themes',       $themes[0])
        ->with('usuarios',     $usuarios)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $themeTxt
     * @return \Illuminate\Http\Response
     */
    public function update(StoreThemeRequest $request, $themeTxt)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $theme              = TemaPost::where('tema_txt', $themeTxt)->firstOrFail();
        $theme->tema_txt    = ucfirst(slugify($request->get('txtTitTheme')));
        $theme->tema_img    = strtolower($request->get('txtImgTheme'));
        $theme->tema_tag    = strtolower($request->get('txtTagTheme'));
        $theme->updated_at  = date("Y-m-d H:i:s");

        try {

            $theme->save();
            return  redirect()->route('tema.show',  [ $theme->tema_txt ])
                    ->with('msgStatus',     1)
                    ->with('status',        1)
                    ->with('statusModule',  'msgModuleTheme');
            
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('tema.edit',  [ $theme->tema_txt ])
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'msgModuleTheme');
        }
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
