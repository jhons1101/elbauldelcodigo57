<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use elbauldelcodigo\Post;
use elbauldelcodigo\TagsPost;
use elbauldelcodigo\TemaPost;
use elbauldelcodigo\TipoPost;
use elbauldelcodigo\General;
use elbauldelcodigo\ParametroGral;
use Illuminate\Support\Facades\DB;
use elbauldelcodigo\Http\Requests\UpdatePostRequest;
use elbauldelcodigo\Http\Requests\StorePostRequest;
use elbauldelcodigo\User;

class postController extends Controller
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
     * Despliega la ventana con todas las entradas de la DB 
     *
     * @param  int $page pagina actual donde el usuario final (front) está ubicado
     * @return view resources/view/post.index
     */
    public function index($page=1)
    {
        // traemos la cantidad de registros para el paginador
        $registros      = DB::table('posts')
                        ->join('tema_posts', 'post_tema', '=', 'tema_posts.tema_id')
                        ->where('post_tipo', 'ENTRADA')
                        ->orderBy('post_fec', 'desc')
                        ->get();


        $totalRegistros = count($registros);
        $paginador      = 15; // Parametrizarlo desde DB
        $cantPagina     = $totalRegistros/$paginador;
        $cantPagina     = ceil($cantPagina);

        if ($page != 1){
            // comenzara en la 16, pagina 2 y asi sucesivamente..
            $comienzo = (($page * $paginador)-$paginador)+1;
        } else {
            $comienzo = 1;
        }

        $final = ($page * $paginador);

        $post = DB::table('posts')
                ->join('tema_posts', 'post_tema', '=', 'tema_posts.tema_id')
                ->where('post_tipo', 3)
                ->orderBy('post_fec', 'desc')
                ->skip($comienzo-1)
                ->take($paginador)
                ->get();

        if (count($post) < 1) {
            $error = "No hay más resultados para mostrar.";
        } else {
            $error = "";
        }


        $tema = DB::table('posts as p')
                ->select('tm.tema_txt', 'tm.tema_img')
                ->distinct()
                ->join('usuarios as u', 'p.post_usu', '=', 'u.usuarios_id')
                ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                ->orderBy('tm.tema_txt', 'asc')
                ->get();
        // Retornamos todos los datos

        $entradas =  DB::table('posts as p')
                    ->select('p.*', 'u.usuarios_name', 'tm.tema_txt')
                    ->join('usuarios as u', 'p.post_usu', '=', 'u.usuarios_id')
                    ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                    ->orderBy('p.post_fec', 'desc')
                    ->get();

        
        return View(
            'post.index', array(
                'post'        => $post,
                'temas'       => $tema,
                'cantidadPag' => $cantPagina,
                'errores'     => $error,
                'entradas'    => $entradas,
                'public_path' => public_path()
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     * Despliega el formulario para crear una nueva entrada (post)
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        // recursos de la pagina
        $tipoPost   = TipoPost::orderBy('tipo_txt', 'asc')->get();
        $usuPost    = Auth::user()->id;
        $temaPost   = TemaPost::orderBy('tema_txt', 'asc')->get();
        $tagsPost   = TagsPost::orderBy('tag_txt', 'asc')->get();
        $user       = User::where('id', $usuPost)->get();

        // traemos los roles de usuario
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();

        return View('post.create')
        ->with('tipoPost',   $tipoPost)
        ->with('usuPost',    $usuPost)
        ->with('temaPost',   $temaPost)
        ->with('tagsPost',   $tagsPost)
        ->with('roles',      $roles[0])
        ->with('seccion',    trans('message.seccionAdmin'))
        ->with('user',       $user[0])
        ;
    }

    /**
     * Store a newly created resource in storage.
     * Permite guardar una nueva entrada (post) en Db
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }

        $post               =  new Post();
        $itemTag            =  '';
        $txtTags            =  $request->get('txtTagsPost');

        $post->post_tit     =  $request->get('txtTitPost');
        $post->post_tema    =  $request->get('txtTemPost');
        $post->post_usu     =  Auth::user()->id;
        $post->post_fec     =  date("Y-m-d H:i:s");
        $post->post_key     =  $request->get('txtKeyPost');
        $post->post_desc    =  $request->get('txtDesPost');
        $post->created_at   =  date("Y-m-d H:i:s");
        $post->updated_at   =  date("Y-m-d H:i:s");
        $post->post_tipo    =  $request->get('txtTipPost');
        $post->slug         =  $request->get('txtSlugPost');
        $post->desc_post    =  htmlentities ($request->get('textareaPost'), ENT_QUOTES);
        $post->des_code     =  htmlentities ($request->get('textareaCode'), ENT_QUOTES);

        foreach ($txtTags as $key => $tag) {
            $itemTag .= $tag. ',';
        }

        if ($request->get('txtPubPost') == 'on'){
            $txtPubPost = 1;
        } else {
            $txtPubPost = 0;
        }

        $post->flg_publicar =  $txtPubPost;
        $post->post_tags    =  substr($itemTag, 0, -1);
        

        try {

            $post->save();
            return  redirect()
                    ->route('post.show',  [ $post->slug ])
                    ->with('msgStatus',     1)
                    ->with('status',        1)
                    ->with('statusModule',  'modulePost');

        } catch (\Illuminate\Database\QueryException $ex) {
            
            return  redirect()
                    ->route('post.create')
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'modulePost');
        }
    }

    /**
     * Display the specified resource.
     * Me muestra el detalle de la entrada (post) en la pantalla del usuario final (front)
     *
     * @param  string  $slug
     * @return view resources/view/post.show
     */
    public function show($slug)
    {
        // traemos los datos del post según el ID
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $id   = $post->id;
        
        // se cargan los comentarios del post, si los tiene...
        $comm = DB::table('comentarios')
                ->select('com_texto', 'com_fec', 'usuarios_name', 'usuarios_email', 'usuarios_img')
                ->join('usuarios', 'comentarios.com_usu', '=', 'usuarios.usuarios_id')
                ->where('comentarios.com_post', $id)->orderBy('com_fec', 'desc')->get();
        $flagNuevoComm = null;

        // se cargan la información del post...
        $posts = DB::table('posts as p')
                ->select('p.*', 'u.usuarios_name', 'tm.tema_txt')
                ->join('usuarios as u', 'p.post_usu', '=', 'u.usuarios_id')
                ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                ->where('p.id', $id)->get();
        
        // Traemos las imagenes adjuntas de cada Entrada para generar el fuente que las muestre dinámicamente
        $pantallazo = DB::table('pantallazos')->select('*')->where('id_post', $id)->get();
        $totalImg   = count($pantallazo);

        // Consultamos los post relacionados según el tema de la entrada.
        $relacionados = DB::table('posts')
                        ->where('post_tema', $posts[0]->post_tema)
                        ->where('id', '!=', $id)
                        ->orderBy('post_fec', 'desc')
                        ->skip(0)->take(5)->get();

        // recorremos los tags del post y le traemos su descipción para pintarla en la plantilla
        $txtTags  = [];
        foreach ($posts as $key => $value){
            
            foreach(explode(',', substr($value->post_tags, 0, -1),-1) as $item => $idtag){
                $tag             = DB::table('tags_posts')->select('tag_txt')->where('tag_id', $idtag)->get();
                $txtTags[$item]  = strtolower($tag[0]->tag_txt);
            }
        }
        
        // Establecer el tamaño que desee, o al azar para mas seguridad
        $captchaTextSize = 7;

        do {

              //     Generar una cadena aleatoria y cifrarla con md5
              $md5Hash = $this::cadenaAleatoria();

              //     Eliminar cualquier caracter dificil de distinguir de nuestro hash
              preg_replace( '([1aeilou0])', "", $md5Hash );

        } while( strlen( $md5Hash ) < $captchaTextSize );

            // Solo necesitamos 7 caracteres para este captcha
            $key = substr( $md5Hash, 0, $captchaTextSize );

            // Agregue la clave recién generada a la sesion. Tenga en cuenta que esta cifrado.
            $_SESSION['key'] = md5( $key );
    
        
        return view('post.show')
        ->with('id',             $id)
        ->with('comm',           $comm)
        ->with('flagNuevoComm',  $flagNuevoComm)
        ->with('Posts',          $posts)
        ->with('totalImg',       $totalImg)
        ->with('pantallazo',     $pantallazo)
        ->with('relacionados',   $relacionados)
        ->with('keyCp',          $key)
        ->with('txtTags',        $txtTags);
    }

    /**
     * Display the specified resource.
     * Muestra las entradas (post) que  tiene asociadas el usuario admin (back)
     *
     * @param  string  $slug cadena unica que identifica el post
     * @return view resources/view/post.showPostAdmin
     */
    public function showPostAdmin($slug)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * Me abre la pantalla para modificar la entrada (post) en la pantalla del usuario admin (back)
     * http://127.0.0.1:8000/post/prueba-con-css/edit
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $slug)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }
        
        // traemos los datos del post según el SLUG
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        $id   = $post->id;
        
        // validamos si el post a editar me pertenece por medio de el id de usuario
        // del post en la politica de control: PostPolicy
        $this->authorize('pass', $post);
        
        // recursos de la pagina
        $tipoPost  = TipoPost::orderBy('tipo_txt', 'asc')->get();
        $usuPost   = Auth::user()->id;
        $temaPost  = TemaPost::orderBy('tema_txt', 'asc')->get();
        $tagsPost  = TagsPost::orderBy('tag_txt', 'asc')->get();
        $user      = User::where('id', $usuPost)->get();

        // se cargan la información del post...
        $posts = DB::table('posts as p')
                ->select('p.*', 'u.usuarios_name', 'tm.tema_txt')
                ->join('usuarios as u', 'p.post_usu', '=', 'u.usuarios_id')
                ->join('tema_posts as tm', 'p.post_tema', '=', 'tm.tema_id')
                ->where('p.id', $id)->get();
        
        // Consultamos los post relacionados según el tema de la entrada.
        $relacionados = DB::table('posts')
                        ->where('post_tema', $posts[0]->post_tema)
                        ->where('id', '!=', $id)
                        ->orderBy('post_fec', 'desc')
                        ->skip(0)->take(5)->get();
        
        // recorremos los tags del post y le traemos su descipción para pintarla en la plantilla
        $txtTags  = [];
        foreach ($posts as $key => $value){
            
            foreach(explode(',', $value->post_tags) as $item => $idtag){
                $tag             = DB::table('tags_posts')->select('tag_txt')->where('tag_id', $idtag)->get();
                $txtTags[$item]  = strtolower($tag[0]->tag_txt);
            }
        }
        

        // traemos los roles de usuario
        $roles  = DB::table('rol_user_user as r')
                ->select('r.rol_user_id', 'rs.rol_nombre')
                ->join('rol_users as rs', 'rs.id', '=', 'r.rol_user_id')
                ->where('user_id', $usuPost)
                ->orderBy('rol_user_id', 'asc')
                ->get();

        
        return view('post.edit')
        ->with('id',        $id)
        ->with('posts',     $posts[0])
        ->with('txtTags',   $txtTags)
        ->with('tipoPost',  $tipoPost)
        ->with('usuPost',   $usuPost)
        ->with('temaPost',  $temaPost)
        ->with('roles',     $roles[0])
        ->with('user',      $user[0])
        ->with('tagsPost',  $tagsPost);
    }

    /**
     * Update the specified resource in storage.
     * Permite editar la entrada (post) en la DB. Pantalla del usuario admin (back)
     * http://127.0.0.1:8000/post/prueba-con-css
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $slug)
    {
        // se autentica los roles del usuario
        if (!$request->user()->authorizeRole(['AdminPost'])) {
            return back()->withErrors([
                'msg' => trans('auth.401')
            ]);
        }
        
        // traemos los datos del post según el SLUG
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        
        // validamos si el post a editar me pertenece por medio de el id de usuario
        // del post en la politica de control: PostPolicy
        
        $this->authorize('pass', $post);
        
        $itemTag            = '';
        $txtTags            = $request->get('txtTagsPost');

        $post->post_tit     =  $request->get('txtTitPost');
        $post->post_tema    =  $request->get('txtTemPost');
        $post->post_usu     =  Auth::user()->id;
        $post->post_key     =  $request->get('txtKeyPost');
        $post->post_desc    =  $request->get('txtDesPost');
        $post->updated_at   =  date("Y-m-d H:i:s");
        $post->post_tipo    =  $request->get('txtTipPost');
        $post->desc_post    =  htmlentities ($request->get('textareaPost'), ENT_QUOTES);
        $post->des_code     =  htmlentities ($request->get('textareaCode'), ENT_QUOTES);

        // foreach ($txtTags as $key => $tag) {
        //     $itemTag .= $tag. ',';
        // }

        if ($request->get('txtPubPost') == 'on'){
            $txtPubPost = 1;
        } else {
            $txtPubPost = 0;
        }

        // para actualizar las fotos de pantallazos e imagenes incorporadas.
        // Ver este video minuto 11
        //https://www.youtube.com/watch?v=uRQv_ojF9JQ&list=PLIddmSRJEJ0sxS-RmqdRMlkyWOQWvEGEt&index=23

        $post->flg_publicar =  $txtPubPost;
        $post->post_tags    =  $request->get('txtTagsPost'); //itemTag
        
        if ($post->save()) {

            $msj = ParametroGral::where('id', '=', 3)->firstOrFail();

            return  redirect()
                    ->route('post.edit',     [ $post->slug ])
                    ->with('msgStatus',      $msj->txt_parametro)
                    ->with('status',         1)
                    ->with('statusModule',  'modulePost');

        } else {

            $msj = ParametroGral::where('id', '=', 5)->firstOrFail();

            return  redirect()
                    ->route('post.edit',     [ $post->slug ])
                    ->with('msgStatus',      $msj->txt_parametro)
                    ->with('status',         0)
                    ->with('statusModule',  'modulePost');
        }
    }

    /**
     * Remove the specified resource from storage.
     * Elima de la pantalla la entrada, lo que hace en sí es ocultar la entrada po medio del
     * flag de mostrar si o no (campo flg_publicar en la DB). Pantalla del usuario admin (back)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Esta funcion genera una cadena aleatoria según una longitud de entrada
     * Su longitud de cadena por defecto es 7
     *
     * @param int $length longitud de la cadena
     * @return string
     */

    public function cadenaAleatoria($length = 7) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
