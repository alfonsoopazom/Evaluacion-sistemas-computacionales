<!-- Sesiones y cookies -->
<?php
  session_start();
  $varsesion =$_SESSION['correoValidacion'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">
  <script src="js/funciones.js" ></script>
</head>

<body>
<?php
    //Enviar post a la base de datos
    include 'php/conexion.php';
    //Es necesario reducir est consulta a lo mas pequeño posible
    if (isset($_POST['titulo']) && isset($_POST['cuerpo'])){

        $titulo =$_POST['titulo'];
        $cuerpo =$_POST['cuerpo'];
        $fecha = date('Y-n-d');
        $hora =date('G:i:s');
        $correoU=$varsesion;
       
        //Obteniendo usuario_id
        $id_usuario = "SELECT usuario_id FROM usuario 
                       WHERE correo='$correoU'";
        $consultaUsuario =mysqli_query($conexion,$id_usuario);
        $id_u=mysqli_fetch_row($consultaUsuario);
        //echo("ID del usuario: ".$id_u[0]);
        
        //Obteniendo el ID del autor
        $id_autor = "SELECT id_autor FROM autores WHERE usuario_id='$id_u[0]'";
        $consultaAutor = mysqli_query($conexion,$id_autor);
        $id_Autor = mysqli_fetch_row($consultaAutor);
        
        //echo("ID del autor:".$id_Autor[0]);
        $agrega_post= "INSERT INTO post(post,fecha_post,id_autor,titulo,hora) 
                       VALUES ('$cuerpo','$fecha','$id_Autor[0]','$titulo','$hora')";
        $consulta = mysqli_query($conexion,$agrega_post);
        mysqli_close($conexion);

    }else{
      //echo("No se ingresaron datos");
    }
?>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #0040FF;">
    <div class="container">
      <a class="navbar-brand" href="bloghome.php">Blog Evaluación de Sistemas Computacionales</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--  header de la pagina -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- Inicio -->
          <li class="nav-item">
            <a class="nav-link" href="bloghome.php" id="inicio-id">Inicio</a>
          </li>
          <!-- Redirecciona hacie el perfil del usuario-->
          <li class="nav-item">
            <a class="nav-link" href="usuario.php">
              <?php echo($varsesion);?>            
            </a>
          </li>
          <!-- Volver al Home de la pagina -->
          <li class="nav-item">
            <a href ="bloghome.php" class="nav-link" id="volver">Volver</a>
          </li>
          <!-- Salir de la sesion. -->
          <li class="nav-item">
            <a class="nav-link" href="php/cerrarSesion.php" id="salir">Salir</a>
          </li>
        </ul>
      </div>
      <!-- Termina el header de la pagina -->
    </div>
    <!-- Termina la clase Container -->
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">
        <!-- Titulo del POST -->
        <h1 class="mt-4">
        <?php
           if (isset($_POST['titulo'])){
              $titulo =$_POST['titulo'];
              echo($titulo);}
        ?>
        </h1>
        <!-- Autor del post -->
        <p class="lead">
          Por <a href="#"><?php echo($varsesion);?></a>
        </p>
        <!-- Date/Time -->
        <p>Posteado el 
          <!-- Fecha actual - Se debe agregar la fehca del POST -->
          <?php $fecha=date('Y-n-d'); echo($fecha);?> 
          <!-- Hora actual - Hay que cambiarla a la hora que se genera el POST -->
          <?php $hora =date('G:i:s'); echo 'A las ',$hora;?>
        </p>
        <!-- Contenido del Post -->
        <p class="lead">
          <b>
            <?php
               if (isset($_POST['cuerpo'])){
                  $cuerpo = $_POST['cuerpo'];
                  echo($cuerpo);
                }
            ?>
          </b>
        </p>
        <!-- Fin del contenido del Post -->
        <!-- Inicio de la barra de comentarios -->
        <!-- Comments Form
        <div class="card my-4">
          <h5 class="card-header">Deja tu Comentario:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" style="background-color: #0040FF;">Enviar</button>
            </form>
          </div>
        </div>
        
                
         <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Nombre del Comentador</h5>
          </div>
        </div> -->

        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Nombre del Comentador</h5> -->
            <!-- <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
            <h5 class="mt-0">Nombre del Comentador</h5>    
            </div>
            </div>
          </div>
        </div> -->
        
      </div>

      <!-- Sidebar Widgets Columnnn -->
      <div class="col-md-4">

        <!-- Boton de Editar tu post -->
        <div class="card my-4">
          <h5 class="card-header">Editar</h5>
          <div class="card-body">
            <div class="input-group">
                <a href="post.php"><button type="submit" class="btn btn-primary" style="background-color: #0040FF;">EDITAR</button></a>
            </div>
          </div>
        </div>
        <!-- Fin del boton editar -->
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
