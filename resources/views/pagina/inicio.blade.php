@extends('pagina.template.principal')

@section('titulo', 'Inicio')

@section('js1')

@endsection

@section('pagina', 'Inicio')

@section('contenido')

<div class="row">
  <!-- ./col -->

    @if(Auth::user()->tipo == 'Administrador')

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
              </h3>
              <p>Modelo De Optimización</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('modelo.index') }}" class="small-box-footer">Acceder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('usuarios.index') }}" class="small-box-footer">informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    @else

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>  <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
              </h3>
              <p>Modelo De Optimización</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('modelo.index') }}" class="small-box-footer">Acceder <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    @endif



</div>


</div>

@endsection


@section('js2')

@endsection