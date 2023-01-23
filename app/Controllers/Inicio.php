<?php

namespace App\Controllers;

class Inicio extends BaseController {

    public function index(){

        $data['title']='MYRP - DYA';
        $data['main_content']='inicio';
        return view('includes/template', $data);
    }

    public function login($message = NULL){

        $this->session->destroy();
        $data['mensaje'] = $this->request->getPostGet('message');

        $data['title']='Acceso al sistema:';
        $data['main_content']='home/login';
        return view('includes/template_login', $data);
    }

    public function validate_login(){
        $data = array(
            'user' => $this->request->getPostGet('user'),
            'password' => $this->request->getPostGet('password'),
        );

        $this->validation->setRuleGroup('login');
        
        if (!$this->validation->withRequest($this->request)->run()) {
            //Depuración
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }else{ 

            $usuario = $this->usuarioModel->_getUsuario($data);
//echo '<pre>'.var_export($usuario, true).'</pre>';
            if (isset($usuario) && $usuario != NULL) {
                //valido el login y pongo el id en sesion
                //echo '<pre>'.var_export($usuario, true).'</pre>';
                $sessiondata = [
                    'is_logged' => 1,
                    'idusuario' => $usuario->id,
                    'nombre' => $usuario->nombre,
                    'idrol' => $usuario->idrol,
                    'rol' => $usuario->rol,
                    'centro_educativo' => $usuario->centro_educativo,
                    'editar' => $usuario->editar,
                    'componente' => $usuario->componente,
                    'ver_info' => $usuario->ver_info
                ];

                $user = [
                    'is_logged' => 1
                ];
                
                $this->usuarioModel->update($usuario->id, $user);
                $this->session->set($sessiondata);

                return redirect()->to('inicio');
            }else{

                return redirect()->to('/');
            }
        }
        
    }
}
