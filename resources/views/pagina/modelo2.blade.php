@extends('pagina.template.principal')

@section('titulo', 'Modelo')

@section('js1')

<script type="text/javascript">




  function creacion_select(id){

    var div3 = document.createElement('div');
    div3.setAttribute('class', 'col-xs-1');

    var input = document.createElement('select');
    input.setAttribute('class', 'form-control');
    input.setAttribute('id', id+'_'+'accion');
    input.setAttribute('name', id+'_'+'accion');
    input.setAttribute('style', 'background-color: #E9E9E9; border: 2px solid #A8A8A8;');

    var option1 = document.createElement('option');
    option1.setAttribute('id', id+'_mayor');
    option1.setAttribute('name', id+'_mayor');
    //option1.createTextNode('≥');
    var t = document.createTextNode("≥");       // Create a text node
    option1.appendChild(t); 


    var option2 = document.createElement('option');
    option2.setAttribute('id', id+'_igual');
    option2.setAttribute('name', id+'_igual');
    //option2.createTextNode('=');
    var t = document.createTextNode("=");       // Create a text node
    option2.appendChild(t); 

    var option3 = document.createElement('option');
    option3.setAttribute('id', id+'_menor');
    option3.setAttribute('name', id+'_menor');
    //option3.createTextNode('≤');
    var t = document.createTextNode("≤"); 
    option3.appendChild(t); 

    input.appendChild(option1);
    input.appendChild(option2);
    input.appendChild(option3);

    div3.appendChild(input);

    return div3;
  }

  function creacion_input_salida(variable, id){

      var div3 = document.createElement('div');
      div3.setAttribute('class', 'col-xs-2');

      var div2 = document.createElement('div');
      div2.setAttribute('class', 'input-group');

      var input = document.createElement('input');
      input.setAttribute('type', 'number');
      input.setAttribute('title', 'Resultado');
      input.setAttribute('style', 'background-color: #E9E9E9; border: 2px solid #A8A8A8;');

      input.setAttribute('pattern', 'pattern="[0-9]{1}"');
      input.setAttribute('class', 'form-control');
      input.setAttribute('value', 0);
      input.setAttribute('id', variable+'_'+id);
      input.setAttribute('name', variable+'_'+id);

      div2.appendChild(input);

      div3.appendChild(div2);

      return div3;
  }

  function creacion_div(id, variable, item, i){

    var aux_id = id;
    if(i != ""){
        id = id + '_' + i; 
    }

    var div3 = document.createElement('div');
    div3.setAttribute('class', 'col-xs-2');

    var div2 = document.createElement('div');
    div2.setAttribute('class', 'input-group');

    var input = document.createElement('input');
    input.setAttribute('type', 'number');
    input.setAttribute('pattern', 'pattern="[0-9]{1}"');
    input.setAttribute('class', 'form-control');
    input.setAttribute('value', 0);
    input.setAttribute('id', item+'_'+id);
    input.setAttribute('name', item+'_'+id);

    var div = document.createElement('div');
    div.setAttribute('class', 'input-group-addon');
    //div.setAttribute('style', 'border:none');

    var i = document.createElement('i');
    i.innerHTML = "<b style='font-size:14px'>X<small style='font-size:12px'>"+aux_id+ "" +variable+"</small></b>"

    div.appendChild(i);
    div2.appendChild(input);
    div2.appendChild(div);

    div3.appendChild(div2);

    return div3;
  }

  function actualizacion(){


    var variable = document.getElementById('variable').value;
    var restriccion = document.getElementById('restriccion').value;

    var funcion_panel = document.getElementById('funcion_mod');
    funcion_panel.innerHTML= '';
    /*funcion_panel.appendChild(creacion_input(variable));
    funcion_panel.appendChild(creacion_div(variable));*/

    var restriccion_panel = document.getElementById('restriccion_mod');
    restriccion_panel.innerHTML= '';
    /*restriccion_panel.appendChild(creacion_input(variable, ''));
    restriccion_panel.appendChild(creacion_div(variable, ''));*/

    for (var i = 1; i <= variable; i++){

      if(i == variable){
        //funcion_panel.appendChild(creacion_input(i, 'fun'));
        funcion_panel.appendChild(creacion_div(i, '', 'fun', ''));
        //funcion_panel.appendChild(creacion_input_salida('resultado', i));
        
        //funcion_panel.appendChild(creacion_select(i));
        
      }else{
       // funcion_panel.appendChild(creacion_input(i, 'fun'));
        funcion_panel.appendChild(creacion_div(i, '+', 'fun', ''));
        //funcion_panel.appendChild(creacion_input_salida('resultado', i));
        //funcion_panel.appendChild(creacion_select(i));
      }

    }


    for (var y = 1; y <= restriccion; y++){

      var div = document.createElement('div');
      div.setAttribute('class', 'row');

      for (var i = 1; i <= variable; i++){

        if(i == variable){
          div.appendChild(creacion_div(i, '', 'res', y));  
        }else{
          div.appendChild(creacion_div(i, '+', 'res', y));
        }
        
      }
      div.appendChild(creacion_select(y));
      div.appendChild(creacion_input_salida('resultado', y));
      restriccion_panel.appendChild(div);
      var br = document.createElement('br');
      restriccion_panel.appendChild(br);
    }

  /*

  <input type="number" class="form-control">
  <div class="input-group-addon">
  <i class=""><b>X<small>1 </small></b></i>
  </div>

  */
  }



