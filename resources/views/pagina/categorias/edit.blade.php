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

    {!! Form::open(['route' => ['variables.update', $variables], 'method' => 'PUT', 'files' => true]) !!}

    <div class="box-body">
      <h3 class="page-header">Editar variables - {!! 'X' . $variables->variable . ' ' . $variables->nombre!!}</h3>
      <div class="form-group">


        {!! Form::hidden('idvariables', $variables->idvariables, ['class' => 'form-control']) !!}

        {!! Form::label('Variable', 'Variable') !!}
        {!! Form::number('variable', $variables->variable, ['class'   => 'form-control', 'placeholder' => 'Numero de la variable. Ej 1 => X1', 'required']) !!}

        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $variables->nombre, ['class'   => 'form-control', 'placeholder' => 'Nombre de la variable']) !!}

        {!! Form::label('descripcion', 'Descripcion') !!}
        {!! Form::text('descripcion', $variables->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripcion de la variable']) !!}

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