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

    <form class ="box" action="bloghome.php" method="POST" onsubmit="return validarLogin();"> <!--method="POST" -->
        <h1>login</h1>
        <input type="text" name="user" id="user" placeholder="Correo">
        <input type="password" name="password" id ="pass" placeholder="Contraseña" require>
        <input type="submit" name="boton" value="Ingresar" require>
        
    </form>
    <form class="btn" action="formulario.php">
        <div>
            <input type="submit" name="boton" value="Registrate"></input>     
        </div>
    </form>
    



</body>
</html>