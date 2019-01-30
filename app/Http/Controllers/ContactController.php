<?php

namespace elbauldelcodigo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use elbauldelcodigo\General;
use elbauldelcodigo\ParametroGral;
use elbauldelcodigo\Session;
use elbauldelcodigo\Contacto;
use elbauldelcodigo\Http\Requests\StoreContactRequest;
use elbauldelcodigo\Mail\SendMailContact;

class ContactController extends Controller
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
    public function index()
    {

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

        return View(
            'contact.index', array(
                'entradas'        => $entradas,
                'temas'           => $tema,
                'sinPaginate'     => 1,
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        
        // guardamos el nuevo rol en la tabla 'rol_users'
        $contact                  =  new Contacto();
        $contact->contacto_txt    =  $request->get('comentario');
        $contact->contacto_email  =  $request->get('email');
        $contact->created_at      =  date("Y-m-d H:i:s");
        $contact->updated_at      =  date("Y-m-d H:i:s");

        try {

            $contact->save();

            Mail::to($request->get('email'))
                ->cc('st3v3n1101@gmail.com')
                ->send(new SendMailContact($contact));
            

            return  redirect()->route('post.index')
                        ->with('msgStatus',     1)
                        ->with('status',        1)
                        ->with('statusModule',  'msgModuleContact');
        
        } catch (\Illuminate\Database\QueryException $ex) {
            return  redirect()->route('contacto.index')
                    ->with('sqlerror',      $ex->errorInfo[2])
                    ->with('msgStatus',     1)
                    ->with('status',        0)
                    ->with('statusModule',  'msgModuleContact');
        }
        
    }
}
