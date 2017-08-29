@extends('pagina.template.principal')

@section('titulo', 'Inventario')

@section('js1')

@endsection

@section('pagina', 'Inventario')

@section('contenido')

<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header">Listado Inventario</h3> 
  </div>
</div>

<div class="row">
  <div class="col-md-5">
    <div class="form-group">
      {!! Form::open(['route' => 'inventario.index', 'method' => 'GET', 'files' => true, 'class' => '']) !!}

      {!! Form::select('producto', $productos, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Producto', 'id' => 'producto', 'name' => 'producto', 'required']) !!}

    </div>
  </div>
  <div class="col-md-5">
    <button type="submit" class="glyphicon glyphicon-search btn btn-default btn-xs" title="Busqueda"> </button>

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
                <th>Fecha</th>
                <th>Producto</th>
                <th>Detalle</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th>Cantidad T</th>
                <th>Valor Unitario T</th>
                <th>Valor Total T</th>  
                <th style="display:none">Accion</th>
              </tr>
            </thead>
            <tbody>
              @if (count($inventarios) == 0)
              <tr class="odd gradeX" >
                <td colspan="9">No Tiene Items Este Producto</td>
              </tr>
              @else

              @for ($i = 0; $i < count($inventarios); $i++)

              @if ($inventarios[$i]->detalle == "-1")
              <tr class="odd gradeX" style="border: red 2px solid;">
                @else
                @endif


                <td>{{ $inventarios[$i]->fecha }}</td>
                <td>{{ $inventarios[$i]->nombre }}</td>

                @if ($inventarios[$i]->detalle == "1")
                <td>Compra</td>
                @elseif ($inventarios[$i]->detalle == "-1")
                <td>Venta</td>
                @endif
                
                <?php 

                $inventarios[$i]->precio = str_replace('.', '',rtrim($inventarios[$i]->precio, '0'));
                $inventarios[$i]->total = str_replace('.', '',rtrim($inventarios[$i]->total, '0'));

                if($i == 0){
                  $inventarios[$i]->tcantidad = $inventarios[$i]->cantidad;
                  $inventarios[$i]->tprecio = $inventarios[$i]->precio;
                  $inventarios[$i]->ttotal  = $inventarios[$i]->total;
                }else{

                  if ($inventarios[$i]->detalle == "1"){
                    $inventarios[$i]->tcantidad = $inventarios[$i]->cantidad + $inventarios[$i-1]->tcantidad;
                    $inventarios[$i]->ttotal = $inventarios[$i]->total + $inventarios[$i-1]->ttotal;
                    $inventarios[$i]->tprecio = $inventarios[$i]->ttotal / $inventarios[$i]->tcantidad;
                  }else if ($inventarios[$i]->detalle == "-1"){
                    //$inventarios[$i]->precio
                    $inventarios[$i]->tcantidad = $inventarios[$i-1]->tcantidad - $inventarios[$i]->cantidad;
                    $inventarios[$i]->ttotal = $inventarios[$i-1]->ttotal - $inventarios[$i]->total;
                    $inventarios[$i]->tprecio = $inventarios[$i]->total / $inventarios[$i]->cantidad;
                  }
                }

                ?>


                <td>{{ $inventarios[$i]->cantidad }}</td>
                <td>{{ $inventarios[$i]->precio }}</td>
                <td>{{ $inventarios[$i]->total }}</td>

                <td>{{ $inventarios[$i]->tcantidad }}</td>
                <td>{{ $inventarios[$i]->tprecio }}</td>
                <td>{{ $inventarios[$i]->ttotal }}</td>

              </tr>

              @endfor

              @endif


            </tbody>
          </table>

        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
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

<script type="text/javascript">

  $("#producto").chosen({
    search_contains: true,
    no_results_text: "Oops, nothing found!",
    allow_single_deselect: true
  }); 

</script>

@endsection


