<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php include 'menu.php'; ?>
        <h1>LISTA DE TAREAS DEL PROYECTO <?=$idProyecto?></h1>
        <hr>
        <a href="index.php?accion=guardartarea&idpro=<?=$idProyecto?>">Agregar Nueva Tarea</a>
        <table border="1">
            <thead>
                <tr>
                    <th>IdTarea</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Proyecto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tareas as $ta){ ?>
                <tr>
                    <td><?=$ta->getIdTarea()?></td>
                    <td><?=$ta->getNombre()?></td>
                    <td><?=$ta->getDescripcion()?></td>
                    <td><?= $ta->nombre_proyecto ?></td>
                    <td><?=$ta->getFechaInicio()?></td>
                    <td><?=$ta->getFechaFin()?></td>
                    <td><?=$ta->getEstado()?></td>
                    <td><a href="index.php?accion=borrartarea&idta=<?=$ta->getIdTarea()?>">Borrar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>