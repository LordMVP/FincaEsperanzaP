<?php

namespace FincaEsperanza\Http\Controllers;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;

use Illuminate\Http\Request;
use FincaEsperanza\categorias;
use FincaEsperanza\variables;
use Auth;

use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class categorias_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categorias::orderBy('idcategoria', 'ASC')->paginate(5);
        return view('pagina.categorias.categorias')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $categorias = new categorias($request->all());

        $v = \Validator::make($request->all(), [

            'nombre' => 'unique:categorias'
            ]);
        //dd($variable);
        if ($v->fails())
        {   
            //dd($v);
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        //dd($variable);
        $categorias->save();
        Flash::success("Se ha Creado La Categoria " . $request->nombre);
        return redirect()->route('categorias.index');
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
        $categorias = categorias::find($id);
        return view('pagina.categorias.edit')->with('categorias', $categorias);
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
        //dd($request);

        $categorias = categorias::find($id);

        $categorias->nombre = $request->nombre;
        $categorias->estado = $request->estado;

        $categorias->save();
        Flash::warning("Se ha Editado la categoria " . $request->nombre);
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = categorias::find($id);
        $categorias->delete();

        Flash::error("Se ha Eliminado la categoria " . $categorias->nombre);
        return redirect()->route('categorias.index');
    }
}
