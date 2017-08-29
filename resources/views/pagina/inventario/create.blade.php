@extends('pagina.template.principal')

@section('titulo', 'Transaccion')

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

  });


  function agregar(){

    var nro_cuenta = document.getElementById('nro_cuenta').value;
    var descripcion = document.getElementById('descripcion').value;
    var naturaleza = document.getElementById('naturaleza').value;
    var saldo = document.getElementById('saldo').value;
    //alert(nro_cuenta);
    console.log(saldo);

    if(nro_cuenta == "" || descripcion == "" || naturaleza == "" || saldo == ""){
      alert('Llene todos los campos');
    }else{

      document.getElementById('nro_cuenta').value = "";
      document.getElementById('descripcion').value = "";
      document.getElementById('naturaleza').value = "";
      document.getElementById('saldo').value = "";

      if(cont < 7){
        cont++;
        llenar(nro_cuenta, descripcion, naturaleza, saldo, cont);
      }else{
        alert('No se pueden realizar mas transacciones');
      }
      
    }

    console.log(cont);
  }

  function llenar(nro_cuenta, descripcion, naturaleza, saldo, cont){

    if(cont < 7){
      $('#tr'+cont).show();
      document.getElementById('c'+cont+'_cuenta').value = nro_cuenta;
      document.getElementById('c'+cont+'_descripcion').value = descripcion;


      if(naturaleza == "Debito"){
        document.getElementById('c'+cont+'_debito').value = saldo;
        document.getElementById('c'+cont+'_credito').value = 0;
      }else{
        document.getElementById('c'+cont+'_debito').value = 0;
        document.getElementById('c'+cont+'_credito').value = saldo;
      }
    }else{

      alert('No se pueden realizar mas transacciones');
    }
    

  }

  function limpiar(num){


    console.log(num);
    document.getElementById('c'+num+'_cuenta').value = "";
    document.getElementById('c'+num+'_descripcion').value = "";
    document.getElementById('c'+num+'_debito').value = "";
    document.getElementById('c'+num+'_credito').value = "";

    if(cont == num || cont == 1){
      cont--;
    }else{
      num++;
      console.log(num);
      var nro_cuenta = document.getElementById('c'+num+'_cuenta').value;
      var descripcion = document.getElementById('c'+num+'_descripcion').value;
      var naturaleza = "";
      var debito = document.getElementById('c'+num+'_debito').value;
      var credito = document.getElementById('c'+num+'_credito').value;

      if(debito == 0){
        var saldo = credito;
        naturaleza = "Credito";
      }else if(credito == 0){
        var saldo = debito;
        naturaleza = "Debito";
      }else if(debito == 0 && credito == 0){
        var saldo = 0;
      }
      num--;
      cont = num;
      llenar(nro_cuenta, descripcion, naturaleza, saldo, num);
    }
    $('#tr'+num).hide();
  }




</script>


@endsection

@section('pagina', 'Transaccion')

@section('contenido')

<div class="row text-left" >

  <div class="col-md-4">
  </div>

  <div class="col-md-4">

    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Datos transaccion</h3>
      </div>
      <div class="box-body">

        {!! Form::label('Cuenta', 'Cuenta') !!}
        {!! Form::select('nro_cuenta', $puc, null, [ 'id' => 'nro_cuenta', 'class' => 'form-control', 'placeholder' => 'Numero Cuenta', 'required']) !!}

        {!! Form::label('Descripcion', 'Descripcion') !!}
        {!! Form::text('descripcion', null, ['id' => 'descripcion', 'class' => 'form-control', 'placeholder' => 'Descripcion Movimiento', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}

        {!! Form::label('naturaleza', 'Naturaleza') !!}
        {!! Form::select('naturaleza', ['Debito' => 'Debito', 'Credito' => 'Credito'], null, ['id' => 'naturaleza', 'class' => 'form-control', 'placeholder' => 'Seleccione naturaleza', 'required']) !!}

        {!! Form::label('Saldo', 'Saldo') !!}
        {!! Form::number('saldo', null, ['id' => 'saldo', 'class' => 'form-control', 'placeholder' => 'Saldo', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
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
        <h3 class="box-title">Cuentas</h3>
      </div>

      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Movimientos</h3>

          </div>
          {!! Form::open(['route' => 'transaccion.transar', 'method' => 'POST', 'files' => true]) !!}

          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>Cuenta</th>
                <th>Descripcion</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Accion</th>
              </tr>
              <tr id="tr1" >
                <td><input style="border:none" type="text" name="c1_cuenta" id="c1_cuenta"></td>
                <td><input style="border:none" type="text" name="c1_descripcion" id="c1_descripcion"></td>
                <td><input style="border:none" type="text" name="c1_debito" id="c1_debito"></td>
                <td><input style="border:none" type="text" name="c1_credito" id="c1_credito"></td>
                <td><a onclick="limpiar('1')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr2">
                <td><input style="border:none" type="text" name="c2_cuenta" id="c2_cuenta"></td>
                <td><input style="border:none" type="text" name="c2_descripcion" id="c2_descripcion"></td>
                <td><input style="border:none" type="text" name="c2_debito" id="c2_debito"></td>
                <td><input style="border:none" type="text" name="c2_credito" id="c2_credito"></td>
                <td><a onclick="limpiar('2')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr3">
                <td><input style="border:none" type="text" name="c3_cuenta" id="c3_cuenta"></td>
                <td><input style="border:none" type="text" name="c3_descripcion" id="c3_descripcion"></td>
                <td><input style="border:none" type="text" name="c3_debito" id="c3_debito"></td>
                <td><input style="border:none" type="text" name="c3_credito" id="c3_credito"></td>
                <td><a onclick="limpiar('3')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr4">
                <td><input style="border:none" type="text" name="c4_cuenta" id="c4_cuenta"></td>
                <td><input style="border:none" type="text" name="c4_descripcion" id="c4_descripcion"></td>
                <td><input style="border:none" type="text" name="c4_debito" id="c4_debito"></td>
                <td><input style="border:none" type="text" name="c4_credito" id="c4_credito"></td>
                <td><a onclick="limpiar('4')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr5">
                <td><input style="border:none" type="text" name="c5_cuenta" id="c5_cuenta"></td>
                <td><input style="border:none" type="text" name="c5_descripcion" id="c5_descripcion"></td>
                <td><input style="border:none" type="text" name="c5_debito" id="c5_debito"></td>
                <td><input style="border:none" type="text" name="c5_credito" id="c5_credito"></td>
                <td><a onclick="limpiar('5')" title="limpiar" class="glyphicon glyphicon-trash btn btn-danger"></a></td>
              </tr>
              <tr id="tr6">
                <td><input style="border:none" type="text" name="c6_cuenta" id="c6_cuenta"></td>
                <td><input style="border:none" type="text" name="c6_descripcion" id="c6_descripcion"></td>
                <td><input style="border:none" type="text" name="c6_debito" id="c6_debito"></td>
                <td><input style="border:none" type="text" name="c6_credito" id="c6_credito"></td>
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

  $("#nro_cuenta").chosen({
    search_contains: true,
    no_results_text: 'No Se Encontraron Resultados'
  });

</script>

@endsection