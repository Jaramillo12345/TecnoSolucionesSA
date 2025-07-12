<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>LOGIN USUARIO</h1>
        <hr>
        <form action="../index.php?accion=loginusuario" method="post">
            Correo: <input type="email" name="email"><br><br>
            Contraseña: <input type="password" name="contrasena"><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <hr>
        <a href="../index.php?accion=registrarusuario">Registrarse</a>
    </div>
</body>
</html>