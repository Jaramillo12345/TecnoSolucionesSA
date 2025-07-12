<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1, h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h1>Reporte de Proyecto</h1>
    <h2><?= $proyecto->getNombre(); ?></h2>

    <p><strong>Descripción:</strong> <?= $proyecto->getDescripcion(); ?></p>
    <p><strong>Fecha de Inicio:</strong> <?= $proyecto->getFechaInicio(); ?></p>
    <p><strong>Fecha de Fin:</strong> <?= $proyecto->getFechaFin(); ?></p>
    <p><strong>Estado:</strong> <?= $proyecto->getEstado(); ?></p>

    <h2>Tareas del Proyecto</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?= $tarea->getNombre(); ?></td>
                <td><?= $tarea->getDescripcion(); ?></td>
                <td><?= $tarea->getFechaInicio(); ?></td>
                <td><?= $tarea->getFechaFin(); ?></td>
                <td><?= $tarea->getEstado(); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>