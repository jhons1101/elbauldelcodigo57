<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use elbauldelcodigo\Http\Requests\UpdateBlogRequest;
use elbauldelcodigo\Http\Requests\StoreBlogRequest;

use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\User;
use elbauldelcodigo\Blogs;
use elbauldelcodigo\RolUser;
use elbauldelcodigo\RolUserUser;
use elbauldelcodigo\TemaPost;

class BlogController extends Controller
{
    /**
     * Valida que se haya iniciado sesión para poder acceder a cualquier método
     * del controlador postController
     */

    public function __construct()
    {
        \App::setLocale('es');
    }


    /**
     * Display a listing of the resource.
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
        
        $blog   = Blogs::BuscarEnBlog($request->get('buscar'))
                ->where('flg_publicar' , 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        

        $leido  = Blogs::where('flg_publicar' , 1)->orderBy('views', 'desc')->paginate(5);
        
        return View(
            'blog.index', array(
                'blogs'       => $blog,
                'topLeido'    => $leido,
                'paginate'    => $blog,
                'buscar'      => $request->get('buscar'),
                'msgStatus'   => 1,
                'status'      => 2
            )
        )
        ->with('urlLang',      'blog/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
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

        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();
        $usuarios    = User::orderBy('email', 'asc')->get();
        $tagsBlog    = TemaPost::orderBy('tema_txt', 'asc')->get();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return View('blog.create')
        ->with('seccion',      trans('message.newBlog'))
        ->with('moduleSeccion',trans('message.moduleBlog'))
        ->with('user',         $user[0])
        ->with('usuarios',     $usuarios)
        ->with('tagsBlog',     $tagsBlog)
        ->with('roles',        $roles[0])
        ->with('urlLang',      'blog/create')
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {

        if(!$this->validateSessionUser($request)){
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }
        
        $blog               =  new Blogs();
        $itemTag            =  '';
        $txtTags            =  $request->get('txtTagsBlog');

        $blog->title        =  ucfirst(strtolower($request->get('txtTitblog')));
        $blog->text         =  htmlentities ($request->get('textareaBlog'), ENT_QUOTES);
        $blog->id_usu       =  Auth::user()->id;
        $blog->slug         =  strtolower(slugify($request->get('txtTitblog')));

        foreach ($txtTags as $key => $tag) {
            $itemTag .= $tag. ',';
        }

        if ($request->get('txtPubBlog') == 'on'){
            $txtPubBlog = 1;
        } else {
            $txtPubBlog = 0;
        }

        if ($request->hasfile('imageBlog')) {
            $file   = $request->file('imageBlog');
            $name   = strtolower(slugify($request->get('txtTitblog'))).'.jpg';
            $file->move(public_path().'/img/blog/', $name);
        }
        
        $blog->tags_blog    =  substr($itemTag, 0, -1);
        $blog->image        =  $name;
        $blog->preview      =  substr(strip_tags($request->get('textareaBlog')), 0, 396).'...';
        $blog->views        =  1;
        $blog->flg_publicar =  $txtPubBlog;
        $blog->created_at   =  date("Y-m-d H:i:s");
        $blog->updated_at   =  date("Y-m-d H:i:s");

        try {

            $blog->save();

            return  redirect()->route('blog.index',  [ $blog->slug ])
                        ->with('msgStatus',     1)
                        ->with('status',        1)
                        ->with('statusModule',  'msgModuleBLog');
        
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('blog.create')
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'msgModuleBLog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(request $request, $slug)
    {

        if ($request->get('lang') != null) {
            \App::setLocale($request->get('lang'));
        } else {
            \App::setLocale('es');
        }
        
        $blog        = Blogs::where('slug', $slug)->firstOrFail();
        $leido       = Blogs::where('flg_publicar' , 1)->orderBy('views', 'desc')->paginate(5);

        $tags        = explode(',', $blog->tags_blog);
        $tagsBlog    = TemaPost::whereIn('tema_id', $tags)->orderBy('tema_txt', 'asc')->get();
        $userBlog    = User::where('id', $blog->id_usu)->firstOrFail();

        // Actualizamos el contador de visitas del blog
        $blog->views        = $blog->views + 1;
        $blog->updated_at   =  date("Y-m-d H:i:s");
        $blog->save();
        
        return View('blog.show')
        ->with('blog',        $blog)
        ->with('tagsBlog',    $tagsBlog)
        ->with('topLeido',    $leido)
        ->with('userBlog',    $userBlog)
        ->with('urlLang',     'blog/'.$blog->slug)
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request, $slug)
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

        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();
        $usuarios    = User::orderBy('email', 'asc')->get();
        $tagsBlog    = TemaPost::orderBy('tema_txt', 'asc')->get();
        $blog        = Blogs::where('slug', $slug)->firstOrFail();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return View('blog.edit')
        ->with('blog',         $blog)
        ->with('seccion',      trans('message.editBlog'))
        ->with('moduleSeccion',trans('message.moduleBlog'))
        ->with('user',         $user[0])
        ->with('usuarios',     $usuarios)
        ->with('tagsBlog',     $tagsBlog)
        ->with('roles',        $roles[0])
        ->with('urlLang',      'blog/'.$blog->slug.'/edit')
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $slug)
    {
        if(!$this->validateSessionUser($request)){
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }
        
        $blog              = Blogs::where('slug', $slug)->firstOrFail();
        $itemTag           = '';
        $txtTags           = $request->get('txtTagsBlog');

        $blog->title       = $request->get('txtTitblog');
        $blog->text        = htmlentities ($request->get('textareaBlog'), ENT_QUOTES);
        $blog->id_usu      = Auth::user()->id;

        foreach ($txtTags as $key => $tag) {
            $itemTag .= $tag. ',';
        }

        if ($request->hasfile('imageBlog')) {
            $file   = $request->file('imageBlog');
            $name   = strtolower(slugify($request->get('txtTitblog'))).'.jpg';
            $file->move(public_path().'/img/blog/', $name);
            $blog->image        =  $name;
        }

        if ($request->get('txtPubBlog') == 'on'){
            $txtPubBlog = 1;
        } else {
            $txtPubBlog = 0;
        }

        $blog->preview      =  substr(strip_tags($request->get('textareaBlog')), 0, 396).'...';
        $blog->flg_publicar =  $txtPubBlog;
        $blog->tags_blog    =  substr($itemTag, 0, -1);
        $blog->updated_at   =  date("Y-m-d H:i:s");
        
        try {

            $blog->save();

            return  redirect()->route('blog.show',  [ $blog->slug ])
                        ->with('msgStatus',     1)
                        ->with('status',        1)
                        ->with('statusModule',  'msgModuleBLog');
        
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('blog.edit',  [ $blog->slug ])
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'msgModuleBLog');
        }
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
