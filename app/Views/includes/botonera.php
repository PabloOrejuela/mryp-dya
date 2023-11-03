<body>
<?php //$this->session = session(); ?>
<!-- HEADER: MENU + HEROE SECTION -->

<header>

    <div class="menu dropdown">
        <ul>
            <li class="logo">
                <img src="<?= site_url(); ?>public/images/dya-logo.png" width="175" /> 
                    <span style="font-weight: bold;color:crimson;font-size:1.2em;"></span>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="<?= site_url(); ?>inicio">Inicio </a></li>
            <?php

                if ($this->session->editar == 1) {
                    echo '<li class="menu-item hidden"><a href="'.site_url().'cargar_info_view">Componentes</a></li>';
                }

                if ($this->session->editar == 1 && $this->session->cargar_info == 1) {
                    echo '<li class="menu-item hidden"><a href="'.site_url().'cargar_info_extra_view">Cargar info</a></li>';
                }

                if ($this->session->editar == 1) {
                    echo '<li class="menu-item hidden">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administración
                            </button>
                            <ul class="dropdown-menu hidden" id="menu">
                                <li><a class="dropdown-item" href="'.site_url().'form-nuevo-anio">Registrar Año lectivo</a></li>
                                <li><a class="dropdown-item" href="'.site_url().'form-nueva-cohorte">Registrar Cohorte</a></li>
                            </ul>
                        </li>
                    ';
                }

                if ($this->session->reportes == 1) {
                    echo '<li class="menu-item hidden"><a href="'.site_url().'reportes-view">Reportes</a></li>';
                }
            ?>
            <li class="menu-item hidden"><a href="<?= site_url(); ?>logout">Salir</a></li>
            <li style="font-size:0.9em;font-weight:bold;"><?= esc($this->session->nombre); ?></li>
        </ul>
    </div>
    

</header>
<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->