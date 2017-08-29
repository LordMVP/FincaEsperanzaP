@extends('pagina.template.principal')

@section('titulo', 'Estadistica')

@section('js1')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
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
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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


    var datos;
    var variables;
    var labels = [], adatos=[]; 
    var selected = $("#id_modelo").val();
    var id1 = selected[1];
    var id2 = selected[2];
    var id3 = selected[3];
    var cont = 1;
    
    if(id1 == null && id1 == undefined){
      id1 = 0;
    }

    if(id2 == null && id2 == undefined){
      id2 = 0;
    }

    if(id3 == null && id3 == undefined){
      id3 = 0;
    }

    $.ajax({
          type: "GET",
          url: "estadistica_datos/"+id1+"/"+id2+"/"+id3,
          async:false,
          success: function(data) { 
          //datos.push(eval(data));
                datos = eval(data);
          }
      });

    $.ajax({
          type: "GET",
          url: "estadistica_variables",
          async:false,
          success: function(data) {
                variables = eval(data);
          }
      });


    for(var i = 0; i < variables.length; i++){
      //labels.push(variables[i]);
      labels.push(variables[i]);
    }

    console.table(datos);
    Highcharts.chart('container', {

        title: {
            text: 'Modelo Optimización'
        },

        xAxis: {
            categories: labels
        },

        yAxis: {
            type: 'Linear',
            minorTickInterval: 1
        },

        tooltip: {
            headerFormat: '<b>{series.name}</b><br />',
            //pointFormat: 'x = {point.x}, y = {point.y}'
            pointFormat: '{point.category} = {point.y}'
        },

        series: datos/*[{
            data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
            pointStart: 0,
            name: '2016'
        },{
            data: [10, 20, 14, 18, 16, 32, 64, 128, 256, 512],
            pointStart: 0
        }]*/
    });

  }
</script>

@endsection

</hr>