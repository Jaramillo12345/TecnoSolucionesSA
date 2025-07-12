<?php

require_once './model/UsuarioModel.php';

class UsuarioController{

    public function login(){
        $model = new UsuarioModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $model->login($_POST['email'], $_POST['contrasena']);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header('Location: ./index.php?accion=cargarclientes');
            } else { header('Location: ./view/viewLogin.php'); }
        } else { require_once './view/viewLogin.php';}
    }

    public function registrar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $model=new UsuarioModel();
            $usuario=new Usuario();
            $usuario->setNombre($_POST['txtNom']);
            $usuario->setEmail($_POST['txtEmail']);
            $usuario->setContrasena(password_hash($_POST['txtCont'],PASSWORD_DEFAULT));
            $usuario->setRol($_POST['cbxRol']);
            $model->registrar($usuario);
            header('Location: ./index.php');
        }
        else{
            require_once './view/viewRegistrar.php';
        }
    }

    public function cargar(){
        if(isset($_GET['idusu'])){
            $model=new UsuarioModel();
            $model->cargar($_GET['idusu']);
            require_once './view/viewCargarUsuario.php';
        }
    }

    public function borrar(){
        if(isset($_GET['idusu'])){
            $model=new UsuarioModel();
            $model->borrar($_GET['idusu']);
            header('Location: ./index.php');
        }
    }

}

?>