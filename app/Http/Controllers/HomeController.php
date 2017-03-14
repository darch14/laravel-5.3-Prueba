<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TRAER LOS DATOS DE LA BASE DE DATOS
        $noticias = Noticia::all();
        //MOSTRARLOS EN VERTOR
        return view('home')->with(['noticias' => $noticias]);
    }
}
