<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Crear Nuevo Proyecto</h1>
        <hr>
        <form action="index.php?accion=guardarproyecto" method="post">
            <input type="text" name="txtNom" placeHolder="Nombre">
            <input type="text" name="txtDes" placeHolder="Descripción">

            <select name="cbxIdCli" id="cbxIdCli">
                <option>Seleccionar Cliente</option>
                <?php foreach($clientes as $cli){ ?>
                <option value="<?=$cli->getIdCliente()?>"> <?=$cli->getNombre()?> </option>
                <?php } ?>
            </select>

            <input type="hidden" name="cbxIdUsu" value="<?=$_SESSION['usuario']['idusuario']?>">
            <br><br>
            
            <label for="FechaInicio">Fecha de Inicio:</label>
            <input type="date" name="dtFi" required>
            <br><br>
            <label for="FechaFin">Fecha de Entrega:</label>
            <input type="date" name="dtFf" required>
            <br><br>
            <select name="cbxEs" id="cbxEs">
                <option>Seleccionar Estado</option>
                <option value="En Proceso">En Proceso</option>
                <option value="Finalizado">Finalizado</option>
            </select>

            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>