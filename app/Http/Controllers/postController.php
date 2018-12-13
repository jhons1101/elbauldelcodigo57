<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use elbauldelcodigo\Post;
use elbauldelcodigo\TagsPost;
use elbauldelcodigo\TemaPost;
use elbauldelcodigo\TipoPost;
use elbauldelcodigo\General;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     * Despliega la ventana con todas las entradas de la DB 
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=1)
    {
        // traemos la cantidad de registros para el paginador
        $registros = DB::table('posts')
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
            ->where('post_tipo', 'ENTRADA')
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
    public function create()
    {
        // recursos de la pagina
        $tipoPost  = TipoPost::orderBy('tipo_txt', 'asc')->get();
        $usuPost   = 1;
        $temaPost  = TemaPost::orderBy('tema_txt', 'asc')->get();
        $tagsPost  = TagsPost::orderBy('tag_txt', 'asc')->get();

        return View('post.create')
        ->with('tipoPost', $tipoPost)
        ->with('usuPost', $usuPost)
        ->with('temaPost', $temaPost)
        ->with('tagsPost', $tagsPost);
    }

    /**
     * Store a newly created resource in storage.
     * Permite guardar una nueva entrada (post) en Db
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // die();
        $post               =  new Post();
        $itemTag            = '';
        $txtTags            = $request->get('txtTagsPost');

        $post->post_tit     =  $request->get('txtTitPost');
        $post->post_tema    =  $request->get('txtTemPost');
        $post->post_usu     =  $request->get('txtUsuPost');
        $post->post_fec     =  date("Y-m-d");
        $post->post_key     =  $request->get('txtKeyPost');
        $post->post_desc    =  $request->get('txtDesPost');
        $post->created_at   =  date("Y-m-d H:i:s");
        $post->updated_at   =  date("Y-m-d H:i:s");
        $post->post_tipo    =  $request->get('txtTipPost');
        $post->slug         =  $request->get('txtSlugPost');
        $post->desc_post    =  ($request->get('textareaPost'));
        $post->des_code     =  ($request->get('textareaCode'));

        // foreach ($txtTags as $key => $tag) {
        //     $itemTag .= $tag. ',';
        // }

        if ($request->get('txtPubPost') == 'on'){
            $txtPubPost = 1;
        } else {
            $txtPubPost = 0;
        }

        $post->flg_publicar =  $txtPubPost;
        $post->post_tags    =  $request->get('txtTagsPost'); //itemTag
        
        if ($post->save()) {
            return "Ok";
        } else {
            return "bad";
        }
    }

    /**
     * Display the specified resource.
     * Me muestra el detalle de la entrada (post) en la pantalla
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
            
            foreach(explode(',', $value->post_tags) as $item => $idtag){
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
     * Show the form for editing the specified resource.
     * Me abre la pantalla para modificar la entrada (post)
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
     * Permite editar la entrada (post) en la DB
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
     * Elima de la pantalla la entrada, lo que hace en sí es ocultar la entrada po medio del
     * flag de mostrar si o no (campo flg_publicar en la DB)
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
     * @param number $length longitud de la cadena
     * @return return String
     */

    public function cadenaAleatoria($length = 7) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
