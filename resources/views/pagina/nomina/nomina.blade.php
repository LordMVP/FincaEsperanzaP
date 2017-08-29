@extends('pagina.template.principal')

@section('titulo', 'Nomina')

@section('js1')

@endsection

@section('pagina', 'Nomina')

@section('contenido')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Nomina</h3> 
  </div>
</div>
<a href=" {{ route('nomina.create') }} " class="btn btn-info"> Registrar Nomina</a>
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
                <th>Numero Nomina</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Sueldo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nominas as $nomina)
              <tr class="odd gradeX">
                <td>{{ $nomina->id_nomina }}</td>
                <td>{{ $nomina->cedula }}</td>
                <td>{{ $nomina->nombre }}</td>
                <td>{{ $nomina->sueldo }}</td>
                <td>{{ $nomina->fecha }}</td>
                <td>{{ $nomina->estado }}</td>
                <td>

                  @if ($nomina->estado == "Pago")
                  <a href="" data-toggle="modal" data-target="#modalcomision" onclick="$('#id_nomina').val({{ $nomina->id_nomina }})" class="glyphicon glyphicon-pushpin btn btn-success disabled"></a>
                  @else
                  <a href="" data-toggle="modal" data-target="#modalcomision" onclick="$('#id_nomina').val({{ $nomina->id_nomina }})" class="glyphicon glyphicon-pushpin btn btn-success"></a>
                  @endif

                  <a href=" {{ route('nomina.show', $nomina->id_nomina) }} "  class="glyphicon glyphicon-eye-open btn btn-warning"></a>
                  <a href=" {{ route('nomina.edit', $nomina->id_nomina) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
                  <a disable="" href=" {{ route('nomina.destroy', $nomina->id_nomina) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
                  
                  

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
        </div>

        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- MODALS HORAS EXTRA -->
{!! Form::open(['route' => 'nomina.cambioestado', 'method' => 'POST', 'files' => true]) !!}
<div class="modal fade bs-example-modal-sm" id="modalcomision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pago de Nomina</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">

          <div class="box-body">



            {!! Form::hidden('id_nomina', null, ['class' => 'form-control', 'placeholder' => 'Numero De Nomina', 'required', 'id' => 'id_nomina']) !!}

            {!! Form::select('estado', ['No Pago' => 'No Pago', 'Cancelado' => 'Cancelado', 'Pago' => 'Pago'], null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Estado de la nomina', 'estado' => 'estado', 'name' => 'estado', 'required']) !!}

            

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" name="">
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection


@section('js2')

@endsection