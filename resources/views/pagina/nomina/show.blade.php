@extends('pagina.template.principal')

@section('titulo', 'Creacion Nomina')

@section('js1')

<script type="text/javascript">

  var sueldobasico = 0;
  var tdevengado = 0;
  var tdeducido = 0;

  var diastrabajados = 0;
  var sueldo = 0;
  var hextras = 0;
  var auxtransporte = 0;
  var comisiones = 0;
  var bonificaciones = 0;
  var salud = 0;
  var pension = 0;
  var retencion = 0;
  var libranza = 0;
  var fondo = 0;
  var bonificaciones = 0;
  var cesantias = 0;
  var intcesantias = 0;


  function calcular_dias(){

    var auxb = 0;
    sueldobasico = document.getElementById('sueldobasico').value;

    diastrabajados = document.getElementById('diastrabajados').value;;

    sueldo = (sueldobasico/30)*diastrabajados;

    document.getElementById('sueldo').value = sueldo;

    if(sueldobasico <= 1378910){
      auxtransporte = (77700/30)*diastrabajados;
      document.getElementById('auxtransporte').value = auxtransporte;
    }else{
      document.getElementById('auxtransporte').value = 0;
    }

  }

  function calcular_horasextra(){

    var horad = 0;
    var horan = 0;
    var horaf = 0;
    var pago1 = 0;
    var pago2 = 0;
    var pago3 = 0;
    var total = 0;

    var salariobasico = document.getElementById('sueldobasico').value;
    var horaextra = document.getElementById('valhora').value;


    var horasd = document.getElementById('horad').value;
    var horasn = document.getElementById('horan').value;
    var horasf = document.getElementById('horaf').value;

    horad = horaextra * horasd * 0.25;
    horan = horaextra * horasn * 0.75;
    horaf = horaextra * horasf * 0.75;

    pago1 = horasd * horaextra + horad;
    pago2 = horasn * horaextra + horan;
    pago3 = horasf * horaextra + horaf;

    total = pago1 + pago2 + pago3;

    document.getElementById('totalhoraextra').value = total;

  }

  function calcular_comisiones(){

    var total = 0;
    var ventas = document.getElementById('comisionventas').value;
    var porcentaje = document.getElementById('comisionporcentaje').value;

    total = ventas * porcentaje;
    document.getElementById('totalcomision').value = total;

  }

  function calcular_devengado(){

    var total = 0;

    var sueldo = document.getElementById('sueldo').value;
    var horas = document.getElementById('hextras').value;
    var transporte = document.getElementById('auxtransporte').value;
    var comisiones = document.getElementById('comisiones').value;
    var bonificaciones = document.getElementById('bonificaciones').value;

    total = (parseFloat(sueldo) + parseFloat(horas) + parseFloat(transporte) + parseFloat(comisiones) + parseFloat(bonificaciones));

    document.getElementById('tdevengado').value = total;

  }

  function calcular_deducido(){

    var total = 0;

    var salud = document.getElementById('salud').value;
    var pension = document.getElementById('pension').value;
    var rete = document.getElementById('retencion').value;
    var libranza = document.getElementById('libranza').value;
    var fondos = document.getElementById('fondo').value;
    var embargos = document.getElementById('embargos').value;

    var cesantias = document.getElementById('cesantias').value;
    var intecesantías = document.getElementById('intecesantías').value;
    var primaservi = document.getElementById('primaservi').value;
    var vacaciones = document.getElementById('vacaciones').value;

    //total = (parseFloat(salud) + parseFloat(pension) + parseFloat(rete) + parseFloat(libranza) + parseFloat(fondos) + parseFloat(embargos));
    total = (parseFloat(salud) + parseFloat(pension) + parseFloat(rete) + parseFloat(libranza) + parseFloat(fondos) + parseFloat(embargos) + parseFloat(cesantias) + parseFloat(intecesantías) + parseFloat(primaservi) + parseFloat(vacaciones));

    document.getElementById('tdeducido').value = total;

  }

  function calcular_saludpension(){

    var total = 0;
    var total = document.getElementById('tdevengado').value;
    var transporte = document.getElementById('auxtransporte').value;
    total = (total-transporte) * 0.04;

    document.getElementById('salud').value = total;
    document.getElementById('pension').value = total;
    document.getElementById('riesgos').value = total;
  }

  function calcular_cesantias(){

    var total = 0;
    var total = document.getElementById('tdevengado').value;
    var dias = document.getElementById('diastrabajados').value;
    total = (total*dias) / 360;

    document.getElementById('cesantias').value = total;
    document.getElementById('intecesantías').value = ((total*dias*0.12)/360);
  }

  function calcular_primaservi(){

    var total = 0;
    var total = document.getElementById('tdevengado').value;
    var dias = document.getElementById('diastrabajados').value;
    total = (total*dias) / 360;

    document.getElementById('primaservi').value = total;
  }

  function calcular_vacaciones(){

    var total = 0;
    var total = document.getElementById('sueldobasico').value;
    var dias = document.getElementById('diastrabajados').value;
    total = (total*dias) / 720;

    document.getElementById('vacaciones').value = total;
  }

  function calcular_cajacompensacion(){

    var total = 0;
    var total = document.getElementById('sueldobasico').value;
    var dias = document.getElementById('diastrabajados').value;
    total = (total*dias) / 720;

    document.getElementById('caja').value = total * 0.4;
    document.getElementById('icbf').value = total * 0.3; 
    document.getElementById('sena').value = total * 0.2;
  }



  function calcular_retencionfuente(){

    var d = 500000; 
    var h = 0;
    var e = 0; 
    var c = 1000000;
    var i = 0; 
    var j = 0; 
    var k = 0; 
    var l = 29753; 
    var m = 0; 
    var n = 0; 
    var o = 0; 
    var p = 0; 
    var r = 0;

    var sueldo = document.getElementById('sueldobasico').value;
    var pension = document.getElementById('pension').value;


    if(sueldo >= 4216282){

      h = parseFloat(c) + parseFloat(d) + parseFloat(pension);   
      i = (h * 0.25);
      j = (h - i);
      k = (j / l);
      m = k; 
      n = (m + 150);
      o = (n * 0.28);
      p = (o - 10);
      //r=-(p*l);
      r = parseFloat(p) * l;
      //alert(r);
      document.getElementById('retencion').value = r;
    }else{
      //alert('nada');
      document.getElementById('retencion').value = 0;
    }

  }

