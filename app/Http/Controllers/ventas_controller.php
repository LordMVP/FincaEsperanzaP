<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\User;
use FincaEsperanza\Puc;
use FincaEsperanza\ps_stock;
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

    public function vender(Request $request)
    {   
        $cont = DB::Select("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_SCHEMA = 'porcinos' AND TABLE_NAME = 'cuentas'");
        $cont = $cont[0]->AUTO_INCREMENT;

        $datos = $request->all();
        $stock = 0;
        $naturaleza = "";
        $saldo = 0;

        //dd(Auth::User()->id, $datos);
        //Credito
        try{
            for ($i=1; $i <= $datos['contador']; $i++) {
                if(!is_null($datos['c'.$i.'_producto'])){
                    $producto['id_stock'] = 0;
                    $producto['price_te'] = 0;
                    $producto['physical_quantity'] = 0;
                    $productos = ps_stock::orderBy('id_stock', 'ASC')->where('id_product', '=', $datos['c'.$i.'_producto'])->get();

                    foreach ($productos as $pro) {
                        //$producto = $pro;
                        $producto['id_stock'] = $pro->id_stock;
                        $producto['price_te'] = $pro->price_te;
                        $producto['physical_quantity'] = $pro->physical_quantity;
                    }
                    //dd($producto, $datos);
                    //DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, "1105", $datos['c'.$i.'_descripcion'], $datos['c'.$i.'_total'], "Debito", date("Y-m-d H:i:s")]); 

                    //DB::insert('insert into cuentas (num_compro, num_cuenta, descripcion, saldo, naturaleza, fecha_operacion) values (?, ?, ?, ?, ?, ?)', [$cont, "131505", $datos['c'.$i.'_descripcion'], $datos['c'.$i.'_total'], "Credito", date("Y-m-d H:i:s")]);
                    
                    //dd($producto[0]->id_stock);
                    $tcantidad = floatval($producto['physical_quantity']) - floatval($datos['c'.$i.'_cantidad']);
                    $precioAnt = floatval($producto['price_te']);
                    $precioNue = floatval($datos['c'.$i.'_valor']);
                    $ttotal = (floatval($producto['price_te']) * floatval($producto['physical_quantity'])) - floatval($datos['c'.$i.'_total']);
                    $precio = 0;

                    //$precioAnt = round($precioAnt, 3);
                    
                    /*if($precioAnt == 0){
                        $precio = $precioNue;
                    }else{
                        $precio = ($ttotal / $tcantidad);
                    }*/


                    $precio = floatval($producto['price_te']) * floatval($producto['physical_quantity']);
                    $precio = round($precio, 1);

                    //dd($ttotal, $tcantidad, $precio, $precioAnt, $precioNue);
                    DB::update("UPDATE ps_stock SET physical_quantity=".$tcantidad.", usable_quantity=".$tcantidad.", price_te=".$precioNue." WHERE id_stock = '".$producto['id_stock']."'");
              
                    DB::insert('INSERT into ps_stock_mvt (id_stock_mvt, id_stock, id_user, physical_quantity, date_add, sign, price_te, last_wa, current_wa, referer) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', ['', $producto['id_stock'], Auth::User()->id, $datos['c'.$i.'_cantidad'], date("Y-m-d H:i:s"), '-1', $precioAnt, $precioAnt, $precioAnt, '0']);
                     
                }
            }
            //dd("pp");
        }catch(Exception $e){
            Flash::error("Error en el proceso");
            return redirect()->route('compras.index');     
        }
        Flash::success("Se ha Realizado La Venta correctamente ");
        return redirect()->route('ventas.index');
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

    public function ventasvalor($id)
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
            $arraycantidades[$productos[$i]->id_product] = $productos[$i]->precio_stock;   
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
