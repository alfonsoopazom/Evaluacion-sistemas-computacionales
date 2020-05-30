<!-- Cookies y las sesione idealmente se agregan al principio -->
<?php

      session_start();
      //Esta funcion permite omitir los errores por pantalla de PHP (0)
      //error_reporting(0);
      $varsesion =$_SESSION['correoValidacion'];
      //echo($varsesion);

      //session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog </title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">
  <script src="js/funciones.js"></script>
  <script src="js/validarLogin.js"></script>
</head>

<body>
  <!-- Registro de usuarios -->
 
  <!-- Registro de autores -->
  
  <!-- Registro del logeo del usuario -->
  
  <!-- Validacion del usuario al ingresar -->
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0040FF;">
    <div class="container">
      <a class="navbar-brand" href="#">Blog Evaluación de Sistemas Computacionales</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <!-- Refresh de la pagina -->
          <li class="nav-item">
            <a class="nav-link" id="inicio-id">Inicio</a>
            <script>irInicio();</script>
          </li>
          <!-- Nombre de usuario -->
          <li class="nav-item">
            <a class="nav-link" id ="usuario-id">
            <!-- Se agrega el nombre del usuario al header. -->
            <?php

              echo($varsesion);

            ?>
            </a>
            <script>irausuario();</script>
          </li>
          <!-- Boton para salir de la pagina -->
          <!-- Al salir se redirecciona al login y se destruye la sesion actual -->
          <li class="nav-item">
           <a href ="php/cerrarSesion.php" class="nav-link" id="volver">Salir
            <?php
              //echo("<script>redireccionarLogin();</script>");
              //  session_destroy();
            ?>
           </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Ultimos Post
          <!--<small>Secondary Text</small>-->
        </h1>

        <!-- Blog Post -->
      <form class ="box">
        <div class="card mb-4">
          <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
          <div class="card-body">
            <h2 class="card-title">Titulo del post</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>

            <a href="#" class="btn btn-primary" style="background-color: #0040FF;">Seguir Leyendo &rarr;</a>

          </div>
          <div class="card-footer text-muted">
          <script>
              horaActual();
          </script> by
            <a href="#">Nombre del usuario</a>
          </div>
        </div>
      </form>

        <!-- Blog Post -->
      <form class ="box">
        <div class="card mb-4">
          <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
          <div class="card-body">
            <h2 class="card-title">Titulo del post</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>

            <a href="#" class="btn btn-primary" style="background-color: #0040FF;">Seguir Leyendo &rarr;</a>

          </div>
          <div class="card-footer text-muted">
            <script> horaActual();</script> by
            <a href="#">Nombre del usuario</a>
          </div>
        </div>
      </form>

        <!-- Blog Post -->
      <form class ="box">
        <div class="card mb-4">
          <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
          <div class="card-body">
            <h2 class="card-title">Titulo del post</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>

            <a href="#" class="btn btn-primary" style="background-color: #0040FF;">Seguir Leyendo &rarr;</a>
          </div>
          <div class="card-footer text-muted">
          <script> horaActual();</script> by
            <a href="#">Nombre del usuario</a>
          </div>
        </div>
      </form>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Anteriores</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Siguientes &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Buscar</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button" style="background-color: #0040FF;">Ir</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Crear un post nuevo -->
        <div class="card my-4">
          <h5 class="card-header">Crear Post</h5>
          <div class="card-body">
            <span class="input-group-btn">
             <a class="btn btn-primary" href="post.php" style="background-color: #0040FF" role="button">Crear</a>
            </span>
          </div>
        </div>
        <!-- Hipervinvulos a los post publicados anteriormente -->
        <div class="card my-4">
          <h5 class="card-header">Ultimos Posts</h5>
          <div class="card-body">
             <ul>
                <!-- <center> -->
                <ol><a href="post 1">Esto es un link al post 2</a></ol>
                <ol><a href="post 1">Esto es un link al post 3</a></ol>
                <ol><a href="post 1">Esto es un link al post 4</a></ol>
                <ol><a href="post 1">Esto es un link al post 5</a></ol>
                <!-- </center> -->
             </ul>
          </div>
        </div>
        <!-- Imagen de la universidad -->
        <div>
          <img src="imagenes/logoUcen.png" alt="No se encontro la imagen" width="80" height="80">
        </div>

      </div>
    </div>



      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5" style="background-color: #0040FF;">
    <div class="container">
      <p class="m-0 text-center text-white">Blog ESC 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>