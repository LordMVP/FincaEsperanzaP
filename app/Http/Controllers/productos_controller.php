<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\productos;
use DB;
use FincaEsperanza\User;
use FincaEsperanza\categorias;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class productos_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $producto = DB::select("SELECT 
            prod.id_product, cate.nombre as 'categoria',  prla.name as 'nombre', prla.description as 'descripcion', prod.price as 'precio', stoc.price_te as 'precio_stock'
            FROM 
            porcinos.ps_product_lang prla,
            porcinos.ps_product prod,
            porcinos.ps_stock stoc,
            porcinos.categorias cate
            where   
            prla.id_product = prod.id_product
            and prod.id_product = stoc.id_product
            and prod.idcategoria = cate.idcategoria");*/
        $producto = DB::select("SELECT 
                * 
        FROM 
                porcinos.ps_product prod,
                porcinos.ps_product_lang prla,
                porcinos.categorias cate
        WHERE
                prod.id_product = prla.id_product
                and prod.idcategoria = cate.idcategoria");


        $productos = productos::orderBy('id_product', 'ASC')->where('active', 1)->get();

        
        //$productos = productos::orderBy('id_product', 'ASC')->paginate(5);
        return view('pagina.productos.productos')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $categorias = categorias::orderBy('idcategoria', 'ASC')->where('estado', 1)->get();
        //dd($puc);
        //$pacientes = User::where('tipo', '!=', 'medico')->orderBy('id', 'ASC')->lists('nombre', 'id');

        $array_categorias = array();

        foreach ($categorias as $cat) {
            $array_categorias[$cat->idcategoria] = $cat->nombre;
        }

        //dd($categorias);
        return view('pagina.productos.create')->with('categorias', $array_categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $cont = DB::Select("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE TABLE_SCHEMA = 'porcinos' AND TABLE_NAME = 'ps_product'");
        $cont = $cont[0]->AUTO_INCREMENT;
        //dd($request, $cont);
        DB::insert('INSERT INTO ps_product(id_product, idcategoria, price, wholesale_price, tamano, active, date_add, date_upd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', [$cont, $request->idcategoria, $request->price, $request->price, $request->tamano, $request->active, '', '']);

        DB::insert('INSERT INTO ps_product_lang(id_product, name) VALUES (?, ?)', [$cont, $request->name]);
        //$puc = new Puc($request->all());
        //$puc->save();
        Flash::success("Se ha Creado El producto " . $request->name);
        return redirect()->route('producto.index');
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
