@extends('pagina.template.principal')

@section('titulo', 'Usuarios')

@section('js1')

@endsection

@section('pagina', 'Usuarios')

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

    {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'files' => true]) !!}

    <div class="box-body">
      <div class="form-group">
        {!! Form::label('Numero Cuenta', 'Numero Cuenta') !!}
        {!! Form::text('nro_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Identificador de la cuenta', 'required', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}

        {!! Form::label('Nombre', 'Nombre') !!}
        {!! Form::text('nombre_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Nombre Cuenta', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

        {!! Form::label('clase', 'Clase') !!}
        {!! Form::select('clase', ['ACTIVO' => 'ACTIVO', 'PASIVO' => 'PASIVO', 'PATRIMONIO' => 'PATRIMONIO', 'INGRESOS' => 'INGRESOS', 'GASTOS' => 'GASTOS', 'COSTOS' => 'COSTOS'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Clase', 'required']) !!}

        {!! Form::label('Estado', 'Estado') !!}
        {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado', 'required']) !!}

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