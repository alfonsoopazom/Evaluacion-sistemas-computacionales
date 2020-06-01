<?php 
    session_start(); 
    $varsesion =$_SESSION['correoValidacion'];
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog de Evaluacion de sistemas computacionales</title>
  <script src="js/funciones.js"></script>
  <link rel="stylesheet" href="css/estilopost.css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0040FF;">
    <div class="container">
      <a class="navbar-brand" href="bloghome.php">Blog Evaluación de Sistemas Computacionales</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" id="inicio-id">Inicio</a>
            <script>irInicio();</script>
          </li>
          <li class="nav-item">
            <a class="nav-link" id ="usuario-id">
            <?php
                    echo($varsesion);
            ?>
              <script>irausuario();</script>
            </a>
          </li>
          <li class="nav-item">
           <a href ="php/cerrarSesion.php"class="nav-link" id="volver">Salir</a>
            <!-- <script> redireccionarLogin();</script> -->
          </li>
        </ul>
      </div>
    </div>
</nav>
</header>

<!-- Cuadro donde se encuentra el titulo y el post -->
<form action="blog-post.php" method="POST">
  <div class="container-post">
    <!-- Cuerpo del post -->
    <div class="box2">
        <h2>Escribe tu post</h2>
        <!-- Cuadro de texto del post -->
        <div class="box-post">
          <h5>Titulo del post</h5>
          <input type="text" name="titulo" id="titulo" placeholder="Escriba el titulo..."><br><br>
          <textarea name="cuerpo" id="textarea" cols="50" rows="10" placeholder="Escriba su post..." ></textarea><br>
          Maximo caracteres: 300
        </div>
        <!-- Boton publicar post -->
        <div class="box-publicar">
          <input type="submit" value="Publicar" name="publicar" id="publicar">
        </div>
    </div>  
  </div>
</form>
<footer class="py-5" style="background-color: #0040FF;">
    <div class="container">
      <p class="m-0 text-center text-white">Blog ESC 2020</p>
    </div>
    <!-- /.container -->
</footer>


<!-- Estilos de bootstrap y libreria jquery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
