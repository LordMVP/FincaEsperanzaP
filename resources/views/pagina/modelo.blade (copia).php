@extends('pagina.template.principal')

@section('titulo', 'Modelo')

@section('js1')

<script type="text/javascript">

  function creacion_input(variable, id){

    var input = document.createElement('input');
    input.setAttribute('type', 'number');
    input.setAttribute('pattern', 'pattern="[0-9]{1}"');
    input.setAttribute('style', 'width: 80px;');
    input.setAttribute('class', 'form-control');
    input.setAttribute('value', 1);
    input.setAttribute('id', id+'_'+variable);

    return input;
  }

  function creacion_div(variable, item){

    var div2 = document.createElement('div');
    div2.setAttribute('class', 'input-group');

    var div = document.createElement('div');
    div.setAttribute('class', 'input-group-addon');
    div.setAttribute('style', 'border:none');

    var i = document.createElement('i');
    i.innerHTML = "<b style='font-size:14px'>X<small style='font-size:12px'>"+variable+" "+item+"</small></b>"

    div.appendChild(i);
    //div2.appendChild(div);

    return div;
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
        funcion_panel.appendChild(creacion_input(i, 'fun'));
        funcion_panel.appendChild(creacion_div(i, ''));
      }else{
        funcion_panel.appendChild(creacion_input(i, 'fun'));
        funcion_panel.appendChild(creacion_div(i, '+'));
      }

    }


    for (var y = 1; y <= restriccion; y++){

      var div = document.createElement('div');
      div.setAttribute('class', 'input-group');

      for (var i = 1; i <= variable; i++){

        if(i == variable){
          div.appendChild(creacion_input(y+'_'+i, 'res'));
          div.appendChild(creacion_div(i, ''));
        }else{
          div.appendChild(creacion_input(y+'_'+i, 'res'));
          div.appendChild(creacion_div(i, '+'));
        }
        
      }
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
            <input type="number" class="form-control" id="variable" name="var_decision" value="1">
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
            <input type="number" class="form-control" id="restriccion" value="1">
          </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->

        <button type="submit" class="btn btn-danger" onclick="actualizacion()">Continuar</button>
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

        <div class="row">
          <div class="col-md-12">
            <label>Función</label>
            <div class="form-group" style="overflow-x: scroll">


              <div class="input-group" id="funcion_mod" name="funcion_mod" style="width: 500px;">
                <input type="text" pattern="[0-9]{1}" class="form-control" data-inputmask="">
                <div class="input-group-addon">
                  <i class=""><b>X<small style='font-size:10px'>1 </small></b></i>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label>Restricciones</label>
            <div class="form-group" style="overflow-x: scroll">


              <div id="restriccion_mod" name="funcion_mod">
                <div class="input-group">
                  <input type="number" class="form-control" data-inputmask="">
                  <div class="input-group-addon">
                    <i class=""><b>X<small style='font-size:10px'>1 </small></b></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group text-center">

              <label id="label_mod">Función</label>

            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-info">Continuar</button>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (left) -->

</div>

@endsection


@section('js2')

@endsection