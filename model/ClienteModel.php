<?php

require_once './config/DB.php';
require_once 'Cliente.php';

class ClienteModel{

    private $db;
    public function __construct(){
        $this->db=DB::conectar();
    }

    public function guardar(Cliente $cliente){
        $sql="insert into Cliente (nombre, email, telefono, direccion, idusuario) values (:n, :e, :t, :d, :idusu)";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(":n", $cliente->getNombre());
        $ps->bindParam(":e", $cliente->getEmail());
        $ps->bindParam(":t", $cliente->getTelefono());
        $ps->bindParam(":d", $cliente->getDireccion());
        $ps->bindParam(":idusu", $cliente->getIdUsuario());
        $ps->execute();
    }

    public function cargar($idUsuario){
        $sql="select * from Cliente where idusuario = :idusu";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(":idusu", $idUsuario);
        $ps->execute();
        $filas=$ps->fetchall();
        $clientes=array();
        foreach($filas as $f){
            $cli=new Cliente();
            $cli->setIdCliente($f[0]);
            $cli->setNombre($f[1]);
            $cli->setEmail($f[2]);
            $cli->setTelefono($f[3]);
            $cli->setDireccion($f[4]);
            $cli->setFechaRegistro($f[5]);
            array_push($clientes, $cli);
        }
        return $clientes;
    }

    public function borrar($idcli){
        $sql="delete from Cliente where idcliente=:idcli";
        $ps=$this->db->prepare($sql);
        $ps->bindParam(':idcli', $idcli);
        $ps->execute();
    }

}

?>