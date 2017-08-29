<!DOCTYPE html>
<html>
   <head>
      <title>
         @yield('titulo') | Finca la Esperanza
      </title>
      @include('pagina.template.head')
  @yield('js1')
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         @include('pagina.template.header')

    @include('pagina.template.nav')
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Finca La Esperanza
                  <small>
                     @yield('pagina')
                  </small>
               </h1>
            </section>
            <div class="box-body">
               <div class="box box-success">
                  <div class="text-center">
                     @include('flash::message')
                  </div>
               </div>
            </div>
            <!-- Main content -->
            <section class="content" id="imprimir">
               @yield('contenido')
            </section>
         </div>
         @include('pagina.template.footer')

   @include('pagina.template.configuraciones')
      </div>
      @include('pagina.template.footer2')
 @yield('js2')
   </body>
</html>
