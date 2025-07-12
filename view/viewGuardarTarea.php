<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Agregar Nueva Tarea</h1>
        <hr>
        <form action="index.php?accion=guardartarea" method="post">
            <input type="text" name="txtNom" placeholder="Nombre" required>
            <input type="text" name="txtDes" placeholder="Descripción" required>

            <select name="cbxIdPro" id="cbxIdPro" <?= isset($idpro) ? 'readonly disabled' : '' ?> required>
                <option value="">Seleccionar Proyecto</option>
                <?php foreach($proyectos as $pro){ 
                    $selected = (isset($idpro) && $pro->getIdProyecto() == $idpro) ? 'selected' : '';
                ?>
                <option value="<?=$pro->getIdProyecto()?>" <?=$selected?>><?=$pro->getNombre()?></option>
                <?php } ?>
            </select>
            <?php if (isset($idpro)) { ?>
                <input type="hidden" name="cbxIdPro" value="<?=$idpro?>">
            <?php } ?>

            <br><br>
            <label for="FechaInicio">Fecha de Inicio:</label>
            <input type="date" name="dtFi" required>
            <br><br>
            <label for="FechaFin">Fecha de Entrega:</label>
            <input type="date" name="dtFf" required>
            <br><br>
            <select name="cbxEs" id="cbxEs">
                <option>Seleccionar Estado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En progreso">En progreso</option>
                <option value="Completada">Completada</option>
            </select>
            <br><br>

            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>