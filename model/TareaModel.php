<?php

require_once './config/DB.php';
require_once 'Tarea.php';

class TareaModel{
    private $db;
    public function __construct(){
        $this->db=DB::conectar();
    }

    public function guardar(Tarea $tarea){
        $sql="insert into Tarea (nombre, descripcion, idproyecto, fecha_inicio, fecha_fin, estado) values (:n, :d, :idpro, :fi, :ff, :e)";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(":n", $tarea->getNombre());
        $ps->bindParam(":d", $tarea->getDescripcion());
        $ps->bindParam(":idpro", $tarea->getIdProyecto());
        $ps->bindParam(":fi", $tarea->getFechaInicio());
        $ps->bindParam(":ff", $tarea->getFechaFin());
        $ps->bindParam(":e", $tarea->getEstado());
        $ps->execute();
    }

    public function cargar($idpro = null){
        $sql = "select t.*, p.nombre AS nombre_proyecto 
        from Tarea t 
        join Proyecto p on t.idproyecto = p.idproyecto";
        if ($idpro !== null) {
            $sql .= " where t.idproyecto = :idpro";
            $ps = $this->db->prepare($sql);
            $ps->bindParam(":idpro", $idpro);
        } else{ $ps = $this->db->prepare($sql); }
        $ps->execute();
        $filas=$ps->fetchall();
        $tareas=array();
        foreach($filas as $f){
            $ta=new Tarea();
            $ta->setIdTarea($f['idtarea']);
            $ta->setNombre($f['nombre']);
            $ta->setDescripcion($f['descripcion']);
            $ta->setIdProyecto($f['idproyecto']);
            $ta->setFechaInicio($f['fecha_inicio']);
            $ta->setFechaFin($f['fecha_fin']);
            $ta->setEstado($f['estado']);
            $ta->nombre_proyecto = $f['nombre_proyecto'];
            array_push($tareas, $ta);
        }
        return $tareas;
    }

    public function obtenerIdProyectoPorTarea($idtarea){
        $sql = "SELECT idproyecto FROM Tarea WHERE idtarea = :idta";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(':idta', $idtarea);
        $ps->execute();
        $fila = $ps->fetch();
        return $fila ? $fila['idproyecto'] : null;
    }

    public function borrar($idta){
        $sql="delete from Tarea where idtarea=:idta";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(':idta', $idta);
        $ps->execute();
    }

}

?>