@extends('pagina.template.principal')

@section('titulo', 'categorias')

@section('js1')

@endsection

@section('pagina', 'categorias')

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

        {!! Form::open(['route' => 'categorias.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="box-body">
            <div class="form-group">

                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class'   => 'form-control', 'placeholder' => 'Nombre de la categoria']) !!}

                {!! Form::label('Estado', 'Estado') !!}
                {!! Form::select('estado', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Estado', 'required']) !!}

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
