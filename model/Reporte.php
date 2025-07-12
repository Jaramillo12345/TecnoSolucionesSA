<?php

class Reporte{

    private $idreporte;
    private $idproyecto;
    private $fecha_generacion;
    private $ruta_pdf;

    public function getIdReporte(){ return $this->idreporte; }

    public function setIdReporte($idreporte){ $this->idreporte = $idreporte; }

    public function getIdProyecto(){ return $this->idproyecto; }

    public function setIdProyecto($idproyecto){ $this->idproyecto = $idproyecto; }
    
    public function getFechaCreacion(){ return $this->fecha_generacion; }

    public function setFechaCreacion($fecha_generacion){ $this->fecha_generacion = $fecha_generacion; }

    public function getRutaPDF(){ return $this->ruta_pdf; }

    public function setRutaPDF($ruta_pdf){ $this->ruta_pdf = $ruta_pdf; }

}

?>