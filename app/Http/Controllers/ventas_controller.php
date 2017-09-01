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


class ventas_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayproductos = array();
        $arraycantidades = array();
        $productos = DB::Select("SELECT 
            prod.id_product, cate.nombre as 'categoria',  prla.name as 'nombre', prla.description as 'descripcion', prod.price as 'precio', stoc.price_te as 'precio_stock', stoc.physical_quantity as 'cantidad'
            FROM 
            porcinos.ps_product_lang prla,
            porcinos.ps_product prod,
            porcinos.ps_stock stoc,
            porcinos.categorias cate
            where   
            prla.id_product = prod.id_product
            and prod.id_product = stoc.id_product
            and prod.idcategoria = cate.idcategoria");

        for ($i=0; $i < count($productos); $i++) { 
            $arrayproductos[$productos[$i]->id_product] = $productos[$i]->categoria . ' - ' . $productos[$i]->nombre;
            $arraycantidades[$productos[$i]->id_product] = $productos[$i]->cantidad;
        }

        $puc = Puc::orderBy('nro_cuenta', 'ASC')->where('estado', 1)->get();
        //dd($arrayproductos);
        //$pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_puc = array();

        foreach ($puc as $p) {
            $array_puc[$p->nro_cuenta] = $p->nro_cuenta . ' - ' .  $p->nombre_cuenta;
        }

        $puc = Puc::orderBy('nro_cuenta', 'ASC')->lists('nombre_cuenta', 'nro_cuenta');
        return view('pagina.ventas.create')->with('puc', $array_puc)->with('productos', $arrayproductos)->with('cantidades', $arraycantidades);
    }

    public function ventascantidad($id)
    {   
        $datos = array();
        $arraycantidades = array();
        $productos = DB::Select("SELECT 
            prod.id_product, cate.nombre as 'categoria',  prla.name as 'nombre', prla.description as 'descripcion', prod.price as 'precio', stoc.price_te as 'precio_stock', stoc.physical_quantity as 'cantidad'
            FROM 
            porcinos.ps_product_lang prla,
            porcinos.ps_product prod,
            porcinos.ps_stock stoc,
            porcinos.categorias cate
            where   
            prla.id_product = prod.id_product
            and prod.id_product = stoc.id_product
            and prod.idcategoria = cate.idcategoria
            and prod.id_product = " . $id);

        for ($i=0; $i < count($productos); $i++) { 
            $arraycantidades[$productos[$i]->id_product] = $productos[$i]->cantidad;   
        }
        //array_push($datos, $arraycantidades);
        //$aux .= "}";
        //return json_encode($arreglo);
        return $arraycantidades[$id];
    }

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
