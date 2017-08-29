@extends('pagina.template.principal')

@section('titulo', 'Variables')

@section('js1')

@endsection

@section('pagina', 'Variables')

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

        {!! Form::open(['route' => 'variables.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('Variable', 'Variable') !!}
                {!! Form::number('variable', null, ['class'   => 'form-control', 'placeholder' => 'Numero de la variable. Ej 1 => X1', 'required']) !!}

                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class'   => 'form-control', 'placeholder' => 'Nombre de la variable']) !!}

                {!! Form::label('descripcion', 'Descripcion') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion de la variable']) !!}

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
