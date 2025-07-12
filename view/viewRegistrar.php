<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>REGISTRAR USUARIO</h1>
        <hr>
        <form action="../index.php?accion=registrarusuario" method="post">
            Nombre: <input type="txt" name="txtNom"><br><br>
            Email: <input type="email" name="txtEmail"><br><br>
            Contraseña: <input type="password" name="txtCont"><br><br>
            Rol: <select name="cbxRol" id="cbxRol">
                <option>Seleccione Rol</option>
                <option value="empleado">Empleado</option>
            </select><br><br>
            <input type="submit" value="Registrar">
        </form>
        <hr>
        <a href="../index.php?accion=loginusuario">Volver</a>
    </div>
</body>
</html>