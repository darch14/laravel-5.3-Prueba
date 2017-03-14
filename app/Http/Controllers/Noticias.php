<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//USO AL MODELO NOTICIA
use App\Noticia;

use Storage;

class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request ES EL EMPAQUETAMIENTO DE DATOS
        //dd($request->titulo, $request->descripcion);

        // VALIDACION DE DATOS DE NOTICIAS
        $this->validate($request, [
          'titulo' => 'required',
          'descripcion' => 'required'
        ]);

        //GUARDAR DATOS DE NOTICIAS
        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        //GUARDAR IMAGEN
        $img = $request->file('urlImg');

        $file_route = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgNoticias')->put($file_route, file_get_contents( $img->getRealPath() ) );

        $noticia->urlImg = $file_route;

        /*GUARDAR EN LA BASE DE DATOS
        SE PREGUNTA SI SE GUARDO CON EXITO O NO Y SE ENVIA UN MENSAJE*/
        if($noticia->save()){
          return back()->with('msjExito', 'Datos guardados');
        }else {
          return back()->with('msjError', 'Error al guardar los datos');
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
        //SE RETORNA LA VISTA HOME
        $noticia = Noticia::find($id);
        return view('home')->with(['edit' => true, 'noticia' => $noticia]);
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
        // VALIDACION DE DATOS DE NOTICIAS
        $this->validate($request, [
          'titulo' => 'required',
          'descripcion' => 'required'
        ]);

        //GUARDAR DATOS DE NOTICIAS
        $noticia = Noticia::find($id);
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;

        //GUARDAR IMAGEN
        $img = $request->file('urlImg');

        $file_route = time().'_'.$img->getClientOriginalName();

        Storage::disk('imgNoticias')->put($file_route, file_get_contents( $img->getRealPath() ) );
        Storage::disk('imgNoticias')->delete($request->img);

        $noticia->urlImg = $file_route;

        /*GUARDAR EN LA BASE DE DATOS
        SE PREGUNTA SI SE GUARDO CON EXITO O NO Y SE ENVIA UN MENSAJE*/
        if($noticia->save()){
          return redirect('home')->with('msjExito', 'Datos guardados');
        }else {
          return back()->with('msjError', 'Error al guardar los datos');
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
        //ELIMINAR LA NOTICIA
        Noticia::destroy($id);
        return back();
    }
}
