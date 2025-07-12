<?php

class Proyecto{

    private $idproyecto;
    private $nombre;
    private $descripcion;
    private $idcliente;
    private $idusuario;
    private $fecha_inicio;
    private $fecha_fin;
    private $estado;
    public $nombre_cliente;
    public $nombre_usuario;

    public function getIdProyecto(){ return $this->idproyecto; }

    public function setIdProyecto($idproyecto){ $this->idproyecto = $idproyecto; }

    public function getNombre(){ return $this->nombre; }

    public function setNombre($nombre){ $this->nombre = $nombre; }

    public function getDescripcion(){ return $this->descripcion; }

    public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }

    public function getIdCliente(){ return $this->idcliente; }

    public function setIdCliente($idcliente){ $this->idcliente = $idcliente; }

    public function getIdUsuario(){ return $this->idusuario; }

    public function setIdUsuario($idusuario){ $this->idusuario = $idusuario; }

    public function getFechaInicio(){ return $this->fecha_inicio; }

    public function setFechaInicio($fecha_inicio){ $this->fecha_inicio = $fecha_inicio; }

    public function getFechaFin(){ return $this->fecha_fin; }

    public function setFechaFin($fecha_fin){ $this->fecha_fin = $fecha_fin; }

    public function getEstado(){ return $this->estado; }

    public function setEstado($estado){ $this->estado = $estado; }
    
}

?>