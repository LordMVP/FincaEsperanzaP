<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class estadisticas_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $variables = DB::select('SELECT * FROM modelo where id_modelo <> 21');
        //dd($variables[1]->nombre);
        $arreglo = array();
        for ($i=0; $i < count($variables); $i++) { 
            $arreglo[$variables[$i]->id_modelo] = $variables[$i]->nombre;
        }
        return view('pagina.estadisticas.estadisticas3')->with('modelo', $arreglo);
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

    public function variables()
    {  
        $aux = "";
        $variables = DB::select('SELECT * FROM variables order by variable');
        //dd($variables[1]->nombre);
        $arreglo = array();
        //$aux .= "{";

        for ($i=0; $i < count($variables); $i++) { 
            $arreglo[$i] = $variables[$i]->nombre;
            //$aux .= $variables[$i]->nombre . ',';
        }

        //$aux .= "}";
        return json_encode($arreglo);
    }

    public function modelo($id1, $id2, $id3)
    {   

        $datos = array();
        $limpiar = array();
        $arreglo = array();
        $arregloaux = array();
        $id = 0;
        $sql = "";

        $sql .= "select * from ( ";
        $sql .= "select more.*, mode.nombre from modelo mode inner join modelo_resultado more on mode.id_modelo = more.id_modelo ";
        $sql .= "where more.variable like '%x%' or more.variable like '%z%' order by more.variable  ";
        $sql .= ") datos ";
        $sql .= "where  datos.id_modelo = 24 ";
        $sql .= "order by datos.id_modelo, datos.id_mode_resultado";

        $variables = DB::select($sql);

        for ($i=0; $i < count($variables); $i++) { 
            array_push($arregloaux, $variables[$i]->valor);
        }

        $arreglo['data'] = $arregloaux;
        $arreglo['pointStart'] = 0;
        $arreglo['name'] = $variables[0]->nombre;

        array_push($datos, $arreglo);

        if($id1 != 0){
            $arreglo = $limpiar;
            $arregloaux = $limpiar; 
            $sql = "";
            $sql .= "select * from ( ";
            $sql .= "select more.*, mode.nombre from modelo mode inner join modelo_resultado more on mode.id_modelo = more.id_modelo ";
            $sql .= "where more.variable like '%x%' or more.variable like '%z%' order by more.variable  ";
            $sql .= ") datos ";
            $sql .= "where  datos.id_modelo = " . $id1 . " ";
            $sql .= "order by datos.id_modelo, datos.id_mode_resultado";

            $variables = DB::select($sql);

            if(!empty($variables)){
                for ($i=0; $i < count($variables); $i++) { 
                    array_push($arregloaux, $variables[$i]->valor);
                }
            
                $arreglo['data'] = $arregloaux;
                $arreglo['pointStart'] = 0;
                $arreglo['name'] = $variables[0]->nombre;

                array_push($datos, $arreglo);
            }
        }

        if($id2 != 0){
            $arreglo = $limpiar;
            $arregloaux = $limpiar; 
            $sql = "";
            $sql .= "select * from ( ";
            $sql .= "select more.*, mode.nombre from modelo mode inner join modelo_resultado more on mode.id_modelo = more.id_modelo ";
            $sql .= "where more.variable like '%x%' or more.variable like '%z%' order by more.variable  ";
            $sql .= ") datos ";
            $sql .= "where  datos.id_modelo = " . $id2 . " ";
            $sql .= "order by datos.id_modelo, datos.id_mode_resultado";

            $variables = DB::select($sql);

            if(!empty($variables)){
                for ($i=0; $i < count($variables); $i++) { 
                    array_push($arregloaux, $variables[$i]->valor);
                }
            
                $arreglo['data'] = $arregloaux;
                $arreglo['pointStart'] = 0;
                $arreglo['name'] = $variables[0]->nombre;

                array_push($datos, $arreglo);
            }
        }

        if($id3 != 0){
            $arreglo = $limpiar;
            $arregloaux = $limpiar; 
            $sql = "";
            $sql .= "select * from ( ";
            $sql .= "select more.*, mode.nombre from modelo mode inner join modelo_resultado more on mode.id_modelo = more.id_modelo ";
            $sql .= "where more.variable like '%x%' or more.variable like '%z%' order by more.variable  ";
            $sql .= ") datos ";
            $sql .= "where  datos.id_modelo = " . $id3 . " ";
            $sql .= "order by datos.id_modelo, datos.id_mode_resultado";

            $variables = DB::select($sql);

            if(!empty($variables)){
                for ($i=0; $i < count($variables); $i++) { 
                    array_push($arregloaux, $variables[$i]->valor);
                }
            
                $arreglo['data'] = $arregloaux;
                $arreglo['pointStart'] = 0;
                $arreglo['name'] = $variables[0]->nombre;

                array_push($datos, $arreglo);
            }
        }



        
        return json_encode($datos);
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
