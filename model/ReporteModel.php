<?php

require_once './config/DB.php';
require_once 'Reporte.php';

class ReporteModel {

    private $db;

    public function __construct() {
        $this->db = DB::conectar();
    }

    public function guardar(Reporte $reporte) {
        $sql = "insert into Reporte (idproyecto, ruta_pdf) values (:idpro, :ruta)";
        $ps = $this->db->prepare($sql);
        $idProyecto = $reporte->getIdProyecto();
        $rutaPDF = $reporte->getRutaPDF();
        $ps->bindParam(":idpro", $idProyecto);
        $ps->bindParam(":ruta", $rutaPDF);
        $ps->execute();
    }
}

?>