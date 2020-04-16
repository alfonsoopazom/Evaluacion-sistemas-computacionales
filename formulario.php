<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="cabecera">
        <h1>Registro de Usuario</h1>
        <img src="imagenes/logoUcen.png" alt="No se encontro la imagen" width="80" height="80">

    </header>
    <form class ="box" action="conexion.php" method="POST">
        <h1>Registrate</h1>
        <input type="text" name="nusuario" placeholder="nombre usuario">
        <input type="text" name="correo" placeholder="ingrese correo">
        <input type="password" name="contrasena" placeholder="Contraseña">
        <input type="password" name="contrasena1" placeholder="repita contraseña">
        <input type="submit" name="boton" value="Enviar">
        
    </form>
    


</body>
</html>