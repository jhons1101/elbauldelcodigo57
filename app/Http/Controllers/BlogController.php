<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use elbauldelcodigo\Http\Requests\UpdatePostRequest;
// use elbauldelcodigo\Http\Requests\StorePostRequest;

use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\User;
use elbauldelcodigo\Blogs;
use elbauldelcodigo\RolUser;
use elbauldelcodigo\RolUserUser;
use elbauldelcodigo\TagsPost;

class BlogController extends Controller
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
        
        
        $blog   = Blogs::BuscarEnBlog($request->get('buscar'))
                ->where('flg_publicar' , 1)
                ->orderBy('updated_at', 'desc')
                ->paginate(8);
        

        $leido  = Blogs::orderBy('views', 'desc')->paginate(5);
        
        return View(
            'blog.index', array(
                'blogs'       => $blog,
                'topLeido'    => $leido,
                'paginate'    => $blog,
                'buscar'      => $request->get('buscar'),
                'msgStatus'   => 1,
                'status'      => 2
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
        
        $usuPost     = Auth::user()->id;
        $user        = User::where('id', $usuPost)->get();
        $usuarios    = User::orderBy('email', 'asc')->get();
        $tagsBlog    = TagsPost::orderBy('tag_txt', 'asc')->get();

        // traemos los roles de usuario para mostrar las acciones disponibles
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();
        
        return View('blog.create')
        ->with('blogs',        $roles[0])
        ->with('seccion',      trans('message.newBlog'))
        ->with('moduleSeccion',trans('message.moduleBlog'))
        ->with('user',         $user[0])
        ->with('usuarios',     $usuarios)
        ->with('tagsBlog',     $tagsBlog)
        ->with('roles',        $roles[0])
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['Admin'])) {
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

            return  redirect()->route('blog.index',  [ $blog->tema_txt ])
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('auth');
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
        $this->middleware('auth');
    }
}
