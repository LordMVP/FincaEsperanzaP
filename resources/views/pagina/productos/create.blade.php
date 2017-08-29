@extends('pagina.template.principal')

@section('titulo', 'Productos')

@section('js1')

@endsection

@section('pagina', 'Productos')

@section('contenido')
<div class="box-body">
    <div class="box box-primary">
        @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </div>
        @endif

        {!! Form::open(['route' => 'productos.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="box-body">
            <div class="form-group">


                {!! Form::label('Productos', 'Productos') !!}
                {!! Form::text('name', null, ['class'   => 'form-control', 'placeholder' => 'Nombre del producto', 'required']) !!}

                {!! Form::label('Categoria', 'Categoria') !!}
                {!! Form::select('idcategoria', $categorias, null, [ 'id' => 'idcategoria', 'class' => 'form-control', 'placeholder' => 'Categoria', 'required']) !!}

                {!! Form::label('Precio', 'Precio') !!}
                {!! Form::number('price', null, ['class'   => 'form-control', 'placeholder' => 'Digite Precio']) !!}

                {!! Form::label('Tamaño (kg)', 'Tamaño (kg)') !!}
                {!! Form::number('tamano', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la variable']) !!}

                {!! Form::label('Estado', 'Estado') !!}
                {!! Form::select('active', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado', 'required']) !!}

                <br>
                {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
                {!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
            </br>
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <hr>
</hr>
</br>
</div>
</div>
@endsection


@section('js2')

@endsection
