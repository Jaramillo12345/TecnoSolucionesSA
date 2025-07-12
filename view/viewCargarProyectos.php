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
        <h1>PROYECTOS</h1>
        <hr>
        <a href="index.php?accion=guardarproyecto">Crear Nuevo Proyecto</a>
        <table border="1">
            <thead>
                <tr>
                    <td>IdProyecto</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Cliente Asignado</td>
                    <td>Usuario Creador</td>
                    <td>Fecha de Inicio</td>
                    <td>Fecha de Entrega</td>
                    <td>Estado</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($proyectos as $pro){ ?>
                <tr>
                    <td><?=$pro->getIdProyecto()?></td>
                    <td><?=$pro->getNombre()?></td>
                    <td><?=$pro->getDescripcion()?></td>
                    <td><?=$pro->nombre_cliente?></td>
                    <td><?=$pro->nombre_usuario?></td>
                    <td><?=$pro->getFechaInicio()?></td>
                    <td><?=$pro->getFechaFin()?></td>
                    <td><?=$pro->getEstado()?></td>
                    <td><a href="index.php?accion=borrarproyecto&idpro=<?=$pro->getIdProyecto()?>">Borrar</a></td>
                    <td><a href="index.php?accion=cargartareas&idpro=<?=$pro->getIdProyecto()?>">Ver Tareas</a></td>
                    <td><a href="index.php?accion=generarreporte&idpro=<?=$pro->getIdProyecto()?>">Reporte</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>