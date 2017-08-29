<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <title>
         Inicio | Finca La Esperenza
      </title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/bootstrap/css/bootstrap.min.css') }}"/>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"/>
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/dist/css/AdminLTE.min.css') }}"/>
      <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/dist/css/skins/_all-skins.min.css') }}"/>
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/dist/css/AdminLTE.min.css') }}"/>
      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/plugins/iCheck/square/blue.css') }}"/>
      <link rel="stylesheet" href="{{ asset('plugin/bootstrap/dist/css/skins/_all-skins.min.css') }}"/>
      <style>
          .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: center;
          }
      
          .color-palette-set {
            margin-bottom: 15px;
          }
      
          .color-palette span {
            display: none;
            font-size: 12px;
          }
      
          .color-palette:hover span {
            display: block;
          }
      
          .color-palette-box h4 {
            position: absolute;
            top: 100%;
            left: 25px;
            margin-top: -40px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
          }

          #content h4 {
              font-style:italic;
              font-weight:bold;
              font-size:2em;
              font-color:#ffffff;
              font-family:'Helvetica','Verdana','Monaco',sans-serif;
            }

        </style>
   </head>
   <body  class="hold-transition skin-blue layout-top-nav">
      <div class="wrapper">
         <header class="main-header">
            <nav class="navbar navbar-static-top">
               <div class="container">
                  <div class="navbar-header">
                     <a href="/porcinos/public/" class="navbar-brand ">
                        <img src="{{ asset('img/logo.png') }}" style="margin: -10px;" width="20%" height="40px"/>
                     </a>
                     <a href="/porcinos/public/" class="navbar-brand ">
                        <b class="">
                           PigModel
                        </b>
                     </a>
                  </div>

               </div>
               <!-- /.container-fluid -->
            </nav>
         </header>


         <!-- Full Width Column -->
         <div class="content-wrapper" style="background-image: {{ asset('img/portada1.jpg') }}">
            <div class="container">
               <!-- Content Header (Page header) -->
               <!-- Main content -->
               <section class="content">
                  <div class="callout callout-info">
                     <h4>
                        Modelo De Optimización Para La Gestión De La Información De Producción Porcina En Pie De La Finca La Esperanza De La Vereda Tierra Negra Fusagasugá Cundinamarca
                     </h4>
                  </div>
                  <div class="text-center">
                     @include('flash::message')
                  
                  </div>
                  <div class="row">
                     <div class="col-md-8">
                        <div class="box box-solid">
                           <!-- /.box-header -->
                           <div class="box-body">
                              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                 <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class="">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4" class="">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="5" class="">
                                    </li>
                                    <li data-target="#carousel-example-generic" data-slide-to="6" class="">
                                    </li>
                                 </ol>
                                 <div class="carousel-inner">
                                    <div class="item active">
                                       <img src="{{ asset('img/portada1.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/Bodega-Molino.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/IMG_6438.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/IMG_6439.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/IMG_6440.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/IMG_6442.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                    <div class="item">
                                       <img src="{{ asset('img/IMG_20160611_075943.jpg') }}" alt="First slide"/>
                                       <div class="carousel-caption">
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="fa fa-angle-left">
                                    </span>
                                 </a>
                                 <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="fa fa-angle-right">
                                    </span>
                                 </a>
                              </div>
                           </div>
                           <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                     </div>

<?php
/*

$time3 = date('H:i:s', time()); // 13:50:29
echo $time3;
*/
?>

                     <div class="col-md-4">
                        <div class="box box-solid">
                           <!-- /.box-header -->
                           <div class="box-body">
                              <div class="box-group" id="accordion">
                                 <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                 <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                       <h4 class="box-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                             Ingreso
                                          </a>
                                       </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                       <div class="box-body">
                                          <div class="box box-primary">
                                             <!-- form start -->
                                             {!! Form::open(['route'=>
                                             'pagina.login', 'method' =>
                                             'POST']) !!}
                                             {!! csrf_field() !!}
                                             <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                             <div class="box-body">
                                                <div class="form-group">
                                                   {!! Form::label('email', 'Email') !!}
                                                   {!! Form::text('email', null, ['class' =>
                                                   'form-control', 'placeholder' =>
                                                   'Email', 'required']) !!}
                                                </div>
                                                <div class="form-group">
                                                   {!! Form::label('password', 'Password') !!}
                                                   <input required type="password" class="form-control" id="password" name="password" placeholder="**********"/>
                                                </div>
                                             </div>
                                             <!-- /.box-body -->
                                             <div class="box-footer">
                                                {!! Form::submit('Ingreso', ['class' =>
                                                'btn btn-default btn-lg']) !!}
                                             </div>
                                             {!! Form::close() !!}
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel box box-success">
                                    <div class="box-header with-border">
                                       <h4 class="box-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                             Recuperar
                                          </a>
                                       </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                       <div class="box-body">
                                          <div class="box box-primary">
                                             <!-- form start -->
                                             {!! Form::open(['route' =>
                                             'mail.store', 'method' =>
                                             'POST', 'files' =>
                                             true]) !!}
                                                <div class="box-body">
                                                   <div class="form-group">
                                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                      <input type="hidden" name="id" value="0">
                                                      <input type="hidden" name="mensaje" value="Recuperación Contraseña de Acceso a PigModel">
                                                      <label for="exampleInputEmail1">
                                                         Correo electronico
                                                      </label>
                                                      <input required="" type="email" class="form-control" id="email" name="email" placeholder="Ingrese email"/>
                                                   </div>
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                   <button type="submit" class="btn btn-primary">
                                                      Recuperar
                                                   </button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                     </div>
                  </div>
               </section>
               <!-- /.content -->
            </div>
            <!-- /.container -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="container">
               <div class="pull-right hidden-xs">
                  <b>
                     Version
                  </b>
                  3.1
               </div>
               <strong>
                  Copyright © 2016 -
                  <a href="">
                     Natalia Gamez
                  </a>
                  ,
                  <a href="">
                     Jorge Quevedo
                  </a>
                  &
                  <a href="">
                     Miguel Ojeda
                  </a>
               </strong>
               All rights
               reserved.
            </div>
            <!-- /.container -->
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 2.2.3 -->
      <script src="{{ asset('plugin/bootstrap/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="{{ asset('plugin/bootstrap/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- SlimScroll -->
      <script src="{{ asset('plugin/bootstrap/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('plugin/bootstrap/plugins/fastclick/fastclick.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('plugin/bootstrap/dist/js/app.min.js') }}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('plugin/bootstrap/dist/js/demo.js') }}"></script>
   </body>
</html>
