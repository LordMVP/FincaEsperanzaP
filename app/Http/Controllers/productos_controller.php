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
                and prod.idcategoria = cate.idcategoria
                and prod.active = 1
                ");


            $productos = productos::orderBy('id_product', 'ASC')->where('active', 1)->get();

        //dd($producto, $productos);
        //$productos = productos::orderBy('id_product', 'ASC')->paginate(5);
            return view('pagina.productos.productos')->with('productos', $producto);
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

        DB::insert('INSERT INTO ps_stock(id_stock, id_product, physical_quantity, usable_quantity, price_te) VALUES (?, ?, ?, ?, ?)', ['', $cont, 0, 0, 0]);
        //$puc = new Puc($request->all());
        //$puc->save();
        Flash::success("Se ha Creado El producto " . $request->name);
        return redirect()->route('productos.index');
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

        $categorias = categorias::orderBy('idcategoria', 'ASC')->where('estado', 1)->get();
        $array_categorias = array();

        foreach ($categorias as $cat) {
            $array_categorias[$cat->idcategoria] = $cat->nombre;
        }

        $producto = DB::select("SELECT 
                * 
            FROM 
            porcinos.ps_product prod,
            porcinos.ps_product_lang prla,
            porcinos.categorias cate
            WHERE
            prod.id_product = prla.id_product
            and prod.idcategoria = cate.idcategoria
            and prod.id_product = " . $id . "
            ");

        $productos = productos::find($id);
        $productos->name = $producto[0]->name;
        //dd($producto[0]->name, $productos);
        return view('pagina.productos.edit')->with('productos', $productos)->with('categorias', $array_categorias);
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
        DB::update('UPDATE ps_product SET idcategoria=?, price=?, tamano=?, active=?, date_upd=? WHERE id_product = ?', [$request->idcategoria, $request->price, $request->tamano, $request->active, '', $id]);

        DB::update('UPDATE ps_product_lang SET name=? WHERE id_product = ?', [$request->name, $id]);

        Flash::warning("Se ha Editado El producto " . $request->name);

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            DB::delete("DELETE FROM ps_product_lang WHERE id_product = " . $id);
            DB::delete("DELETE FROM ps_product WHERE id_product = " . $id);
            //$this->buildXMLHeader;
            Flash::error("Se ha Eliminado el producto");

            return redirect()->route('productos.index');
        }
        catch (\Exception $e) {
            Flash::error("No se ha eliminado el producto error -> " . $e->getMessage());
            return redirect()->route('productos.index');
            //return $e->getMessage();
        }
    }
}