</script>

@endsection

@section('pagina', 'Creacion Nomina')

@section('contenido')

<div class="row">
  <!-- left column -->
  <div class="col-md-12">

    <!-- Input addon -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Empleado</h3>
      </div>

      <div class="box-body">

       {!! Form::open(['route' => 'nomina.store', 'method' => 'POST', 'files' => true]) !!}

       <div class="col-xs-3">
         <p class="margin">Cedula</p>
         <div class="input-group">
           <input type="text" id="id" name="cedula" value="{{ $usuario->id }}" class="form-control" readonly="">
         </div>
       </div>

       <div class="col-xs-3">
        <p class="margin">Nombre</p>
        <div class="input-group">
          <input type="text" id="nombre" class="form-control" value="{{ $usuario->nombre }}" readonly="">
        </div>
      </div>

      <div class="col-xs-3">
        <p class="margin">Sueldo Basico</p>
        <div class="input-group">
          <input type="text" id="sueldobasico" name="sueldobasico" value="{{ $nomina->sueldobasico }}" class="form-control" readonly="">
        </div>
      </div>

      <div class="col-xs-3">
        <p class="margin">Fecha</p>
        <div class="input-group">
          <input type="date" id="fecha" name="fecha" value="{{ $nomina->fecha }}" class="form-control">
        </div>
      </div>

    </div>
  </div>

</div>
</div>

<div class="row">
  <!-- left column -->
  <div class="col-md-4">

    <!-- Input addon -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Devengado</h3>
      </div>

      <div class="box-body">

        <p class="margin">Dias Trabajados</p>

        <div class="input-group">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="diastrabajados" name="diastrabajados" value="{{ $nomina->diastrabajados }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" onclick="calcular_dias()">Calcular</button>
          </div>
        </div>

        <p class="margin">Sueldo</p>

        <div class="input-group col-md-12">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="sueldo" name="sueldo" readonly="" value="{{ $nomina->sueldo }}">
        </div>

        <p class="margin">Horas Extra</p>

        <div class="input-group">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="hextras" name="horash" readonly="" value="{{ $nomina->horash }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhorasextra">Calcular</button>
          </div>
        </div>

        <p class="margin">Auxilio de Transporte</p>

        <div class="input-group">
          <div class="input-group-btn">
            <input type="text" class="form-control" id="auxtransporte" name="transporte" readonly="" value="{{ $nomina->transporte }}">
          </div>
          <!-- /btn-group -->
        </div>

        <p class="margin">Comisiones</p>

        <div class="input-group">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="comisiones" name="comisiones" readonly="" value="{{ $nomina->comisiones }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalcomision">Calcular</button>
          </div>
        </div>

        <p class="margin">Bonificaciones</p>

        <div class="input-group col-md-12">
          <div class="input-group-btn">

          </div>
          <!-- /btn-group -->
          <input type="number" class="form-control" id="bonificaciones" name="bonificaciones" value="{{ $nomina->bonificaciones }}">
        </div>


      </div><br>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>

  <div class="col-md-4">

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Deducido</h3>
      </div>

      <div class="box-body">

       <div class="col-md-12">
        <!-- Input addon -->

        <p class="margin">Salud</p>

        <div class="input-group">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="salud" name="salud" readonly="" value="{{ $nomina->salud }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" onclick="calcular_saludpension()">Calcular</button>
          </div>
        </div>

        <p class="margin">Pension</p>

        <div class="input-group col-md-12">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="pension" name="pension" readonly="" value="{{ $nomina->pension }}">
        </div>

        <p class="margin">Riesgos Profesinales</p>

        <div class="input-group col-md-12">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="riesgos" name="riesgos" readonly="" value="{{ $nomina->riesgos }}">
        </div>

        <p class="margin">Retencion en la Fuente</p>

        <div class="input-group">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="retencion" name="rtefuente" readonly="" value="{{ $nomina->rtefuente }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" onclick="calcular_retencionfuente()">Calcular</button>
          </div>
        </div>

        <p class="margin">Libranza</p>

        <div class="input-group">
          <div class="input-group-btn">
            <input type="text" class="form-control" id="libranza" name="libranza" value="{{ $nomina->libranza }}">
          </div>
          <!-- /btn-group -->
        </div>

        <p class="margin">Fondo Empleados</p>

        <div class="input-group col-md-12">

          <!-- /btn-group -->
          <input type="text" class="form-control" id="fondo" name="fondos" value="{{ $nomina->fondos }}">
        </div>

        <p class="margin">Embargos Judiciales</p>

        <div class="input-group col-md-12">
          <div class="input-group-btn">

          </div>
          <!-- /btn-group -->
          <input type="text" class="form-control" id="embargos" name="embargos" value="{{ $nomina->embargos }}">
        </div>

      </div>
    </div><br>
  </div>

