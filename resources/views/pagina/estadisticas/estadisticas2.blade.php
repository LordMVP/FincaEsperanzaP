@extends('pagina.template.principal')

@section('titulo', 'Estadistica')

@section('js1')
  
  <script type="text/javascript">
      $("#id_modelo").chosen({
    search_contains: true,
    no_results_text: 'No Se Encontraron Resultados',
    max_selected_options: 3
  });
  </script>

@endsection

@section('pagina', 'Estadistica')

@section('contenido')

<div class="row" onload="CargaGrafico()">
  <div class="col-md-12">
    <!-- AREA CHART -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Modelo</h3>

        <div class="box-tools pull-right">
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <div class="chart" id="line-chart" style="height: 300px;"></div>
          <div class="chart" id="revenue-chart" style="display:none;"></div>
          <div class="chart" id="sales-chart" style="display:none;"></div>
        </div>
      </div>
      <div class="box-footer">
        <div class="col-md-4">
          <label>Seleccione Modelo a comparar</label>
        </div>
        <div class="col-md-8">
          {!! Form::open(['route' => 'estadistica.modelo', 'method' => 'POST', 'files' => true, 'id' => 'form_modelo']) !!}
          <div class="input-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            {!! Form::select('id_modelo', $modelo, null, ['id' => 'id_modelo', 'class' => 'form-control', 'required', 'placeholder' => '', 'multiple'=>'multiple']) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="CargaGrafico()"><span class="glyphicon glyphicon-ok"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('js2')

<script src="{{ asset('plugin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('plugin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugin/bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('plugin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('plugin/bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>


<script type="text/javascript">

  CargaGrafico();




  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

  function CargaGrafico() {

    $("#id_modelo").chosen({
      search_contains: true,
      no_results_text: 'No Se Encontraron Resultados',
      max_selected_options: 3
    });

    //alert($("#id_modelo").val());

    var selected = $("#id_modelo").val();
    var id1 = selected[1];
    var id2 = selected[2];
    var id3 = selected[3];

    if(id1 == null && id1 == undefined){
      id1 = 0;
    }
    if(id2 == null && id2 == undefined){
      id2 = 0;
    }
    if(id3 == null && id3 == undefined){
      id3 = 0;
    }

    var datos;
    var variables;


          $.ajax({
                type: "GET",
                url: "estadistica_datos/"+id1+"/"+id2+"/"+id3,
      async:false,
                success: function(data) { 
        datos = eval(data);
                }
          });
    
    //alert(datos.length);

    $.ajax({
                type: "GET",
                url: "estadistica_variables",
      async:false,
                success: function(data) {
                      variables = eval(data);
                }
          });

    var labels = [], data=[];

    for(var i = 0; i < variables.length; i++){
      //labels.push(variables[i]);
      labels.push(variables[i]);
    }


    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
              { y: '0', a: 50, b: 90},
              { y: '1', a: 65,  b: 75},
              { y: '2', a: 50,  b: 50},
              { y: '3', a: 75,  b: 60},
              { y: '4', a: 80,  b: 65},
              { y: '5', a: 90,  b: 70},
              { y: '6', a: 100, b: 75},
              { y: '7', a: 115, b: 75},
              { y: '8', a: 120, b: 85},
              { y: '9', a: 145, b: 85},
              { y: '10', a: 160, b: 95}
            ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      xLabels: "day",
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });
  }
</script>

@endsection

</hr>