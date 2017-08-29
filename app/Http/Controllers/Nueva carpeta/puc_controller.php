<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\User;
use FincaEsperanza\Puc;
use Laracasts\Flash\Flash;
use Storage;
use Illuminate\Support\Facades\Redirect;
use FincaEsperanza\Http\Requests\user_request;
use Auth;
use DB;

class puc_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {   
        //dd($request->busqueda);
        $puc = Puc::orderBy('nro_cuenta', 'ASC')->paginate(5);

        //dd($request->busqueda);
        return view('pagina.puc.puc')->with('puc', $puc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.puc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->nro_cuenta);

        DB::insert('insert into puc (nro_cuenta, nombre_cuenta, clase, estado) values (?, ?, ?, ?)', [$request->nro_cuenta, $request->nombre_cuenta, $request->clase, $request->estado]);
        //$puc = new Puc($request->all());
        //$puc->save();
        Flash::success("Se ha Creado La Cuenta " . $request->nombre_cuenta . ' ' . $request->clase);
        return redirect()->route('puc.index');
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
        $puc = Puc::find($id);
        return view('pagina.puc.edit')->with('puc', $puc);
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

        DB::update('UPDATE puc SET nombre_cuenta=?, clase=?, estado=? WHERE nro_cuenta = ?', [$request->nombre_cuenta, $request->clase, $request->nro_cuenta, $request->estado]);
        Flash::warning("Se ha Editado La Cuenta " . $request->nombre_cuenta . ' ' . $request->clase);

        return redirect()->route('puc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puc = Puc::find($id);
        $puc->delete();

        Flash::error("Se ha Eliminado La Cuenta " . $puc->nombre_cuenta . ' ' . $puc->clase);
        return redirect()->route('puc.index');
    }
}
