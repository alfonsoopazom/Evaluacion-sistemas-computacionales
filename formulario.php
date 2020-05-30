

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
        <h1 id="hola">Blog Evaluación de Sistemas Computacionales</h1>
        <img src="imagenes/logoUcen.png" alt="No se encontro la imagen" width="80" height="80">

    </header>

    <form class ="box" action="php/sesion.php" method="POST" id="frmRegistro" onsubmit="return validar();">
        <h1>Registrate</h1>
        <input type="text" name="usuario" id="usuario" placeholder="Nombre usuario" required>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
        <input type="email" name="correo" id="correo" placeholder="Ingrese correo" required>
        <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
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
