@extends('pagina.template.principal')

@section('titulo', 'Transacciones')

@section('js1')

@endsection

@section('pagina', 'Transacciones')

@section('contenido')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Listado transacciones</h3> 
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <a href=" {{ route('transaccion.create') }} " class="btn btn-info"> Registrar nueva transaccion</a>
  </div>
  <div class="col-lg-5">
  </div>
  <div class="col-lg-3">
    {!! Form::open(['route' => 'transaccion.index', 'method' => 'GET', 'files' => true]) !!}

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
                <th>Numero Transaccion</th>
                <th>Cuenta</th>
                <th>Descripcion</th>
                <th>Fecha Operacion</th>
                <th>Debito</th>
                <th>Credito</th>
                <th style="display:none">Accion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaccion as $trans)
              <tr class="odd gradeX">
                <td>{{ $trans->num_compro }}</td>
                <td>{{ $trans->num_cuenta }}</td>
                <td>{{ $trans->descripcion }}</td>
                <td>{{ $trans->fecha_operacion }}</td>
                @if($trans->naturaleza == "Debito")
                <td>{{ $trans->saldo }}</td>
                <td>0</td>
                @else
                <td>0</td>
                <td>{{ $trans->saldo }}</td>
                @endif

                <td style="display:none">
                  <a href=" {{ route('transaccion.edit', $trans->nro_cuenta) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
                  <a href=" {{ route('transaccion.destroy', $trans->nro_cuenta) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="text-center">
          {!! $transaccion->render() !!}
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-danger">Debito</button>
            </div>

            <input disabled type="text" class="form-control" value="{{ $debito }}">
            <div class="clearfix"></div>
            <div class="input-group-btn">
              <button type="button" class="btn btn-danger">Credito</button>
            </div>

            <input disabled type="text" class="form-control" value="{{ $credito }}">
          </div>

        </div>
        
        <br><br>
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


