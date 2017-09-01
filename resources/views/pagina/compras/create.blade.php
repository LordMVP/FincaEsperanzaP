@extends('pagina.template.principal')

@section('titulo', 'Compras')

@section('js1')

<link rel="stylesheet" type="text/css" href="{{ asset('plugin/chosen/chosen.css') }}">

<script type="text/javascript">

  var cont = 0;

  $(document).ready(function(){

    $('#tr1').hide();
    $('#tr2').hide();
    $('#tr3').hide();
    $('#tr4').hide();
    $('#tr5').hide();
    $('#tr6').hide();

    $("#cantidad").keyup(function() {
        //$("#total").val((parseFloat($('#cantidad').val()))*(parseFloat($('#valor').val())));
        $("#total").val(parseFloat($('#valor').val())*parseFloat($('#cantidad').val()));
    });

    $("#valor").keyup(function() {
        $("#total").val(parseFloat($('#valor').val())*parseFloat($('#cantidad').val()));
        //$("#total").val((parseFloat($('#cantidad').val()))*(parseFloat($('#valor').val())));
    });

  });


  function agregar(){

    var id_product = document.getElementById('id_product').value;
    var descripcion = document.getElementById('descripcion').value;
    var cantidad = document.getElementById('cantidad').value;
    var valor = document.getElementById('valor').value;
    var total = document.getElementById('total').value;
    //alert(nro_cuenta);
    console.log(total);

    if(id_product == "" || descripcion == "" || cantidad == "" || valor == "" || total == ""){
      alert('Llene todos los campos');
    }else{

      document.getElementById('id_product').value = "";
      document.getElementById('descripcion').value = "";
      document.getElementById('cantidad').value = "";
      document.getElementById('valor').value = "";
      document.getElementById('total').value = "";

      if(cont < 7){
        cont++;
        llenar(id_product, descripcion, cantidad, valor, total, cont);
      }else{
        alert('No se pueden realizar mas transacciones');
      }
      
    }

    console.log(cont);
  }

  function llenar(id_product, descripcion, cantidad, valor, total, cont){

    if(cont < 7){
      $('#tr'+cont).show();
          document.getElementById('c'+cont+'_producto').value = id_product;
          document.getElementById('c'+cont+'_descripcion').value = descripcion;
          document.getElementById('c'+cont+'_cantidad').value = cantidad;
          document.getElementById('c'+cont+'_valor').value = valor;
          document.getElementById('c'+cont+'_total').value = total;
    }else{

      alert('No se pueden realizar mas transacciones');
    }
    

  }

  function limpiar(num){


    console.log(num);
    document.getElementById('c'+num+'_producto').value = "";
    document.getElementById('c'+num+'_descripcion').value = "";
    document.getElementById('c'+num+'_cantidad').value = "";
    document.getElementById('c'+num+'_valor').value = "";
    document.getElementById('c'+num+'_total').value = "";

    if(cont == num || cont == 1){
      cont--;
    }else{
      num++;
      console.log(num);

      var id_product = document.getElementById('c'+num+'_producto').value;
      var descripcion = document.getElementById('c'+num+'_descripcion').value;
      var cantidad = document.getElementById('c'+num+'_cantidad').value;
      var valor = document.getElementById('c'+num+'_valor').value;
      var total = document.getElementById('c'+num+'_total').value;

      num--;
      cont = num;
      llenar(id_product, descripcion, cantidad, valor, total, num);
    }
    $('#tr'+num).hide();
  }




</script>


@endsection

@section('pagina', 'Compras')

@section('contenido')

