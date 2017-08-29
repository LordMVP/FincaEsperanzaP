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
            </nav>
         </header>
         <!-- Full Width Column -->
         <div class="content-wrapper" style="background-image: {{ asset('img/portada1.jpg') }}">
            <div class="container">

                  <div class="row">
                  <div class="col-md-2">
                  </div>
                     <div class="col-md-8">

					<div class="box-body">

					  <div class="box box-primary">

					    @if(count($errors) > 0)
					    <div class="alert alert-danger" role="alert">
					      @foreach ($errors->all() as $error) 
					      <li>{{ $error }}</li>
					      @endforeach
					    </div>
					    @endif
					<?php

					 //$url = "http://" . $_SERVER["SERVER_NAME"] . '/porcinos/public/restablecer?v='.base64_encode($id).'';
					 $url = "http://" . $_SERVER["SERVER_NAME"] . '/porcinos/public/';

					?>
					    {!! Form::open(['route' => ['mail.update', $user], 'method' => 'PUT', 'files' => true]) !!}

					    <div class="box-body">
					      <h3 class="page-header">Recuperación Contraseña - {!! $user->nombre . ' ' . $user->apellido!!}</h3>
					      <div class="form-group">

					        {!! Form::label('email', 'Email') !!}
					        {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}

					        {!! Form::label('password', 'Contraseña') !!}
					        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required', 'title' => 'Digite Contraseña']) !!}
					        <br>
					        {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
					        <a href="{{$url}}" class="btn btn-default">Inicio</a>
					      </div>
					    </div>

					    {!! Form::close() !!}

					    <br>
					    <hr>
					  </div>
					</div>   
	               </div>
	            <!-- /.container -->
	         </div>
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