</div>

<div class="col-md-4">

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Aportes Parafiscales</h3>
    </div>

    <div class="box-body">

     <div class="col-md-12">
      <!-- Input addon -->

      <p class="margin">Caja de Compensación familiar</p>

      <div class="input-group">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="caja" name="caja" readonly="" value="{{ $nomina->caja }}">
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger" onclick="calcular_cajacompensacion()">Calcular</button>
        </div>
      </div>

      <p class="margin">Instituto Colombiano de Bienestar Familiar</p>

      <div class="input-group col-md-12">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="icbf" name="icbf" readonly="" value="{{ $nomina->icbf }}">
      </div>

      <p class="margin">Servicio Nacional de Aprendizaje</p>

      <div class="input-group col-md-12">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="sena" name="sena" readonly="" value="{{ $nomina->sena }}">
      </div>

      <br>
      <div class="box-header with-border">
        <h3 class="box-title">Prestaciones sociales</h3>
      </div>

      <p class="margin">Cesantías</p>

      <div class="input-group">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="cesantias" name="cesantias" readonly="" value="{{ $nomina->cesantias }}">
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger" data-toggle="modal" onclick="calcular_cesantias()" data-target="">Calcular</button>
        </div>
      </div>

      <p class="margin">Intereses a las cesantías</p>

      <div class="input-group col-md-12">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="intecesantias" name="intecesantias" readonly="" value="{{ $nomina->intecesantias }}">
        <div class="input-group-btn">

        </div>
      </div>

      <p class="margin">Prima de servicios</p>

      <div class="input-group col-md-12">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="primaservi" name="primaservi" readonly="" value="{{ $nomina->primaservi }}">
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger" data-toggle="modal" onclick="calcular_primaservi()" data-target="">Calcular</button>
        </div>
      </div>

      <p class="margin">Vacaciones</p>

      <div class="input-group col-md-12">

        <!-- /btn-group -->
        <input type="text" class="form-control" id="vacaciones" name="vacaciones" readonly="" value="{{ $nomina->vacaciones }}">
        <div class="input-group-btn">
          <button type="button" class="btn btn-danger" data-toggle="modal" onclick="calcular_vacaciones()" data-target="">Calcular</button>
        </div>
      </div>

    </div>
  </div><br>
</div>

</div>

</div>

<div class="row">
  <div class="box box-danger">
    <div class="box-body">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-4">
        <div class="input-group">

          <!-- /btn-group -->
          <input readonly="" type="text" class="form-control" id="tdevengado" name="devengado" value="{{ $nomina->devengado }}">
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" onclick="calcular_devengado()" title="Calcular">Devengado</button>
          </div>
          <div class="clearfix"></div>
          <div class="input-group-btn">
            <button type="button" class="btn btn-danger" onclick="calcular_deducido()" title="Calcular">Deducido</button>
          </div>
          <!-- /btn-group -->
          <input readonly="" type="text" class="form-control" id="tdeducido" name="deducido" value="{{ $nomina->deducido }}">
        </div>
      </div>
      <div class="clearfix"></div><br>
      <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
          <p class="margin">Neto Pagado</p>
          <div class="input-group">

            <input readonly="" type="text" class="form-control" id="totaltotal" name="total" value="{{ $nomina->total }}">
            <div class="input-group-btn">
              <button type="button" class="btn btn-danger" onclick="$('#totaltotal').val($('#tdevengado').val()-$('#tdeducido').val())" title="Calcular">Calcular</button>
            </div>
          </div>

        </div>
        <div class="col-lg-4">
        </div>
        <div class="clearfix"></div><br>
        <div class="col-lg-4">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
        </div>
      </div>
    </div>
  </div>

