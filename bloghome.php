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
</head>

<body>
  
  <?php

    //Validacion de usuario registrado
    include 'php/conexion.php';

    if (isset($_POST['user']) && isset($_POST['password'])){
        $correo_ingreso = $_POST['user'];
        $password = $_POST['password'];

        $sql= "SELECT * FROM usuario WHERE correo ='$correo_ingreso' AND contrasena ='$password'";
        $consulta = mysqli_query($conexion,$sql);
        $prueba = mysqli_num_rows($consulta);
              
        if ($prueba !=0) {
          //echo "Usuario Encontrado";
        }else {
          //redirecciona hacia atras si el usuario ingresado no es valido
          header("Location: inicio.php");
          echo '<script language="javascript"> alert("Usuario no Encontrado");
                </script>';
        }
        mysqli_close($conexion);
    }
  ?>
  <?php
    // Script para el registro de un usuario
    include 'php/conexion.php';

    if (isset($_POST['nusuario']) && isset($_POST['correo']) && isset($_POST['contrasena']) && isset($_POST['contrasena1'])) {
        $usuario =$_POST['nusuario'];
        $correo =$_POST['correo'];
        $contrasena =$_POST['contrasena'];
        $contrasena1 =$_POST['contrasena1'];
       
        $insertar= "INSERT INTO usuario (nombre_usuario,correo,contrasena,contrasena2) 
                    VALUES ('$usuario','$correo','$contrasena','$contrasena1')";
        $resultado = mysqli_query($conexion,$insertar);
        mysqli_close($conexion);
      }
        
  ?>
  <?php
    //Registro de logeo del usuario 
    //include 'php/conexion.php';
    //session_start();
    /*if (isset($_POST['user'])){
      $correo= $_POST['user'];
      $fecha =date('Y-m-d');

      $sql1="SELECT usuario_id FROM usuario WHERE correo='$correo_usuario'";
      $consulta= mysqli_query($conexion,$sql1);
      $logeoID = mysqli_fetch_row($sql1);
  
      $sql= "INSERT INTO logeos(correo,hora) 
             VALUES('$correo_usuario','$fecha')";
      $consulta = mysqli_query($conexion,$sql);
      mysqli_close($conexion);
    }*/
  ?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0040FF;">
    <div class="container">
      <a class="navbar-brand" href="#">Blog Evaluación de Sistemas Computacionales</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Salir</a>
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
      <form class ="box" action="blog-post.html" method="POST">  
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
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
      <form class ="box" action="blog-post.html" method="POST">  
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
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
      <form class ="box" action="blog-post.html" method="POST">  
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
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
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
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

      </div>

    </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
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
