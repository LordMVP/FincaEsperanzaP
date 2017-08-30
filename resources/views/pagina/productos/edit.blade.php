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

    {!! Form::open(['route' => ['productos.update', $productos], 'method' => 'PUT', 'files' => true]) !!}
    <div class="box-body">
      <div class="form-group">


        {!! Form::label('Productos', 'Productos') !!}
        {!! Form::text('name', $productos->name, ['class'   => 'form-control', 'placeholder' => 'Nombre del producto', 'required']) !!}

        {!! Form::label('Categoria', 'Categoria') !!}
        {!! Form::select('idcategoria', $categorias, $productos->idcategoria, [ 'id' => 'idcategoria', 'class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}

        {!! Form::label('Precio', 'Precio') !!}
        {!! Form::number('price', $productos->price, ['class'   => 'form-control', 'placeholder' => 'Digite Precio']) !!}

        {!! Form::label('Tamaño (kg)', 'Tamaño (kg)') !!}
        {!! Form::number('tamano', $productos->tamano, ['class' => 'form-control', 'placeholder' => 'Tamaño promedio']) !!}

        {!! Form::label('Estado', 'Estado') !!}
        {!! Form::select('active', ['1' => 'Activo', '0' => 'Inactivo'], $productos->active, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado', 'required']) !!}

        <br>
        {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
        {!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
      </br>
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