<div class="row text-left" >

  <div class="col-md-3">
  </div>

  <div class="col-md-6">

    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Datos Compra</h3>
      </div>
      <div class="box-body">

        {!! Form::label('Productos', 'Productos') !!}
        {!! Form::select('id_product', $productos, null, [ 'id' => 'id_product', 'class' => 'form-control', 'placeholder' => 'Productos', 'required']) !!}

        {!! Form::label('Descripcion', 'Descripcion') !!}
        {!! Form::text('descripcion', null, ['id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Descripcion de la compra', 'title' => 'Descripcion de la compra']) !!}

        {!! Form::label('Cantidad', 'Cantidad') !!}
        {!! Form::number('cantidad', 0, ['id' => 'cantidad', 'class' => 'form-control', 'placeholder' => 'Cantidad', 'title' => 'Cantidad de items', 'value' => '0']) !!}

        {!! Form::label('Valor Unitario', 'Valor Unitario') !!}
        {!! Form::number('valor', 0, ['id' => 'valor', 'class' => 'form-control', 'placeholder' => 'Valor', 'title' => 'Valor unitario', 'value' => '0']) !!}

        {!! Form::label('Total', 'Total') !!}
        {!! Form::number('total', 0, ['id' => 'total', 'class' => 'form-control', 'placeholder' => 'Total', 'title' => 'Valor total productos', 'readonly' => '']) !!}

        <br>
        <button type="submit" class="btn btn-danger" onclick="agregar()">Agregar</button>
        {!! Form::button('Volver', ['class' => 'btn btn-danger', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (left) -->

</div>
<!-- /.row -->

<div class="row">

  <div class="col-md-12">

    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Productos</h3>
      </div>

      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Movimientos</h3>

          </div>
          {!! Form::open(['route' => 'compras.transar', 'method' => 'POST', 'files' => true]) !!}

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>Producto</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Valor</th>
                <th>Valor</th>
                <th>Accion</th>
              </tr>
              <tr id="tr1" >
                <td><input style="border:none" type="text" name="c1_producto" id="c1_producto"></td>
                <td><input style="border:none" type="text" name="c1_descripcion" id="c1_descripcion"></td>
                <td><input style="border:none" type="text" name="c1_cantidad" id="c1_cantidad"></td>
                <td><input style="border:none" type="text" name="c1_valor" id="c1_valor"></td>
                <td><input style="border:none" type="text" name="c1_total" id="c1_total"></td>
                <td><a onclick="limpiar('1')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr2">
                <td><input style="border:none" type="text" name="c2_producto" id="c2_producto"></td>
                <td><input style="border:none" type="text" name="c2_descripcion" id="c2_descripcion"></td>
                <td><input style="border:none" type="text" name="c2_cantidad" id="c2_cantidad"></td>
                <td><input style="border:none" type="text" name="c2_valor" id="c2_valor"></td>
                <td><input style="border:none" type="text" name="c2_total" id="c2_total"></td>
                <td><a onclick="limpiar('2')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr3">
                <td><input style="border:none" type="text" name="c3_producto" id="c3_producto"></td>
                <td><input style="border:none" type="text" name="c3_descripcion" id="c3_descripcion"></td>
                <td><input style="border:none" type="text" name="c3_cantidad" id="c3_cantidad"></td>
                <td><input style="border:none" type="text" name="c3_valor" id="c3_valor"></td>
                <td><input style="border:none" type="text" name="c3_total" id="c3_total"></td>
                <td><a onclick="limpiar('3')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr4">
                <td><input style="border:none" type="text" name="c4_producto" id="c4_producto"></td>
                <td><input style="border:none" type="text" name="c4_descripcion" id="c4_descripcion"></td>
                <td><input style="border:none" type="text" name="c4_cantidad" id="c4_cantidad"></td>
                <td><input style="border:none" type="text" name="c4_valor" id="c4_valor"></td>
                <td><input style="border:none" type="text" name="c4_total" id="c4_total"></td>
                <td><a onclick="limpiar('4')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr5">
                <td><input style="border:none" type="text" name="c5_producto" id="c5_producto"></td>
                <td><input style="border:none" type="text" name="c5_descripcion" id="c5_descripcion"></td>
                <td><input style="border:none" type="text" name="c5_cantidad" id="c5_cantidad"></td>
                <td><input style="border:none" type="text" name="c5_valor" id="c5_valor"></td>
                <td><input style="border:none" type="text" name="c5_total" id="c5_total"></td>
                <td><a onclick="limpiar('5')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr6">
                <td><input style="border:none" type="text" name="c6_producto" id="c6_producto"></td>
                <td><input style="border:none" type="text" name="c6_descripcion" id="c6_descripcion"></td>
                <td><input style="border:none" type="text" name="c6_cantidad" id="c6_debito"></td>
                <td><input style="border:none" type="text" name="c6_valor" id="c6_valor"></td>
                <td><input style="border:none" type="text" name="c6_total" id="c6_total"></td>
                <td><a onclick="limpiar('6')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="box-body">




        <button type="submit" class="btn btn-info">Continuar</button>

      </div>
      {!! Form::close() !!}
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (left) -->

</div>

@endsection


@section('js2')


<script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>

<script type="text/javascript">

  $("#id_product").chosen({
    search_contains: true,
    no_results_text: 'No Se Encontraron Resultados'
  });

</script>

@endsection