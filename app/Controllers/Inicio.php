<?php

namespace App\Controllers;

class Inicio extends BaseController {

    public function index(){

        $data['title']='MYRP - DYA';
        $data['main_content']='inicio';
        return view('includes/template', $data);
    }
}
