<?php

require_once './config/DB.php';
require_once 'Proyecto.php';
require_once 'Cliente.php';
require_once 'Usuario.php';

class ProyectoModel{

    private $db;
    public function __construct(){
        $this->db=DB::conectar();
    }

    public function guardar(Proyecto $proyecto){
        $sql="insert into Proyecto (nombre, descripcion, idcliente, idusuario, fecha_inicio, fecha_fin, estado) values (:n, :d, :idcli, :idusu, :fi, :ff, :e)";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(":n", $proyecto->getNombre());
        $ps->bindParam(":d", $proyecto->getDescripcion());
        $ps->bindParam(":idcli", $proyecto->getIdCliente());
        $ps->bindParam(":idusu", $proyecto->getIdUsuario());
        $ps->bindParam(":fi", $proyecto->getFechaInicio());
        $ps->bindParam(":ff", $proyecto->getFechaFin());
        $ps->bindParam(":e", $proyecto->getEstado());
        $ps->execute();
    }

    public function cargar($idusuario){
        $sql="select p.*, c.nombre as nombre_cliente, u.nombre as nombre_usuario from Proyecto p
            join Cliente c on p.idcliente = c.idcliente
            join Usuario u on p.idusuario = u.idusuario
            where p.idusuario = :idusu";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(':idusu', $idusuario);
        $ps->execute();
        $filas=$ps->fetchall();
        $proyectos=array();

        foreach($filas as $f){
            $pro=new Proyecto();
            $pro->setIdProyecto($f['idproyecto']);
            $pro->setNombre($f['nombre']);
            $pro->setDescripcion($f['descripcion']);
            $pro->setIdCliente($f['idcliente']);
            $pro->setIdUsuario($f['idusuario']);
            $pro->setFechaInicio($f['fecha_inicio']);
            $pro->setFechaFin($f['fecha_fin']);
            $pro->setEstado($f['estado']);
            $pro->nombre_cliente = $f['nombre_cliente'];
            $pro->nombre_usuario = $f['nombre_usuario'];

            array_push($proyectos, $pro);
        }
        return $proyectos;
    }

    public function buscarPorId($idpro) {
        $sql = "select * from Proyecto where idproyecto = :id";
        $ps = $this->db->prepare($sql);
        $ps->bindParam(":id", $idpro);
        $ps->execute();
        $filas = $ps->fetch();

        if ($filas) {
            $pro = new Proyecto();
            $pro->setIdProyecto($filas[0]);
            $pro->setNombre($filas[1]);
            $pro->setDescripcion($filas[2]);
            $pro->setIdCliente($filas[3]);
            $pro->setIdUsuario($filas[4]);
            $pro->setFechaInicio($filas[5]);
            $pro->setFechaFin($filas[6]);
            $pro->setEstado($filas[7]);
            return $pro;
        }
        return null;
    }

    public function borrar($idpro){
        $sql="delete from Proyecto where idproyecto=:idpro";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(':idpro', $idpro);
        $ps->execute();
    }

}

?>