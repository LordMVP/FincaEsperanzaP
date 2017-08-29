<?php

namespace FincaEsperanza\Http\Controllers;

use FincaEsperanza\Http\Controllers\Controller;
use FincaEsperanza\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class usuarios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Usuarios");

        return view('pagina.usuarios.usuarios')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('hola');
        $usuario = new User($request->all());

        $v = \Validator::make($request->all(), [

            'imagen' => 'required|max:10000|mimes:png,jpg,jpeg,gif'
            ]);
        
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\bootstrap\dist\img';
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'avatar5.png';
            } else {
                $usuario->imagen = 'avatar2.png';
            }
        }
        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('usuarios.index');

    }

    public function recuperacion(Request $request)
    {
        dd($request);
        $usuario = User::orderBy('id', 'ASC')->where('email', '=', $request->email)->get();
        //$usuario->save();
        $usuario[0]->password = bcrypt($usuario[0]->id);
        $usuario[0]->save();
        
        Flash::success("Se ha Restablecido El Usuario - por favor ingresa con el documento registrado");
        return view('pagina.index');
    }

    public function store2(Request $request)
    {
        //dd($request->all());
        $usuario = new User($request->all());

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\bootstrap\dist\img';
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'avatar5.png';
            } else {
                $usuario->imagen = 'avatar2.png';
            }
        }
        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return view('pagina.index');

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
        $user = User::find($id);
        return view('pagina.usuarios.edit')->with('user', $user);
    }

    public function edicion($id)
    {
        $user = User::find($id);
        return view('pagina.usuarios.edit2')->with('user', $user);
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
        $usuario = User::find($id);

        $usuario->id       = $id;
        $usuario->nombre   = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero   = $request->genero;
        $usuario->telefono = $request->telefono;
        $usuario->email    = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo     = $request->tipo;
        $usuario->sueldo   = $request->sueldo;

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\bootstrap\dist\img';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'avatar5.png';
            } else {
                $usuario->imagen = 'avatar2.png';
            }
        }
        //dd($usuario);
        $usuario->save();

        Flash::warning("Se ha Editado El Usuario " . $request->nombre . ' ' . $request->apellido);

        return redirect()->route('usuarios.index');

    }

    public function modificacion(Request $request)
    {
        $id      = Auth::user()->id;
        $usuario = User::find($id);

        $usuario->id       = $id;
        $usuario->nombre   = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero   = $request->genero;
        $usuario->telefono = $request->telefono;
        $usuario->email    = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo     = $request->tipo;
        //$usuario->sueldo   = $request->sueldo;

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\bootstrap\dist\img';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'avatar5.png';
            } else {
                $usuario->imagen = 'avatar2.png';
            }
        }
        //dd($usuario);
        $usuario->save();

        Flash::warning("Se ha Editado El Usuario " . $request->nombre . ' ' . $request->apellido);

        return view('pagina.inicio');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Usuario " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('usuarios.index');
    }
}
