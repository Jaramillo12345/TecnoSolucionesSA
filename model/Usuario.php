<?php

class Usuario{
    
    private $idusuario;
    private $nombre;
    private $email;
    private $contrasena;
    private $rol;
    private $fecha_creacion;

    public function getIdUsuario(){ return $this->idusuario; }

    public function setIdUsuario($idusuario){ $this->idusuario = $idusuario; }

    public function getNombre(){ return $this->nombre; }

    public function setNombre($nombre){ $this->nombre = $nombre; }

    public function getEmail(){ return $this->email; }

    public function setEmail($email){ $this->email = $email; }

    public function getContrasena(){ return $this->contrasena; }

    public function setContrasena($contrasena){ $this->contrasena = $contrasena; }

    public function getRol(){ return $this->rol; }

    public function setRol($rol){ $this->rol = $rol; }

    public function getFechaCreacion(){ return $this->fecha_creacion; }

    public function setFechaCreacion($fecha_creacion){ $this->fecha_creacion = $fecha_creacion; }
    
}

?>