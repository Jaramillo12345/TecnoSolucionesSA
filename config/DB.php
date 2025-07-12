<?php
    class DB{
        public static function conectar(){
            $url="pgsql: host=localhost; dbname=tecnosolucionessa";
            $user="postgres";
            $password="12345";
            $cn=new PDO($url, $user, $password);
            return $cn;
        }
    }
?>