<?php

require_once './model/TareaModel.php';
require_once './model/ProyectoModel.php';

class TareaController{

    public function cargar(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: ./index.php?accion=loginusuario');
            exit();
        }
        if (isset($_GET['idpro']) && is_numeric($_GET['idpro'])) {
            $idProyecto = $_GET['idpro'];
            $model = new TareaModel();
            $tareas = $model->cargar($idProyecto);
            require_once './view/viewCargarTareas.php';
        } else{ 
            echo "<p style='color:red;'>ID de proyecto no proporcionado o inválido.</p>";
            echo "<a href='index.php?accion=cargarproyectos'>Volver a proyectos</a>";
        }
    }

    public function guardar(){
        $idusuario = $_SESSION['usuario']['idusuario'];
        $model=new ProyectoModel();
        $proyectos=$model->cargar($idusuario);
        $idpro = isset($_GET['idpro']) ? $_GET['idpro'] : null;

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $model=new TareaModel();
            $tarea=new Tarea();
            $tarea->setNombre($_POST['txtNom']);
            $tarea->setDescripcion($_POST['txtDes']);
            $tarea->setIdProyecto($_POST['cbxIdPro']);
            $tarea->setFechaInicio($_POST['dtFi']);
            $tarea->setFechaFin($_POST['dtFf']);
            $tarea->setEstado($_POST['cbxEs']);
            $model->guardar($tarea);
            header('Location: ./index.php?accion=cargartareas&idpro=' . $_POST['cbxIdPro']);
        }
        else{ require_once './view/viewGuardarTarea.php'; }
    }

    public function borrar(){
        if(isset($_GET['idta'])){
            $idtarea = $_GET['idta'];
            $model=new TareaModel();
            $idpro = $model->obtenerIdProyectoPorTarea($idtarea);
            $model->borrar($idtarea);
            header('Location: ./index.php?accion=cargartareas&idpro=' . $idpro);
        }
    }

}

?>