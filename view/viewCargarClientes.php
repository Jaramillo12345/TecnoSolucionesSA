<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: ./viewLogin.php');
    exit;
}
?>

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

        <h2>BIENVENIDO, <?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></h2>
        <h1>LISTA DE CLIENTES</h1>
        <hr>
        <a href="index.php?accion=guardarcliente">Agregar Nuevo Cliente</a>
        <table border="1">
            <thead>
                <tr>
                    <th>IdCliente</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cli){ ?>
                <tr>
                    <td><?=$cli->getIdCliente()?></td>
                    <td><?=$cli->getNombre()?></td>
                    <td><?=$cli->getEmail()?></td>
                    <td><?=$cli->getTelefono()?></td>
                    <td><?=$cli->getDireccion()?></td>
                    <td><?=$cli->getFechaRegistro()?></td>
                    <td><a href="index.php?accion=borrarcliente&idcli=<?=$cli->getIdCliente()?>">Borrar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>