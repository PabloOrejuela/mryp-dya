<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="logo">
                <img src="<?= site_url(); ?>public/images/myrp-logo.jpg" width="100" /> 
                    <span style="font-weight: bold;color:crimson;font-size:1.2em;"></span>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>">Inicio</a></li>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>cargar_info">Cargar Información</a>
                <li class="menu-item hidden"><a href="<?= site_url(); ?>sistemas">Reportes</a>
            </li>
        </ul>
    </div>

</header>