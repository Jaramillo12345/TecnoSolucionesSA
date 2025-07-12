<?php

require_once './model/ProyectoModel.php';
require_once './model/TareaModel.php';
require_once './model/ReporteModel.php';

require './vendor/autoload.php';

use Dompdf\Dompdf;

class ReporteController {

    public function generarPDF() {
        if (!isset($_GET['idpro'])) {
            echo "ID del proyecto no proporcionado.";
            return;
        }

        $idProyecto = $_GET['idpro'];
        $proyectoModel = new ProyectoModel();
        $tareaModel = new TareaModel();
        $reporteModel = new ReporteModel();

        $proyecto = $proyectoModel->buscarPorId($idProyecto);
        $tareas = $tareaModel->cargar($idProyecto);

        ob_start();
        include './view/viewReportePDF.php';
        $html = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $nombreArchivo = 'Reporte_Proyecto_' . $idProyecto . '_' . date('Ymd_His') . '.pdf';
        $rutaArchivo = './reportes/' . $nombreArchivo;

        file_put_contents($rutaArchivo, $dompdf->output());

        $reporte = new Reporte();
        $reporte->setIdProyecto($idProyecto);
        $reporte->setRutaPDF($rutaArchivo);
        $reporteModel->guardar($reporte);

        $dompdf->stream($nombreArchivo, ['Attachment' => true]);
    }
}