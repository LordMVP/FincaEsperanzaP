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
            <li>
                {{ $error }}
            </li>
            @endforeach
        </div>
        @endif

        {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('cedula', 'Cedula') !!}
                {!! Form::text('id', null, ['class'       => 'form-control', 'placeholder' => 'Numero De Cedula', 'required', 'pattern' => '[0-9]{8,30}', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}

                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class'   => 'form-control', 'placeholder' => 'Nombre Completo', 'required', 'pattern' => '[A-Za-z ]+', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

                {!! Form::label('apellido', 'Apellido') !!}
                {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'pattern' => '[A-Za-z.Ññ ]+', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

                {!! Form::label('genero', 'Genero') !!}
                {!! Form::select('genero', ['masculino'   => 'Masculino', 'femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Genero', 'required']) !!}

                {!! Form::label('telefono', 'Telefono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '325698785']) !!}

                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class'   => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}

                {!! Form::label('Sueldo', 'Sueldo') !!}
                {!! Form::number('sueldo', null, ['class'   => 'form-control', 'pattern' => '[0-9]{4,30}', 'placeholder' => 'Digite el salario para esta persona. Ej: 2950000', 'required', 'title' => 'Digite el salario para esta persona']) !!}

                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required', 'pattern' => "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}", 'title' => 'Debe contener al menos un número y una mayúscula y minúscula, y al menos 8 o más caracteres']) !!}

                {!! Form::label('tipo', 'Nivel De Usuario') !!}
                {!! Form::select('tipo', ['Administrador' => 'Administrador', 'Usuario' => 'Usuario'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'tipo']) !!}

                {!! Form::label('imagen', 'Imagen') !!}
                {!! Form::file('imagen', ['class' => '']) !!}
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
