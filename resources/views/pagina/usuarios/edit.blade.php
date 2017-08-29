@extends('pagina.template.principal')

@section('titulo', 'Edicion')

@section('js1')

@endsection

@section('pagina', 'Edicion')

@section('contenido')

<div class="box-body">

  <div class="box box-primary">

    @if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
      @foreach ($errors->all() as $error) 
      <li>{{ $error }}</li>
      @endforeach
    </div>
    @endif

    {!! Form::open(['route' => ['usuarios.update', $user], 'method' => 'PUT', 'files' => true]) !!}

    <div class="box-body">
      <h3 class="page-header">Editar Usuario - {!! $user->nombre . ' ' . $user->apellido!!}</h3>
      <div class="form-group">
        {!! Form::label('cedula', 'Cedula') !!}
        {!! Form::text('id', $user->id, ['class' => 'form-control', 'placeholder' => 'Numero De Cedula', 'required', 'pattern' => '[0-9]{8,30}', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}

        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $user->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required', 'pattern' => '[A-Za-z.Ññ. ]{3,120}', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

        {!! Form::label('apellido', 'Apellido') !!}
        {!! Form::text('apellido', $user->apellido, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'pattern' => '[A-Za-z.Ññ. ]{3,120}', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

        {!! Form::label('genero', 'Genero') !!}
        {!! Form::select('genero', ['masculino' => 'Masculino', 'femenino' => 'Femenino'], $user->genero, ['class' => 'form-control', 'required'], $user->genero) !!}

        {!! Form::label('telefono', 'Telefono') !!}
        {!! Form::text('telefono', $user->telefono, ['class' => 'form-control', 'placeholder' => '325698785']) !!}

        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}

        {!! Form::label('Sueldo', 'Sueldo') !!}
        {!! Form::number('sueldo', $user->sueldo, ['class'   => 'form-control', 'pattern' => '[0-9]{4,30}', 'placeholder' => 'Digite el salario para esta persona. Ej: 2950000', 'required', 'title' => 'Digite el salario para esta persona']) !!}
        
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required', 'title' => 'Digite Contraseña']) !!}

        {!! Form::label('tipo', 'Nivel De Usuario') !!}
        {!! Form::select('tipo', ['Administrador' => 'Administrador', 'Usuario' => 'Usuario'], $user->tipo, ['class' => 'form-control', 'required'], $user->tipo) !!}

        {!! Form::label('imagen', 'Imagen') !!}
        {!! Form::file('imagen', ['class' => '', 'title' => 'HOla']) !!}

        <br>
        {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
        {!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
      </div>
    </div>

    {!! Form::close() !!}

    <br>
    <hr>
  </div>
</div>   

@endsection


@section('js2')

@endsection