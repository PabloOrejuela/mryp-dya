<?php
    echo view('includes/header')
        .view('includes/botonera')
        .view('includes/botonera_reportes')
        .view($main_content);
        //.view('includes/footer');
    //$this->load->view('includes/footer');