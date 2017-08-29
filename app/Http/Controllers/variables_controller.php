<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\variables;
use Auth;

use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class variables_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $variables = variables::orderBy('idvariables', 'ASC')->paginate(5);
        return view('pagina.variables.variables')->with('variables', $variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.variables.create');
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

        $variable = new variables($request->all());

        $v = \Validator::make($request->all(), [

            'variable' => 'unique:variables'
            ]);
        //dd($variable);
        if ($v->fails())
        {   
            //dd($v);
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        //dd($variable);
        $variable->save();
        Flash::success("Se ha Creado La variable " . $request->variable . ' ' . $request->nombre);
        return redirect()->route('variables.index');
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
        $variables = variables::find($id);
        return view('pagina.variables.edit')->with('variables', $variables);
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

        $variables = variables::find($id);

        $variables->variable = $request->variable;
        $variables->nombre = $request->nombre;
        $variables->descripcion = $request->descripcion;

        $variables->save();
        Flash::warning("Se ha Editado la " . $request->variable . ' ' . $request->nombre);
        return redirect()->route('variables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $variables = variables::find($id);
        $variables->delete();

        Flash::error("Se ha Eliminado la variable " . $variables->variable . ' ' . $variables->nombre);
        return redirect()->route('variables.index');
    }
}
