<nav class="navbar navbar-expand-lg navbar-light bg-light nav-reportes" >
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo site_url();?>reportes-p1">Menú reportes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes estáticos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo site_url();?>reporte-asistencia-p1">Reporte de asistencia</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url();?>reporte-analisis-pruebadiagnostico-p1">Análisis de la prueba de diagnóstico</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url();?>reporte-despistaje-mat-p1">Prueba Despistaje Matemáticas</a></li>
            <li><a class="dropdown-item" href="<?php echo site_url();?>reporte-analisis-pruebafinal-p1">Análisis de la prueba final con la intervención del programa</a></li>
            
            <!-- <li><a class="dropdown-item" href="<?php echo site_url();?>reporte-destrezas-p1">Destrezas</a></li> -->
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes dinámicos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Reporte de asistencia</a></li>
            <li><a class="dropdown-item" href="#">Reporte de Diagnostico docente</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>