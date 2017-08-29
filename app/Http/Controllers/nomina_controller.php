<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;

use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\User;
use DB;
use FincaEsperanza\nomina;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use FincaEsperanza\cuentas_nomina;

class nomina_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //dd($request);
        $usuarios = User::orderBy('id', 'ASC')->get();

        //$nominas = nomina::OrderBy('id_nomina', 'ASC')->get();
        $nominas = DB::select('SELECT * FROM nomina1');

        for ($i=0; $i < count($nominas); $i++) { 
            $user_aux = User::find($nominas[$i]->cedula);
            //dd($nominas[$i]->cedula);
            $nominas[$i]->nombre = $user_aux->nombre . ' ' . $user_aux->apellido;
        }

        return view('pagina.nomina.nomina')->with('nominas', $nominas)->with('usuarios', $usuarios);
    }

    public function usuario($id){
        //dd($id);
        $user_aux = User::find($id);
        return $user_aux;
        
    }

    public function contabilidad()
    {

        $cuentas_nomina = cuentas_nomina::orderBy('num_cuenta', 'DEC')->paginate(50);
        return view('pagina.nomina.transaccion')->with('nominas', $cuentas_nomina)->with('debito', 0)->with('credito', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::orderBy('id', 'ASC')->get();
        $aux_usuarios;

        foreach ($usuarios as $usuario) {
            //$aux_usuarios[$usuario->id] = $usuario->nombre . ' ' . $usuario->apellido;
            $aux_usuarios[$usuario->id] = $usuario->id;
        }

        return view('pagina.nomina.create')->with('usuarios', $usuarios)->with('aux_usuarios', $aux_usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $nomina = new nomina($request->all());
        $nomina->estado = "No Pago";
        $nomina->diastrabajados = $request->diastrabajados;

        //dd($request);
        $empleado = User::find($nomina->cedula);


        $nomina->save();
        Flash::success("Se ha Creado La Nomina del empleado " . $empleado->nombre . ' ' . $empleado->apellido);
        return redirect()->route('nomina.index');
        //dd($nomina);
        /*cedula
        sueldo
        sueldobasico
        horash
        transporte
        comisiones
        bonificaciones
        devengado
        salud
        pension
        riesgos
        rtefuente
        libranza
        fondos
        embargos
        caja
        icbf
        sena
        cesantias
        intecesantias
        primaservi
        vacaciones
        deducido
        total
        fecha
        estado*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $nomina = nomina::find($id);

        
        $usuario = User::find($nomina->cedula);

        //dd($nomina);


        return view('pagina.nomina.show')->with('nomina', $nomina)->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nomina = nomina::find($id);

        
        $usuario = User::find($nomina->cedula);

        //dd($nomina);


        return view('pagina.nomina.edit')->with('nomina', $nomina)->with('usuario', $usuario);
    }

    public function cambioestado(Request $request)
    {


        $nomina = nomina::find($request->id_nomina);

        $usuario = User::find($nomina->cedula);

        //`id`, `num_cuenta`, `naturaleza`, `saldo`, `descripcion`, `fecha`        

        //$cuentas_nomina = new cuentas_nomina();

        

        if($request->estado == 'No Pago' || $request->estado == 'Cancelado'){

            Flash::success("Se ha cambiado el estado a No pago ");
            return redirect()->route('nomina.index');
        }else if($request->estado == 'Pago'){


            if($nomina->sueldobasico != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510506";
                $cuentas_nomina->naturaleza = "Debito";
                $cuentas_nomina->saldo = $nomina->sueldobasico;
                $cuentas_nomina->descripcion = "Sueldos";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
                
            }
            //dd($nomina, $request);
            if($nomina->horash != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510515";
                $cuentas_nomina->naturaleza = "Debito";
                $cuentas_nomina->saldo = $nomina->horash;
                $cuentas_nomina->descripcion = "Horas Extra";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->transporte != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510527";
                $cuentas_nomina->naturaleza = "Debito";
                $cuentas_nomina->saldo = $nomina->transporte;
                $cuentas_nomina->descripcion = "Aux transporte";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->comisiones != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510518";
                $cuentas_nomina->naturaleza = "Debito";
                $cuentas_nomina->saldo = $nomina->comisiones;
                $cuentas_nomina->descripcion = "Comisiones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->bonificaciones != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510548";
                $cuentas_nomina->naturaleza = "Debito";
                $cuentas_nomina->saldo = $nomina->bonificaciones;
                $cuentas_nomina->descripcion = "Bonificaciones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->salud != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237005";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->salud;
                $cuentas_nomina->descripcion = "Salud";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->pension != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "238030";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->pension;
                $cuentas_nomina->descripcion = "Pension";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->rtefuente != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "236505";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->rtefuente;
                $cuentas_nomina->descripcion = "Pension";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->libranza != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237030";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->libranza;
                $cuentas_nomina->descripcion = "Libranza";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->fondos != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237045";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->fondos;
                $cuentas_nomina->descripcion = "Fondo Empleados";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->embargos != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237025";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->embargos;
                $cuentas_nomina->descripcion = "Embargos";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();
            }

            if($nomina->total != 0){
                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "1110";
                $cuentas_nomina->naturaleza = "Credito";
                $cuentas_nomina->saldo = $nomina->total;
                $cuentas_nomina->descripcion = "Nomina Empleados";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510569";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.085;
                $cuentas_nomina->saldo = $nomina->salud;
                $cuentas_nomina->descripcion = "Aportes salud";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237005";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.085;
                $cuentas_nomina->saldo = $nomina->salud;
                $cuentas_nomina->descripcion = "Aportes salud";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510570";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.12;
                $cuentas_nomina->saldo = $nomina->pension;
                $cuentas_nomina->descripcion = "Aportes pensiones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "238030";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.12;
                $cuentas_nomina->saldo = $nomina->pension;
                $cuentas_nomina->descripcion = "Aportes pensiones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510568";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.00522;
                $cuentas_nomina->saldo = $nomina->riesgos;
                $cuentas_nomina->descripcion = "ARL";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237006";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado - $nomina->transporte)*0.00522;
                $cuentas_nomina->saldo = $nomina->riesgos;
                $cuentas_nomina->descripcion = "ARL";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510539";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0417;
                $cuentas_nomina->saldo = $nomina->vacaciones;
                $cuentas_nomina->descripcion = "Vacaciones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "261015";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0417;
                $cuentas_nomina->saldo = $nomina->vacaciones;
                $cuentas_nomina->descripcion = "Vacaciones";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510536";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0833;
                $cuentas_nomina->saldo = $nomina->primaservi;
                $cuentas_nomina->descripcion = "Primas";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "253005";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0833;
                $cuentas_nomina->saldo = $nomina->primaservi;
                $cuentas_nomina->descripcion = "Primas";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510530";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0833; 
                $cuentas_nomina->saldo = $nomina->cesantias;
                $cuentas_nomina->descripcion = "Cesantias";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "261005";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = ($nomina->devengado)*0.0833;
                $cuentas_nomina->saldo = $nomina->cesantias;
                $cuentas_nomina->descripcion = "Cesantias";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510533";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.0833)*0.01);
                $cuentas_nomina->saldo = ($nomina->intecesantias);
                $cuentas_nomina->descripcion = "Int. Cesantias";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "261010";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.0833)*0.01);
                $cuentas_nomina->saldo = ($nomina->intecesantias);
                $cuentas_nomina->descripcion = "Int. Cesantias";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510575";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.03)); 
                $cuentas_nomina->saldo = ($nomina->icbf);
                $cuentas_nomina->descripcion = "ICBF";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510578";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.02));
                $cuentas_nomina->saldo = ($nomina->sena);
                $cuentas_nomina->descripcion = "Sena";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "510572";
                $cuentas_nomina->naturaleza = "Debito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.04));
                $cuentas_nomina->saldo = ($nomina->caja);
                $cuentas_nomina->descripcion = "Caja de compensacion";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

                $cuentas_nomina = new cuentas_nomina();
                $cuentas_nomina->num_cuenta = "237010";
                $cuentas_nomina->naturaleza = "Credito";
                //$cuentas_nomina->saldo = (($nomina->devengado*0.02)+($nomina->devengado*0.03)+($nomina->devengado*0.04));
                $cuentas_nomina->saldo = (($nomina->sena)+($nomina->caja)+($nomina->icbf));
                $cuentas_nomina->descripcion = "Parafiscales";
                $cuentas_nomina->fecha = $nomina->fecha;
                $cuentas_nomina->save();

            }

            $nomina->estado = "Pago";
            $nomina->save();
            Flash::success("Se ha Generado la nomina para el Empleado " . $usuario->nombre . ' ' . $usuario->apellido);
            return redirect()->route('nomina.index');
        }

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
        $nomina = nomina::find($id);
        $usuario = User::find($nomina->cedula);


        $nomina->cedula = $request->cedula;
        $nomina->sueldo = $request->sueldo;
        $nomina->sueldobasico = $request->sueldobasico;
        $nomina->horash = $request->horash;
        $nomina->transporte = $request->transporte;
        $nomina->comisiones = $request->comisiones;
        $nomina->bonificaciones = $request->bonificaciones;
        $nomina->devengado = $request->devengado;
        $nomina->salud = $request->salud;
        $nomina->pension = $request->pension;
        $nomina->riesgos = $request->riesgos;
        $nomina->rtefuente = $request->rtefuente;
        $nomina->libranza = $request->libranza;
        $nomina->fondos = $request->fondos;
        $nomina->embargos = $request->embargos;
        $nomina->caja = $request->caja;
        $nomina->icbf = $request->icbf;
        $nomina->sena = $request->sena;
        $nomina->cesantias = $request->cesantias;
        $nomina->intecesantias = $request->intecesantias;
        $nomina->primaservi = $request->primaservi;
        $nomina->vacaciones = $request->vacaciones;
        $nomina->deducido = $request->deducido;
        $nomina->total = $request->total;
        $nomina->fecha = $request->fecha;
        $nomina->estado = 'No Pago';
        //dd($request->all(), $id);

        $nomina->save();
        Flash::warning("Se ha Editado La Nomina del empleado " . $usuario->nombre . ' ' . $usuario->apellido);
        return redirect()->route('nomina.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $nomina = nomina::find($id);
        $nomina->delete();

        $empleado = User::find($nomina->cedula);

        Flash::error("Se ha Eliminado la nomina del empleado " . $empleado->nombre . ' ' . $empleado->apellido);
        return redirect()->route('nomina.index');
    }
}
