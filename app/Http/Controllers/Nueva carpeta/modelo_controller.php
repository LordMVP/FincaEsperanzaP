<?php

namespace FincaEsperanza\Http\Controllers;

use FincaEsperanza\Http\Controllers\Controller;
use Illuminate\Http\Request;


class modelo_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        //return view('pagina.modelo');
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

        $columnapivote = 0;
        $filapivote = 0;

        $datos = $request->all();
        $funcion  = array();
        $objetivo = $request->objetivo;

        $matrizprincipal = array(); //funcion principal
        $matrizcalcular = array();
        $matrizvariables = array(); //Matriz Principal

        $funcion_aux_1 = array(); //Coeficientes principal
        $funcion_aux  = array(); //Funcion principal
        $funcion_aux[0] = 'Z';
        $funcion_aux_1[0] = 1;

        $funcionfase1  = array();

        for ($i = 1; $i <= $request->variable; $i++) {
            $funcion[$i] = $datos['fun_'.$i];
            $funcion_aux[$i] = 'X'.$i;
            $funcion_aux_1[$i] = 0;
        }


        $funcionfase1 = $funcion;
        $funcionfase_aux = $funcion;

        for ($n = 1; $n <= $request->restriccion; $n++) {
            for ($m = 1; $m <= $request->variable; $m++) {

                $matrizprincipal[$n][$m] = $datos['res_'.$m.'_'.$n];
                $matrizprincipal[$n][$m+1] = $datos[$n.'_accion'];
                $matrizprincipal[$n][$m+2] = $datos['resultado_'.$n];
            }
        }
