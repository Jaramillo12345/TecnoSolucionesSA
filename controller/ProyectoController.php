<?php

require_once './model/ProyectoModel.php';
require_once './model/ClienteModel.php';
require_once './model/UsuarioModel.php';

class ProyectoController{

    public function cargar(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: ./index.php?accion=loginusuario');
            exit();
        }
        $idusuario = $_SESSION['usuario']['idusuario'];
        $model=new ProyectoModel();
        $proyectos = $model->cargar($idusuario);
        require_once './view/viewCargarProyectos.php';
    }

    public function guardar(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: ./index.php?accion=loginusuario');
            exit();
        }
        $idusuario = $_SESSION['usuario']['idusuario'];
        $model_cli=new ClienteModel();
        $clientes = $model_cli->cargar($idusuario);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $model=new ProyectoModel();
            $proyecto=new Proyecto();
            $proyecto->setNombre($_POST['txtNom']);
            $proyecto->setDescripcion($_POST['txtDes']);
            $proyecto->setIdCliente($_POST['cbxIdCli']);
            $proyecto->setIdUsuario($_SESSION['usuario']['idusuario']);
            $proyecto->setFechaInicio($_POST['dtFi']);
            $proyecto->setFechaFin($_POST['dtFf']);
            $proyecto->setEstado($_POST['cbxEs']);
            $model->guardar($proyecto);
            header('Location: ./index.php?accion=cargarproyectos');
        }
        else{ require_once './view/viewGuardarProyecto.php'; }
    }

    public function borrar(){
        if(isset($_GET['idpro'])){
            $model=new ProyectoModel();
            $model->borrar($_GET['idpro']);
            header('Location: ./index.php?accion=cargarproyectos');
        }
    }

}

?>