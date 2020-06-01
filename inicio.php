<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de ESC</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/validarLogin.js"></script>
</head>
<body>
    <header>
        <div align="center">
            <h1>Blog Evaluacion de Sistemas Computacionales</h1>
        </div>
        <div>
            <img src="imagenes/logoUcen.png" alt="No se encontro la imagen" width="80" height="80" aling="center">
        </div>
    </header>

    <!-- Formulario de registro -->
    <form class ="box" action="php/sesion.php" method="POST" onsubmit="return validarLogin();"> <!--method="POST" -->
        <h1>login</h1>
        <input type="text" name="correo" id="correo" placeholder="Correo">
        <input type="password" name="password" id ="pass" placeholder="Contraseña" require>
        <input type="submit" name="boton" value="Ingresar" require>
    </form>

    <!-- Boton de envio de los datos al archivo formulario -->
    <form class="btn" action="formulario.php">
        <div>
            <input type="submit" name="boton" value="Registrate"></input>
        </div>
    </form>
    
    <!-- Entrar como invitado -->
    <form class="invitado" action="sesion.php" method="POST">
        <div>
            <input type="text" name="correo" id='correo' placeholder="ingresa tu correo..."><br><br>
            <input type="submit" name="boton" value="Entrar"></input>
        </div>
    </form>




</body>
</html>