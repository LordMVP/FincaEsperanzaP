<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use DB;

class inventario_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $producto = DB::select('SELECT * FROM ps_product_lang');
        $aux_productos = array();
        //$aux_productos[0] = "Todos";
        for ($i=0; $i < count($producto); $i++) { 
            $aux_productos[$producto[$i]->id_product] = $producto[$i]->name;
        }

        if ($request->producto != 0) {
            $inventario = DB::select("SELECT sto_mtv.date_add as 'fecha', sto_mtv.sign as 'detalle', pro.id_product, pro_lang.name as 'nombre', 
                sto.id_stock, sto_mtv.physical_quantity as 'cantidad', sto_mtv.price_te as 'precio', 
                (sto_mtv.physical_quantity*sto_mtv.price_te)  as 'total' FROM ps_product pro 
                INNER JOIN ps_stock sto ON pro.id_product = sto.id_product
                INNER JOIN ps_stock_mvt sto_mtv ON sto_mtv.id_stock = sto.id_stock
                INNER JOIN ps_product_lang pro_lang ON pro.id_product = pro_lang.id_product WHERE pro.id_product = '".$request->producto."';");
        }else{
            $inventario = DB::select("SELECT sto_mtv.date_add as 'fecha', sto_mtv.sign as 'detalle', pro.id_product, pro_lang.name as 'nombre', 
                sto.id_stock, sto_mtv.physical_quantity as 'cantidad', sto_mtv.price_te as 'precio', 
                (sto_mtv.physical_quantity*sto_mtv.price_te)  as 'total' FROM ps_product pro 
                INNER JOIN ps_stock sto ON pro.id_product = sto.id_product
                INNER JOIN ps_stock_mvt sto_mtv ON sto_mtv.id_stock = sto.id_stock
                INNER JOIN ps_product_lang pro_lang ON pro.id_product = pro_lang.id_product;");
        }

        if ($inventario != null) {
            for ($i=0; $i < count($inventario); $i++) { 
                $inventario[$i]->tcantidad = 0;
                $inventario[$i]->tprecio = 0;
                $inventario[$i]->ttotal = 0;
            }
        }

        //dd($inventario);

        return view('pagina.inventario.inventario')->with('inventarios', $inventario)->with('productos', $aux_productos);
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
