    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ asset('plugin/bootstrap/dist/img/' . Auth::user()->imagen . '') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->nombre . ' ' . Auth::user()->apellido }}</p>
          </div>
        </div> 
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">


          @if(Auth::user()->tipo == 'Administrador')
          <li class="header">Navegación</li>
          <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
          <li><a href="{{ route('modelo.index') }}"><i class="glyphicon glyphicon-th" aria-hidden="true"></i> <span>Modelo De Optimización</span></a></li>
          <li><a href="{{ route('estadisticas.index') }}"><i class="fa fa-area-chart"></i> <span>Estadisticas</span></a></li>
          <li><a href="{{ route('variables.index') }}"><i class="fa fa-vimeo"></i> <span>Variables</span></a></li>
          <li class="header">Contabilidad</li>
          <li><a href="{{ route('puc.index') }}"><i class="glyphicon glyphicon-list-alt"></i> <span>PUC</span></a></li>
          <li><a href="{{ route('transaccion.index') }}"><i class="glyphicon glyphicon-transfer"></i> <span>Transacciones</span></a></li>
          <li><a href="{{ route('productos.index') }}"><i class="fa fa-product-hunt"></i> <span>Productos</span></a></li>
          <li><a href="{{ route('inventario.index') }}"><i class="glyphicon glyphicon-list"></i> <span>Inventario</span></a></li>
          <li><a href="{{ route('nomina.index') }}"><i class="glyphicon glyphicon-usd"></i> <span>Nomina</span></a></li>
          @else
          <li class="header">Menu de Navegacion</li>
          <li><a href="{{ route('modelo.index') }}"><i class="glyphicon glyphicon-th" aria-hidden="true"></i> <span>Modelo De Optimización</span>
            @endif



          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>