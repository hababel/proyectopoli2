  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #29AB70"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link m-0">
          <h4><b><?php echo $titlepage; ?></b></h4>
        </span>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown" style="width:240px">
        <div class="row">
          <div class="col-8">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="padding-left: 0px;padding-right: 0px;">
              <?php echo $_SESSION['user']['nombre']; ?>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">

              <li class="dropdown-divider"></li>
              <li><a href="<?php echo URL_PATH; ?>/login/logout" class="dropdown-item">Cerrar</a></li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-green elevation-4">
    <a href="<?php URL_PATH; ?>home" class="brand-link">
      <img src="views/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inicio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!-- <li class="nav-item">
            <a href="<?php echo URL_PATH; ?>saberPro" class="nav-link">
              <i class="nav-icon fas fa-person-chalkboard" style="color: #29AB70"></i>
              <p>Saber PRO</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?php echo URL_PATH; ?>sabert" class="nav-link">
              <i class="nav-icon fas fad fa-chalkboard-teacher" style="color: #ffffff"></i>
              <p>Informe de resultados Saber Pro y Saber TyT</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URL_PATH; ?>ayuda" class="nav-link">
              <i class="nav-icon fas fad fa-hands-helping" style="color: #ffffff"></i>
              <p>Ayudas</p>
            </a>
          </li>
          <?php if ($_SESSION['user']['Tipo Usuario'] == 1) { ?>
            <li class="nav-item">
              <a href="<?php echo URL_PATH; ?>informe" class="nav-link">
                <i class="nav-icon fas fa-th-list" style="color: #ffffff"></i>
                <p>Módulo de exportación de informe en Power BI</p>
              </a>
            </li>
          <?php } ?>
          <li class="nav-header"><b style="color: #f89406">Configuración</b></li>
          <?php if ($_SESSION['user']['Tipo Usuario'] == 1) { ?>
            <li class="nav-item">
              <a href="<?php echo URL_PATH; ?>usuario" class="nav-link">
                <i class="nav-icon fas fa-user-lock" style="color: #ffffff"></i>
                <p>Usuarios</p>
              </a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a href="<?php echo URL_PATH; ?>login/logout" class="nav-link">
              <i class="nav-icon fas fad fa-sign-out" style="color:#f89406"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  </div>