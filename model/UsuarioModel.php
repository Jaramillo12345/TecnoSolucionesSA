<?php

require_once './config/DB.php';
require_once 'Usuario.php';

class UsuarioModel{

    private $db;
    public function __construct(){
        $this->db=DB::conectar();
    }

    public function login($email, $contrasena) {
        $sql = "select * from Usuario where email = :e";
        $ps=$this->db->prepare($sql);
        $ps->execute(['e' => $email]);
        $usuario = $ps->fetch();
        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            return $usuario;
        }
        return false;
    }

    public function registrar(Usuario $usuario){
        $sql="insert into Usuario (nombre, email, contrasena, rol) values (:n, :e, :c, :r)";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(":n", $usuario->getNombre());
        $ps->bindParam(":e", $usuario->getEmail());
        $ps->bindParam(":c", $usuario->getContrasena());
        $ps->bindParam(":r", $usuario->getRol());
        $ps->execute();
    }

    public function cargar(){
        $sql="select * from Usuario";
        $ps=$this->db->prepare($sql);
        $ps->execute();
        $filas=$ps->fetchall();
        $usuario=array();
        foreach($filas as $f){
            $usu=new Usuario();
            $usu->setIdUsuario($f[0]);
            $usu->setNombre($f[1]);
            $usu->setEmail($f[2]);
            $usu->setContrasena($f[3]);
            $usu->setRol($f[4]);
            $usu->setFechaCreacion($f[5]);
            array_push($usuario, $usu);
        }
        return $usuario;
    }

    public function borrar($idusu){
        $sql="delete from Usuario where idusuario=:idusu";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(':idusu', $idusu);
        $ps->execute();
    }

}

?>