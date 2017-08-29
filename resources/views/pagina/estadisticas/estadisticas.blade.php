@extends('pagina.template.principal')

@section('titulo', 'Estadistica')

@section('js1')


@endsection

@section('pagina', 'Estadistica')

@section('contenido')

<canvas  id="areaChart" style="display: none; height:0px"></canvas>

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
          <canvas id="lineChart" style="height:250px"></canvas>
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

            {!! Form::select('id_modelo', $modelo, null, ['id' => 'id_modelo', 'class' => 'form-control', 'placeholder' => '', 'required', 'multiple'=>'multiple']) !!}
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

<div class="row" onload="">
  <div class="col-md-12">
      <div class="col-sm-6 text-center">
       <label class="label label-success">Line Chart</label>
      <div id="line-chart"></div>
    </div>
  </div>
</div>
@endsection



@section('js2')

<script type="text/javascript" src="{{ asset('plugin/bootstrap/plugins/jquery/jquery-2.2.3.min.js') }}" ></script>

<script src="{{ asset('plugin/bootstrap/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugin/bootstrap/plugins/chartjs/Chart.min.js') }}"></script>

<script src="{{ asset('plugin/bootstrap/plugins/fastclick/fastclick.js') }}"></script>

<script src="{{ asset('plugin/bootstrap/dist/js/app.min.js') }}"></script>

<script src="{{ asset('plugin/bootstrap/dist/js/demo.js') }}"></script>

<script src="{{ asset('plugin/chosen/chosen.jquery.js') }}"></script>

<script type="text/javascript">

  CargaGrafico();

  $("#id_modelo").chosen({
    search_contains: true,
    no_results_text: 'No Se Encontraron Resultados',
    max_selected_options: 3
  });

  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
  }

  function CargaGrafico() {

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


    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);


    var dataset = [];

    dataset.push({

      label: "2016",
      fillColor: "rgba(255, 0, 0, 1)",
      strokeColor: "rgba(255, 0, 0, 1)",
      pointColor: "rgba(255, 0, 0, 1)",
      pointStrokeColor: "#c1c7d1",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: [65, 59, 80, 81, 56, 55, 0]
    });

    dataset.push({

      label: "2017",
      fillColor: "rgba("+getRandomInt(0,222)+", "+getRandomInt(0,222)+", "+getRandomInt(0,222)+", 1)",
      strokeColor: "rgba("+getRandomInt(0,222)+", "+getRandomInt(0,222)+", "+getRandomInt(0,222)+", 1)",
      pointColor: "rgba("+getRandomInt(0,222)+", "+getRandomInt(0,222)+", "+getRandomInt(0,222)+", 1)",
      pointStrokeColor: "#c1c7d1",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(220,220,220,1)",
      data: [25, 29, 50, 31, 26, 15, 76]
    });

    var areaChartData = {
      labels: labels,
      datasets: dataset/*[
      {
        label: "2016",
        fillColor: "rgba(210, 214, 222, 1)",
        strokeColor: "rgba(210, 214, 222, 1)",
        pointColor: "rgba(210, 214, 222, 1)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56, 55, 0]
      },
      {
        label: "2017",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [28, 48, 40, 19, 86, 27, 90]
      }
      ]*/
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };


    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);

  };

</script>

@endsection

</hr>