<?php

class Cliente{

    private $idcliente;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    private $fecha_registro;
    private $idusuario;

    public function getIdCliente(){ return $this->idcliente; }

    public function setIdCliente($idcliente){ $this->idcliente = $idcliente; }

    public function getNombre(){ return $this->nombre; }

    public function setNombre($nombre){ $this->nombre = $nombre; }

    public function getEmail(){ return $this->email; }

    public function setEmail($email){ $this->email = $email; }

    public function getTelefono(){ return $this->telefono; }

    public function setTelefono($telefono){ $this->telefono = $telefono; }

    public function getDireccion(){ return $this->direccion; }

    public function setDireccion($direccion){ $this->direccion = $direccion; }

    public function getFechaRegistro(){ return $this->fecha_registro; }

    public function setFechaRegistro($fecha_registro){ $this->fecha_registro = $fecha_registro; }

    public function getIdUsuario(){ return $this->idusuario; }

    public function setIdUsuario($idusuario){ $this->idusuario = $idusuario; }
    
}

?>