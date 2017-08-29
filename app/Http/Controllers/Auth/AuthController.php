<?php

namespace FincaEsperanza\Http\Controllers\Auth;

use FincaEsperanza\User;
use Validator;
use FincaEsperanza\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;
use FincaEsperanza\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class AuthController extends Controller
{

    protected $redirectPath = '/inicio';
    protected $loginPath = '/?v=1';

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            ]);
    }

    protected function getLogin(){

       /* if($var == "index"){
            $this->inicio('index');
        }else if($var == "error"){
            Flash::error("Error en el inicio de sesion, porfavor verificar Correo y Contraseña" . " ");
        }else{
            $this->inicio('');
            //return view('pagina.index');
        }*/
        
        return view('pagina.index');
    }


    public function inicio(){

        if(isset($_GET['v']) == 1){
            if($_GET['v'] == 1){
                Flash::error("Error en el inicio de sesion, porfavor verificar Correo y Contraseña" . " ");
            }
        }

        /*if($var == "index"){
            Flash::success("Bienvenido");
        }else if($var == "error"){
            Flash::error("Error en el inicio de sesion, porfavor verificar Correo y Contraseña" . " ");
        }else if($var == "restablecer"){
            Flash::warning("Error en la restauracion, porfavor verificar Correo" . " ");
        }//else{*/
            //Flash::success("Bienvenido");
        //}


            return view('pagina.index');
        }
    }
