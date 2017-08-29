  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('inicio.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span id="logete" class="logo-lg"><img class="user-image" src="{{ asset('img/logo.png') }}" style="margin: -10px;" width="30%" height="100%"/></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('plugin/bootstrap/dist/img/' . Auth::user()->imagen . '') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->nombre . ' ' . Auth::user()->apellido }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('plugin/bootstrap/dist/img/' . Auth::user()->imagen . '') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->nombre . ' ' . Auth::user()->apellido . ' - ' . Auth::user()->tipo }}
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('edicion', Auth::user()->id) }}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('pagina.logout') }}" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>