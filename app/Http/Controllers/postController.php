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
            ->join('temas', 'post_tema', '=', 'temas.tema_id')
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
            ->join('temas', 'post_tema', '=', 'temas.tema_id')
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
            ->join('temas as tm', 'p.post_tema', '=', 'tm.tema_id')
            ->orderBy('tm.tema_txt', 'asc')
            ->get();
		// Retornamos todos los datos

		$entradas =  DB::table('posts as p')
            ->select('p.*', 'u.usuarios_name', 'tm.tema_txt')
            ->join('usuarios as u', 'p.post_usu', '=', 'u.usuarios_id')
            ->join('temas as tm', 'p.post_tema', '=', 'tm.tema_id')
            ->orderBy('p.post_fec', 'desc')
            ->get();


        return View(
            'post.index', array(
                'post'        => $post,
                'temas'       => $tema,
                'cantidadPag' => $cantPagina,
                'errores'     => $error,
                'entradas'    => $entradas
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
        $tipoPost  = 1;
        $usuPost   = 1;
        $temaPost  = TemaPost::orderBy('tema_txt', 'asc')->get();
        $optionTema = '';

        foreach ($temaPost as $tema) {
            $optionTema .=  '<option value=' .$tema->tema_id. '>' .$tema->tema_txt. '</option>\r';
        }
        
        /*General::comboModel($temaPost, 'tema_id', 'tema_txt')
        echo "<pre>";
        print_r($optionTema);
        echo "</pre>";*/

        return View('post.create')
        ->with('tipoPost', $tipoPost)
        ->with('usuPost', $usuPost)
        ->with('temaPost', $optionTema);
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
        
        $post               =  new Post();
        $post->post_tit     =  $request->get('txtTitPost');
        $post->post_tema    =  $request->get('txtTemPost');
        $post->post_tags    =  $request->get('txtTitPost');
        $post->post_usu     =  $request->get('txtUsuPost');
        $post->post_fec     =  date("Y-m-d");
        $post->post_key     =  $request->get('txtKeyPost');
        $post->post_desc    =  $request->get('txtDesPost');
        $post->flg_publicar =  $request->get('txtPubPost');
        $post->created_at   =  date("Y-m-d H:i:s");
        $post->updated_at   =  date("Y-m-d H:i:s");
        $post->post_tipo    =  $request->get('txtTipPost');
        
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
    public function show($id)
    {
        //
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
}
