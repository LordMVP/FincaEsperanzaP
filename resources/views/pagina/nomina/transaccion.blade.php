@extends('pagina.template.principal')

@section('titulo', 'Transacciones')

@section('js1')

@endsection

@section('pagina', 'Transacciones')

@section('contenido')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Contabilidad</h3> 
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
              @foreach ($nominas as $trans)
              <tr class="odd gradeX">
                <td>{{ $trans->id }}</td>
                <td>{{ $trans->num_cuenta }}</td>
                <td>{{ $trans->descripcion }}</td>
                <td>{{ $trans->fecha }}</td>
                @if($trans->naturaleza == 'Debito')
                <td>{{ $trans->saldo }}</td>
                <?php
                $debito = $debito + $trans->saldo;
                ?>
                <td>0</td>
                @else
                <td>0</td>
                <td>{{ $trans->saldo }}</td>
                <?php
                $credito = $credito + $trans->saldo;
                ?>
                @endif

              </tr>
              @endforeach
            </tbody>
          </table>
          
        </div>
        <div class="text-center">
          {!! $nominas->render() !!}
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