</div>
{!! Form::close() !!}


<!-- MODALS CESANTIAS -->

<div class="modal fade bs-example-modal-sm" id="modalcesantias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cesantias</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">

          <div class="box-body">

            <p class="margin">Valor Hora Extra</p>

            <div class="input-group col-md-12">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="valhora" name="valhora" readonly="" value="0">
            </div>

            <p class="margin">Horas Diurnas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horad" name="horad" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Horas Nocturnas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horan" name="horan" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Horas Festivas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horaf" name="horaf" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Total</p>

            <div class="input-group">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="totalhoraextra" name="totalhoraextra" readonly="" value="0">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" onclick="calcular_horasextra()">Calcular</button>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#hextras').val($('#totalhoraextra').val())">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODALS HORAS EXTRA -->

<div class="modal fade bs-example-modal-sm" id="modalhorasextra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Horas Extra</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">

          <div class="box-body">

            <p class="margin">Valor Hora Extra</p>

            <div class="input-group col-md-12">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="valhora" name="valhora" readonly="" value="0">
            </div>

            <p class="margin">Horas Diurnas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horad" name="horad" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Horas Nocturnas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horan" name="horan" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Horas Festivas</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="horaf" name="horaf" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Total</p>

            <div class="input-group">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="totalhoraextra" name="totalhoraextra" readonly="" value="0">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" onclick="calcular_horasextra()">Calcular</button>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#hextras').val($('#totalhoraextra').val())">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODALS COMISION -->

<div class="modal fade bs-example-modal-sm" id="modalcomision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comisión</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">

          <div class="box-body">

            <p class="margin">Ventas</p>

            <div class="input-group col-md-12">

              <!-- /btn-group -->
              <input type="number" class="form-control" id="comisionventas" name="comisionventas" value="0">
            </div>

            <p class="margin">Porcentaje</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="comisionporcentaje" name="comisionporcentaje" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Total</p>

            <div class="input-group">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="totalcomision" name="totalcomision" readonly="" value="0">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" onclick="calcular_comisiones()">Calcular</button>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#comisiones').val($('#totalcomision').val())">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODALS SALUD -->

<div class="modal fade bs-example-modal-sm" id="modalcomision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comisión</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">

          <div class="box-body">

            <p class="margin">Ventas</p>

            <div class="input-group col-md-12">

              <!-- /btn-group -->
              <input type="number" class="form-control" id="comisionventas" name="comisionventas" value="0">
            </div>

            <p class="margin">Porcentaje</p>

            <div class="input-group">
              <div class="input-group-btn">
                <input type="number" class="form-control" id="comisionporcentaje" name="comisionporcentaje" value="0">
              </div>
              <!-- /btn-group -->
            </div>

            <p class="margin">Total</p>

            <div class="input-group">

              <!-- /btn-group -->
              <input type="text" class="form-control" id="totalcomision" name="totalcomision" readonly="" value="0">
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger" onclick="calcular_comisiones()">Calcular</button>
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#comisiones').val($('#totalcomision').val())">Guardar</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('js2')

<script type="text/javascript">

  /*$("#schedule_event").chosen().change( function() {
    alert(+ $(this).text());
    $('#' + $(this).val()).show();
  });*/

  $("#id").chosen({
    search_contains: true,
    no_results_text: "Oops, nothing found!",
    allow_single_deselect: true
  }).change( function() {
    //alert($('#id').val());

    $.ajax({
      url: "../usuario/"+$('#id').val()+"/usuario",
      context: document.body,
      async: false,
    }).done(function(date) {
      //alert(date[0]);
      //console.table(date['nombre']);
      $('#nombre').val(date['nombre']+' '+date['apellido']);
      $('#sueldobasico').val(date['sueldo']);

      var valorhoraextra = (date['sueldo']/30)/8;
      $('#valhora').val(valorhoraextra);

      document.getElementById('diastrabajados').value = 0;
      document.getElementById('sueldo').value = 0;
      document.getElementById('hextras').value = 0;
      document.getElementById('auxtransporte').value = 0;
      document.getElementById('comisiones').value = 0;
      document.getElementById('bonificaciones').value = 0;

      document.getElementById('tdevengado').value = 0;
      document.getElementById('tdeducido').value = 0;
    });

  }); 

</script>

@endsection