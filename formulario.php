<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/validar.js"> </script>

</head>
<body>
    <header class="cabecera">
        <h1 id="hola">Registro de Usuario</h1>
        <img src="imagenes/logoUcen.png" alt="No se encontro la imagen" width="80" height="80">

    </header>

    <form class ="box" action="bloghome.php" method="POST" id="frmRegistro" onsubmit="return validar();">
        <h1>Registrate</h1>
        <input type="text" name="nusuario" id="usuario" placeholder="Nombre usuario" require>
        <input type="email" name="correo" id="correo" placeholder="Ingrese correo" require>
        <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" require>
        <input type="password" name="contrasena1" id="contrasena1" placeholder="Misma contraseña" require>
        <input type="submit" name="boton" value="Enviar" id="registro">
    </form>
    <!-- boton para volver al login-->
    <form class="btn1" action="inicio.php">
        <div>
            <input type="submit" name="boton1" value="Log In"></input>     
        </div>
    </form>
    

    
</body>
</html>