@extends('pagina.template.principal')

@section('titulo', 'PUC')

@section('js1')

@endsection

@section('pagina', 'PUC')

@section('contenido')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Listado PUC</h3> 
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <a href=" {{ route('puc.create') }} " class="btn btn-info"> Registrar nueva cuenta</a>
  </div>
  <div class="col-lg-5">
  </div>
  <div class="col-lg-3">
    {!! Form::open(['route' => 'puc.index', 'method' => 'GET', 'files' => true]) !!}

    {!! Form::text('busqueda', null, ['class' => 'form-control', 'placeholder' => 'Busqueda']) !!}

    {!!  Form::close() !!}
  </div>

</div>

<hr>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>Cuenta</th>
                <th>Nombre</th>
                <th>Clase</th>
                <th>Estado</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($puc as $pu)
              <tr class="odd gradeX">
                <td>{{ $pu->nro_cuenta }}</td>
                <td>{{ $pu->nombre_cuenta }}</td>
                <td>{{ $pu->clase }}</td>

                @if($pu->estado == 1)
                <td>Activo</td> 
                @else
                <td>Inactivo</td>
                @endif
                
                <td>
                  <a href=" {{ route('puc.edit', $pu->nro_cuenta) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
                  <a href=" {{ route('puc.destroy', $pu->nro_cuenta) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="text-left">
          {!! $puc->render() !!}
        </div>
        {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@endsection


@section('js2')

@endsection