<?php
    echo view('includes/header')
        .view('includes/botonera_login')
        .view($main_content)
        .view('includes/footer');
    //$this->load->view('includes/footer');