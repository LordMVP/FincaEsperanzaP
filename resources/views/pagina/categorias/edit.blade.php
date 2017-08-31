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

    {!! Form::open(['route' => ['categorias.update', $categorias], 'method' => 'PUT', 'files' => true]) !!}

    <div class="box-body">
      <h3 class="page-header">Editar categorias - {!! $categorias->nombre !!}</h3>
      <div class="form-group">


        {!! Form::hidden('idcategoria', $categorias->idcategoria, ['class' => 'form-control']) !!}

        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $categorias->nombre, ['class'   => 'form-control', 'placeholder' => 'Nombre de la categoria']) !!}

        {!! Form::label('Estado', 'Estado') !!}
        {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], $categorias->estado, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado', 'required']) !!}

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