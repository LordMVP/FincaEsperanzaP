<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\User;
use FincaEsperanza\Puc;
use FincaEsperanza\Transaccion;
use Laracasts\Flash\Flash;
use Storage;
use Illuminate\Support\Facades\Redirect;
use FincaEsperanza\Http\Requests\user_request;
use Auth;
use DB;

class compras_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $arrayproductos = array();

        $productos = DB::Select("SELECT 
                        *
                FROM 
                        porcinos.ps_product prod,
                        porcinos.ps_product_lang prla,
                        porcinos.categorias cate
                WHERE
                        prod.id_product = prla.id_product
                        and prod.idcategoria = cate.idcategoria");

        for ($i=0; $i < count($productos); $i++) { 
            $arrayproductos[$productos[$i]->id_product] = $productos[$i]->nombre . ' - ' . $productos[$i]->name;
        }

        $puc = Puc::orderBy('nro_cuenta', 'ASC')->where('estado', 1)->get();
        //dd($arrayproductos);
        //$pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_puc = array();

        foreach ($puc as $p) {
            $array_puc[$p->nro_cuenta] = $p->nro_cuenta . ' - ' .  $p->nombre_cuenta;
        }

        $puc = Puc::orderBy('nro_cuenta', 'ASC')->lists('nombre_cuenta', 'nro_cuenta');
        return view('pagina.compras.create')->with('puc', $array_puc)->with('productos', $arrayproductos);
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
        //
    }


    public function transar(Request $request)
    {   

        $cont = DB::Select("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_SCHEMA = 'porcinos' AND TABLE_NAME = 'cuentas'");
        $cont = $cont[0]->AUTO_INCREMENT;

        //dd(date("Y-m-d"));
        $naturaleza = "";
        $saldo = 0;
        
        if($request->c1_cuenta != null){
            if($request->c1_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c1_credito;
            }else if($request->c1_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c1_debito;
            }else if($request->c1_debito == 0 && $request->c1_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c1_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c1_cuenta, $request->c1_descripcion, $saldo, $naturaleza, '']);
        }
        
        if($request->c2_cuenta != null){
            if($request->c2_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c2_credito;
            }else if($request->c2_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c2_debito;
            }else if($request->c2_debito == 0 && $request->c2_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c2_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c2_cuenta, $request->c2_descripcion, $saldo, $naturaleza, date("Y-m-d")]);
        }

        if($request->c3_cuenta != null){
            if($request->c3_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c3_credito;
            }else if($request->c3_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c3_debito;
            }else if($request->c3_debito == 0 && $request->c3_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c3_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c3_cuenta, $request->c3_descripcion, $saldo, $naturaleza, date("Y-m-d")]);
        }

        if($request->c4_cuenta != null){
            if($request->c4_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c4_credito;
            }else if($request->c4_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c4_debito;
            }else if($request->c4_debito == 0 && $request->c4_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c4_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c4_cuenta, $request->c4_descripcion, $saldo, $naturaleza, date("Y-m-d")]);
        }

        if($request->c5_cuenta != null){
            if($request->c5_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c5_credito;
            }else if($request->c5_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c5_debito;
            }else if($request->c5_debito == 0 && $request->c5_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c5_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c5_cuenta, $request->c5_descripcion, $saldo, $naturaleza, date("Y-m-d")]);
        }

        if($request->c6_cuenta != null){
            if($request->c6_debito == 0){
                $naturaleza = "Credito";
                $saldo = $request->c6_credito;
            }else if($request->c6_credito == 0){
                $naturaleza = "Debito";
                $saldo = $request->c6_debito;
            }else if($request->c6_debito == 0 && $request->c6_credito == 0){
                $request->$naturaleza = "Debito";
                $request->$saldo = $request->c6_debito;
            }
            DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, $request->c6_cuenta, $request->c6_descripcion, $saldo, $naturaleza, date("Y-m-d")]);
        }
        //dd($request);

        Flash::success("Se ha Realizado La transaccion correctamente ");
        return redirect()->route('transaccion.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
