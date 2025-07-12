<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED);

require_once './controller/ClienteController.php';
require_once './controller/ProyectoController.php';
require_once './controller/UsuarioController.php';
require_once './controller/TareaController.php';
require_once './controller/ReporteController.php';

$accion=isset($_GET['accion'])?$_GET['accion']:'loginusuario';
switch($accion){

    case 'loginusuario':
        $controller=new UsuarioController();
        $controller->login();
    break;
    case 'registrarusuario':
        $controller=new UsuarioController();
        $controller->registrar();
    break;
    case 'cargarusuario':
        $controller=new UsuarioController();
        $controller->cargar();
    break;
    case 'borrarusuario':
        $controller=new UsuarioController();
        $controller->borrar();
    break;

    case 'cargarclientes':
        $controller=new ClienteController();
        $controller->cargar();
    break;
    case 'guardarcliente':
        $controller=new ClienteController();
        $controller->guardar();
    break;
    case 'borrarcliente':
        $controller=new ClienteController();
        $controller->borrar();
    break;

    case 'cargarproyectos':
        $controller=new ProyectoController();
        $controller->cargar();
    break;
    case 'guardarproyecto':
        $controller=new ProyectoController();
        $controller->guardar();
    break;
    case 'borrarproyecto':
        $controller=new ProyectoController();
        $controller->borrar();
    break;

    case 'cargartareas':
        $controller=new TareaController();
        $controller->cargar();
    break;
    case 'guardartarea':
        $controller=new TareaController();
        $controller->guardar();
    break;
    case 'borrartarea':
        $controller=new TareaController();
        $controller->borrar();
    break;

    case 'generarreporte':
    $controller = new ReporteController();
    $controller->generarPDF();
    break;

    case 'cerrarsesion':
        session_start();
        session_unset();
        session_destroy();
        header('Location: ./view/viewLogin.php');
        exit;
    break;

}

?>