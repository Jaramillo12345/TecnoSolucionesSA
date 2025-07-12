<?php

require_once './model/ClienteModel.php';

class ClienteController{

    public function cargar(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $model=new ClienteModel();
        $clientes = $model->cargar($_SESSION['usuario']['idusuario']);
        require_once './view/viewCargarClientes.php';
    }

    public function guardar(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $model=new ClienteModel();
            $cliente=new Cliente();
            $cliente->setNombre($_POST['txtNom']);
            $cliente->setEmail($_POST['txtEmail']);
            $cliente->setTelefono($_POST['txtTel']);
            $cliente->setDireccion($_POST['txtDir']);
            $cliente->setIdUsuario($_SESSION['usuario']['idusuario']);
            $model->guardar($cliente);
            header('Location: ./index.php?accion=cargarclientes');
        }
        else{ require_once './view/viewGuardarCliente.php'; }
    }

    public function borrar(){
        if(isset($_GET['idcli'])){
            $model=new ClienteModel();
            $model->borrar($_GET['idcli']);
            header('Location: ./index.php?accion=cargarclientes');
        }
    }

}

?>