</script>


@endsection

@section('pagina', 'Modelo')

@section('contenido')

{!! Form::open(['route' => 'modelo.store', 'method' => 'POST', 'files' => true, 'id' => 'formulario', 'name' => 'formulario']) !!}

<div class="row text-left" >

  <div class="col-md-4">
  </div>

  <div class="col-md-4">

    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Parametros</h3>
      </div>
      <div class="box-body">

        <!-- Date mm/dd/yyyy -->
        <div class="form-group">
          <label>Variables De Decisión</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="number" class="form-control" id="variable" name="variable" value="1">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <!-- IP mask -->
        <div class="form-group">
          <label>Restricciones</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-laptop"></i>
            </div>
            <input type="number" class="form-control" id="restriccion" name="restriccion" value="1">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <button type="button" class="btn btn-danger" onclick="actualizacion()">Continuar</button>
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
        <h3 class="box-title">Variables</h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-4">
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>Función Objetivo</label>
              <select class="form-control select2" id="objetivo" name="objetivo" style="width: 100%;">
                <option selected="selected">Minimizar</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row" style="width: 1080px;">
          <div class="col-md-12" ">
            <label>Función</label>
            <div class="form-group"  >

                <div id="funcion_mod" name="funcion_mod">
                  
                </div>
              </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-md-12">
            <label>Restricciones</label>
            <div class="form-group">


              <div id="restriccion_mod" name="restriccion_mod" style="">
                <div class="col-xs-2">
                   <div class="input-group">
                    <input type="number" class="form-control" data-inputmask="">
                      <div class="input-group-addon">
                        <i class=""><b>X<small style='font-size:10px'>1 </small></b></i>
                      </div>
                  </div>
                </div>
                <div class="col-xs-2">
                  <div class="input-group">
                  <input type="number" class="form-control" data-inputmask="">
                    <div class="input-group-addon">
                      <i class=""><b>X<small style='font-size:10px'>1 </small></b></i>
                    </div>
                  </div>
                </div>
                <div class="col-xs-1">
                  <select class="form-control">
                    <option value="mayor">≥</option>
                    <option value="igual">=</option>
                    <option value="menor">≤</option>
                  </select>
                </div>
                <div class="col-xs-2">
                  <div class="input-group">
                  <input type="number" class="form-control" data-inputmask="">
        
                  </div>
                </div>
              </div>
              <div id="restri" name="restri" style="">
                <div class="col-xs-5">
                </div>
                <div class="col-xs-3">
                   <div class="input-group">
                        <i class=""><b style='font-size:18px'>X<small style='font-size:14px'>1, </small></b><b style='font-size:18px'>X<small style='font-size:14px'>2, </small></b><b style='font-size:18px'>X<small style='font-size:14px'>n  </small></b><b style='font-size:18px'>≥<small style='font-size:14px'>0  </small></b></i>
                      
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group text-center">

              <label id="label_mod">Función</label>

            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-info" onclick="">Continuar</button>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (left) -->

</div>

{!! Form::close() !!}

@endsection


@section('js2')

<script type="text/javascript">
  
    function envio(){
      
      var datos = $("#formulario").serialize();

      console.log(datos);
    /*$.ajax({
      type:"POST",
      url: "/matriculas/public/modelo/store",
      async: false//,
      data: $("#formulario").serialize(),
      //data: 'modulo='+modulo+'&tema='+tema+'&opc='+opc+'&division='+division
    }).done(function(data){
      //var s = JSON.parse(data);
      datos = data;
    });*/

    //window.location = "modelo/store"

  }

</script>

@endsection