<?php

namespace FincaEsperanza\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use FincaEsperanza\Http\Requests;
use FincaEsperanza\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use FincaEsperanza\User;

class mail_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function restablecer($id, $hora, $rand)
    {   

        $time3 = date('H:i:s', time());
        $rand = base64_decode(base64_decode($rand));

        for($i = 0; $i < $rand; $i++){
            $id = base64_decode($id);
            $hora = base64_decode($hora);
        }

        $user = User::find($id);
        $hora = explode(':', $hora);
        $time3 = explode(':', $time3);

        $horaaux = $hora[0];
        $horaaux += 2;


        /*if($horaaux > 21){
            $horaaux = $horaaux - 24;
        }*/

        /*dd($horaaux, $hora[0]);
        if($hora[0] > $horaaux){
            Flash::error("Tiempo de recuperacion ha terminado, vuelva a solicitar la recuperacion de la contraseña");
            return redirect()->route('pagina.index');
        }else{*/
            if(!empty($user)){
                return view('pagina.emails.restablecer')->with('user', $user);
            }else{
                Flash::success("Usuario no registrado, verifique Email¡¡");
                return redirect()->route('pagina.index');
            }

        //}

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
        //dd($request);


        $email = $request->email;
        $mensaje = "";
        $usuario = User::orderBy('id', 'ASC')->where('email', '=', $email)->get();
        //$usuario->save();
        //dd(count($usuario));
        if(count($usuario) > 0){
            $usuario[0]->password = bcrypt($usuario[0]->id);
            $request["id"] = $usuario[0]->id;
            //$request->mensaje = "Recuperación Contraseña de Acceso a PigModel";
            //dd($request);
            Mail::send('pagina.emails.recuperacion', $request->all(), function($msj) use ($email){

                $msj->subject('PigModel - Recuperación de Contraseña');
                $msj->to($email);
            });
            //dd($request);
            $usuario[0]->save();
            $mensaje = "Recuperación Exitosa Por favor revisar el correo para restablecer su contraseña";
            Flash::success($mensaje);
        }else{
            $mensaje = "Esta Cuenta no se encuentra asociada para ingreso a nuestro sistema";
            Flash::warning($mensaje);
        }
        

        
        return redirect()->route('pagina.index');
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
       // dd($id);
        $usuario = User::find($id);
        $usuario->id       = $id;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        Flash::warning("Se ha Restablecido la contraseña para el usuario " . $usuario->nombre . ' ' . $usuario->apellido);

        return redirect()->route('pagina.index');
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