//≥ ≤   
        //dd($funcion);

        $variable = $request->variable;
        $restriccion = $request->restriccion;
        $matrizcalcular = $matrizprincipal;

        for($i = 1; $i <= $variable; $i++){
            $funcionfase1[0] = 1;
            $funcionfase1[$i] = 0;
            $funcionfase1[$i] = 0;
            $funcionfase_aux[0] = 1; 
            $funcionfase_aux[$i] = 0; 
            $funcionfase_aux[$i] = 0; 
        }
        
        $cont = array();
        $cont['A'] = 1;
        $cont['S'] = 1;
        $cont['H'] = 1;


        /* Z X1 X2 Xn A1 A2 An S1 Sn H1 Hn */
        for ($n = 1; $n <= $request->restriccion; $n++) {

            if($matrizcalcular[$n][$variable+1] == '='){
                $funcionfase1[count($funcionfase1)] = -1;
                $funcion_aux[count($funcionfase1)-1] = 'A'.$cont['A'];
                $funcion_aux_1[count($funcionfase1)-1] = -1;
                $cont['A']++;

                //$matrizcalcular[$n][$variable+1] = '1';
                //$matrizcalcular[$n][$variable+3] = $matrizcalcular[$n][$variable+2];
                //$matrizcalcular[$n][$variable+2] = '=';
            }else if($matrizcalcular[$n][$variable+1] == '≥'){
                $funcionfase1[count($funcionfase1)] = -1;
                $funcionfase1[count($funcionfase1)] = 0;

                $funcion_aux_1[count($funcionfase1)-2] = -1;
                $funcion_aux_1[count($funcionfase1)-1] = 0;

                $funcion_aux[count($funcionfase1)-2] = 'A'.$cont['A'];
                $funcion_aux[count($funcionfase1)-1] = 'S'.$cont['S'];
                $cont['A']++;
                $cont['S']++;

                /*$aux_resultado = $matrizcalcular[$n][$variable+2];
                $matrizcalcular[$n][$variable+1] = '-1';
                $matrizcalcular[$n][$variable+2] = '1';
                $matrizcalcular[$n][$variable+4] = $aux_resultado;
                $matrizcalcular[$n][$variable+3] = '=';*/
            }else if($matrizcalcular[$n][$variable+1] == '≤'){
                $funcionfase1[count($funcionfase1)] = 0;

                $funcion_aux_1[count($funcionfase1)-1] = 0;
                $funcion_aux[count($funcionfase1)-1] = 'H'.$cont['H'];
                $cont['H']++;

                /*$matrizcalcular[$n][$variable+1] = '1';
                $matrizcalcular[$n][$variable+3] = $matrizcalcular[$n][$variable+2];
                $matrizcalcular[$n][$variable+2] = '=';*/
            }
        }

        $funcionfase1[count($funcionfase1)] = 0;
        $funcion_aux[count($funcion_aux)] = 'R';
        $funcion_aux_1[count($funcion_aux)-1] = 0;

        $matrizvariables[0] = $funcion_aux;
        $matrizvariables[1] = $funcion_aux_1;
        

        $cont['variables'] = count($matrizvariables[0]);

        for ($i=2; $i <= $restriccion+1; $i++) { 
            for ($y=0; $y < $cont['variables']; $y++) { 
                $matrizvariables[$i][$y] = 0;
            } 
        }

        for ($n = 2; $n <= ($request->restriccion)+1; $n++) {

            for($i = 1; $i <= $variable; $i++){

                $matrizvariables[$n][$i] = (float)$matrizcalcular[$n-1][$i];
                $matrizvariables[$n][$i] = (float)$matrizcalcular[$n-1][$i];
                $matrizvariables[$n][$cont['variables']-1] = (float)$matrizcalcular[$n-1][$i+2];

            }
        } 
        
       for($n = 2; $n <= $request->restriccion+1; $n++) {

            if($matrizcalcular[$n-1][$variable+1] == '='){

                $funcionfase_aux[count($funcionfase_aux)] = 1;
                $matrizvariables[$n][count($funcionfase_aux)-1] = 1;

            }else if($matrizcalcular[$n-1][$variable+1] == '≥'){
                $funcionfase_aux[count($funcionfase_aux)] = 1;
                $funcionfase_aux[count($funcionfase_aux)] = 1;

                $matrizvariables[$n][count($funcionfase_aux)-2] = 1;
                $matrizvariables[$n][count($funcionfase_aux)-1] = -1;

            }else if($matrizcalcular[$n-1][$variable+1] == '≤'){
                //dd('hola');
                $funcionfase_aux[count($funcionfase_aux)] = 'H';
                $matrizvariables[4][count($funcionfase_aux)-1] = 1;

            }
        }

        $calcular1 = $matrizvariables;


        $busqueda = array_search('A1', $calcular1[0], false);
        $dato = -1;
        $auxvar = 1;

        $busqueda = array_search('A1', $calcular1[0], false);
        $dato = $calcular1[1][$busqueda];

        
        $calcular1 = $this->convertirenceroini($calcular1, $busqueda, $restriccion, $variable, $cont);

        /*$columnapivote = $this->calcularcolumnapivote($calcular1, $variable, $restriccion);
        $filapivote = $this->calcularfilapivote($calcular1, $variable, $restriccion, $columnapivote);
        $calcular1 = $this->convertirenuno($calcular1, $restriccion, $variable, $columnapivote, $filapivote);
        $calcular1 = $this->convertirencero($calcular1, $restriccion, $variable, $columnapivote, $filapivote);

        $columnapivote = $this->calcularcolumnapivote($calcular1, $variable, $restriccion);
        $filapivote = $this->calcularfilapivote($calcular1, $variable, $restriccion, $columnapivote);
        $calcular1 = $this->convertirenuno($calcular1, $restriccion, $variable, $columnapivote, $filapivote);
        $calcular1 = $this->convertirencero($calcular1, $restriccion, $variable, $columnapivote, $filapivote);*/

        
        for($i = 0; $i < $variable; $i++){
            $columnapivote = $this->calcularcolumnapivote($calcular1, $variable, $restriccion);
            $filapivote = $this->calcularfilapivote($calcular1, $variable, $restriccion, $columnapivote);
            $calcular1 = $this->convertirenuno($calcular1, $restriccion, $variable, $columnapivote, $filapivote);
            $calcular1 = $this->convertirencero($calcular1, $restriccion, $variable, $columnapivote, $filapivote);
        }
        //dd($calcular1, $matrizprincipal, $variable);

        $calcular2 = $calcular1;

        

        for($i = 1; $i <= $cont['A']; $i++){
            $busqueda = array_search('A'.$i, $calcular2[0], false);

            for($y = 0; $y < $restriccion+2; $y++){
                //$calcular2[$y][$busqueda] = $calcular2[$y][$busqueda+1];
                unset($calcular2[$y][$busqueda]);
            }
            //dd($busqueda, $calcular2);
        }
        

        for($y = 1; $y <= $variable; $y++){
                
            $calcular2[1][$y] = -1  *$funcion[$y];
        }

        for($y = 0; $y <= $restriccion+1; $y++){                
            $calcular2[$y][0] = 0;
        }
        $calcular2[0][0] = 'Z';
        $calcular2[1][0] = 1;

        $calcular2_aux = array();

        for($y = 0; $y <= $restriccion+1; $y++){                
            ksort($calcular2[$y]);
        }
        

        $auxx = 0;

        for($y = 0; $y <= $restriccion+1; $y++){    
            $auxx = 0;            
            foreach ($calcular2[$y] as $key) {
                $calcular2_aux[$y][$auxx] = $key;
                $auxx++;
            }
        }

        $calcular2 = $calcular2_aux;
        
        for($i = 0; $i < $variable; $i++){
            $columnapivote2 = $this->calcularcolumnapivote($calcular2, $variable, $restriccion);
            $filapivote2 = $this->calcularfilapivote($calcular2, $variable, $restriccion, $columnapivote2);
            $calcular2 = $this->convertirenuno($calcular2, $restriccion, $variable, $columnapivote2, $filapivote2);
            $calcular2 = $this->convertirencero($calcular2, $restriccion, $variable, $columnapivote2, $filapivote2);
        }
        dd($calcular2, $calcular2[$filapivote2][$columnapivote2]);
        /*$cont_val = 0;
        do{ 

            $columnapivote = $this->calcularcolumnapivote($calcular2, $variable, $restriccion);
            $filapivote = $this->calcularfilapivote($calcular2, $variable, $restriccion, $columnapivote);
                        //dd($columnapivote, $calcular2);
            $calcular2 = $this->convertirenuno($calcular2, $restriccion, $variable, $columnapivote, $filapivote);
            $calcular2 = $this->convertirencero($calcular2, $restriccion, $variable, $columnapivote, $filapivote);
            //dd($calcular1, $matriz_aux, $busqueda);
            //echo $busqueda;
            $cont_val++;
        }while($cont_val < $variable);
        */
        $columnapivote2 = $this->calcularcolumnapivote($calcular2, $variable, $restriccion);
        $filapivote2 = $this->calcularfilapivote($calcular2, $variable, $restriccion, $columnapivote2);
                
        $calcular2 = $this->convertirenuno($calcular2, $restriccion, $variable, $columnapivote2, $filapivote2);
        
        $calcular2 = $this->convertirencero($calcular2, $restriccion, $variable, $columnapivote2, $filapivote2);
        

        
    }

    function calcularcolumnapivote($matriz, $variable, $restriccion)
    {   
        $aux = count($matriz[1]);
        $matriz_aux = $matriz[1];
        unset($matriz_aux[$aux-1]);
        unset($matriz_aux[0]);

        //dd(array_search(max($matriz_aux), $matriz[1], false), $matriz_aux);
        echo 'C ' . array_search(max($matriz_aux), $matriz[1], false) . ' - ';
        return array_search(max($matriz_aux), $matriz[1], false);
        //return max($matriz_aux);
    }

    public function calcularfilapivote($matriz, $variable, $restriccion, $columna)
    {   
        //dd($matriz, count($matriz[1]));
        $matriz_aux = array();
        $cont_aux = count($matriz[1])-1;
        
        for($i = 2; $i <= $restriccion; $i++){
            $matriz_aux[$i] = 0;
        }
        //dd($matriz);
        for ($i = 2; $i <= $restriccion+1; $i++) { 

            if ($matriz[$i][$columna] != 0) {
                $matriz_aux[$i] = $matriz[$i][$cont_aux] / $matriz[$i][$columna];
            }else{
                $matriz_aux[$i] = 0;
            }
            
        }

        //dd($matriz, min($matriz_aux), array_search(min($matriz_aux), $matriz_aux, false));
        echo 'F ' . array_search(min($matriz_aux), $matriz_aux, false) . '<br>';
        return array_search(min($matriz_aux), $matriz_aux, false);
    }

    public function convertirenceroini($matriz, $indice, $restriccion, $variable, $cont)
    {           
        $variable = count($matriz[1]);
        $busqueda = array_search('A1', $matriz[1], false);
        $auxcont = 1;
        $punto = 1;

        for ($i=1; $i < $variable; $i++) { 
            if ($matriz[1][$i] == -1 || $matriz[1][$i] == '-1') {
                for($y = 1; $y < $restriccion+2; $y++){
                    if($matriz[$y][$i] == 1){       
                        $punto = $y;
                        for ($n=1; $n < $variable; $n++) { 
                            $matriz[1][$n] = $matriz[1][$n] + $matriz[$punto][$n];
                        }
                    }
                } 
            }
        }
        //dd($matriz, $matriz[$busqueda][3]);
            
        return $matriz;
    }

    public function convertirenuno($matriz, $restriccion, $variable, $columna, $fila)
    {
        $variable = count($matriz[1]);

        $dato = $matriz[$fila][$columna];
        $operacion = $dato;
        //dd($dato, $matriz);
        for ($i = 1; $i < $variable; $i++) { 
            

            if($matriz[$fila][$i] != 0){
                if ($dato != 0) {
                    $matriz[$fila][$i] = (double) ($matriz[$fila][$i] / $dato);
                }else{
                    $matriz[$fila][$i] = 0;
                }
                
            }else{
                $matriz[$fila][$i] = 0;
            }
            

        }
        //dd($matriz[$fila][$columna], $matriz, $dato, $columna, $fila);    
        return $matriz;
    }

    public function convertirencero($matriz, $restriccion, $variable, $columna, $fila)
    {     
        $variable = count($matriz[1]);

        $matriz_aux = array();

        for($i = 1; $i <= $restriccion; $i++){
            for($y = 1; $y <= $variable; $y++){
                $matriz_aux[$i][$y] = 0;
           } 
        }

        //dd($matriz_aux);

        $dato = $matriz[$fila][$columna];
        $dato2 = 0;

        $operacion = $dato;

        for ($i = 1; $i < $restriccion+2; $i++) { 
            for ($y = 1; $y < $variable; $y++) {
                
                //$matriz_aux = $matriz[$i];
                if($fila != $i){

                    $dato = $matriz[$fila][$y];
                    $dato2 = $matriz[$i][$columna];

                    $operacion = (double)(-1*($dato2 * $dato)) + $matriz[$i][$y];
                    //echo (double)$operacion . ' ';
                    $matriz_aux[$i][$y] = (double)$operacion;
                    //echo $dato2 . ' - ' . $dato; 
                    //$matriz[$i][$y] = $matriz_aux;
                    //$matriz[1][$y] = (double)$operacion + 0;
                    //dd('paraa');
                    //$matriz[$i][$y] = (double)$operacion + 0;
                } //echo '<br>';

            }
            
            //echo '<br>';
        }

        for ($i = 1; $i < $restriccion+2; $i++) { 
            for ($y = 1; $y < $variable; $y++) {
                if($fila != $i){
                    $matriz[$i][$y] = $matriz_aux[$i][$y];
                }
                
            }
        }
            
        for ($i = 1; $i < $restriccion+2; $i++) { 

                    //echo '| '. $matriz[$i][5] . ' | ' . $matriz[$i][7] . ' | '; 
            //echo '<br>';
        }

        //dd($matriz_aux, $matriz);
        //dd($matriz[$fila][$columna], $matriz, $dato, $columna, $fila);    
        return $matriz;
    }

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
