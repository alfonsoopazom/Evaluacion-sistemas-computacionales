<!-- Sesiones y cookies -->
<?php
  session_start();
  $varsesion =$_SESSION['correoValidacion'];
  if ($varsesion=='' || $varsesion==NULL) {
      echo('No cuentas con los permisos necesarios');
  }
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
    <!-- Se obtiene el ID desde la URL proveniente del bloghome.php -->
    <?php
        include 'php/conexion.php';
        $id_post =$_GET['id'];
        mysqli_close($conexion);
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
            <a class="nav-link" href="bloghome.php" id="inicio-id">
              <script>irInicio();</script>
              Inicio
             </a>
          </li>
          <!-- usuario -->
          <li class="nav-item">
            <a class="nav-link" href="usuario.php">
              <?php
                  echo($varsesion);
              ?>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="php/cerrarSesion.php" id="volver">
              <!-- <script>redireccionarLogin();</script> -->
              Salir
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
        <?php

        include 'php/conexion.php';
        
        //Se obtiene El nombre del autor de Comentario
        $Autor_comentario="SELECT a.nombre_autor FROM autores a, usuario u WHERE u.correo='$varsesion' AND u.usuario_id=a.usuario_id";
        $consulta_usuario= mysqli_query($conexion,$Autor_comentario);
        $var_autor=mysqli_fetch_row($consulta_usuario);
            
        //Se obtiene la informacion del Post
        $post ="SELECT p.id_post, p.titulo, p.post, u.nombre_usuario,p.fecha_post
                FROM usuario u, autores a, post p
                WHERE u.usuario_id=a.usuario_id AND a.id_autor=p.id_autor AND p.id_post ='$id_post'";
        $postquery = mysqli_query($conexion,$post);
        mysqli_close($conexion);

        while ($posts = mysqli_fetch_array($postquery)) {
        ?>
        <!-- Titulo del POST -->
        <h1 class="mt-4"><?php echo($posts['titulo']); ?></h1>
        <!-- Autor del post -->
        <p class="lead">Por
          <a href="#"><?php echo($posts['post']); ?></a>
        </p>
        <!-- Date/Time -->
        <p>Posteado el </a><?php echo($posts['fecha_post']); ?></p>
        <?php
        }
        ?>
        <!-- Preview Image -->
        <!-- <img class="img-fluid rounded" src="https://www.javeriana.edu.co/pesquisa/wp-content/uploads/2019/10/banner-articulo-ni%C3%B1a-bonita-900x300.jpg" alt=""> -->
        <!-- Contenido del Post -->
          <p class="lead">
            <b></b>
          </p>
        <!-- Comments Form -->
        <div class="card my-4"> 
          <h5 class="card-header">Deja tu Comentario:<i> <?php echo($var_autor[0]);?> </i> </h5>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <textarea class="form-control" name="comentario" rows="3"></textarea>
              </div><?php ?>
              <input type="submit" name="EnviarComentario" class="btn btn-primary" style="background-color: #0040FF;"></input>
            </form>
          </div>
        </div>
        <!-- Fin del cuadro de comentarios -->

        <!-- Single Comment -->
        <?php 
            include 'php/conexion.php';
            
            if (isset($_POST['EnviarComentario'])){
            
                //Comentario y fecha del post
                $comentario=$_POST['comentario'];
                $fecha =date('Y-n-d');
               
                //ID del usuario
                $id_usuario="SELECT u.usuario_id FROM usuario u WHERE u.correo='$varsesion'";
                $query_id = mysqli_query($conexion,$id_usuario);
                $IDusuario = mysqli_fetch_row($query_id);

                //Insertar datos a la tabla Comentarios 
                $query_comentario = "INSERT INTO comentarios(texto,fecha,id_usuario,id_post) 
                            VALUES ('$comentario','$fecha','$IDusuario[0]','$id_post')";
                $query_co = mysqli_query($conexion,$query_comentario);

                mysqli_close($conexion);

            }

        ?>
        <?php 
            include 'php/conexion.php';

            //Mostar los comentarios del usuario
            $query_mostrar = "SELECT texto FROM comentarios WHERE id_post='$id_post'";
            $conexion_texto = mysqli_query($conexion,$query_mostrar);

            
            mysqli_close($conexion);

            while ($mostrar=mysqli_fetch_array($conexion_texto)) {
            ?>
               
        <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0"><?php echo($var_autor[0]);?></h5>
            <p>
              <?php 
                 echo($mostrar['texto']);
              ?>
            </p>
            <form method="POST">
            <a href="#" name="eliminar-comentario" value="eliminar">Eliminar comentario
            <?php
                include 'php/conexion.php';

                $id_comentario="SELECT c.id_comentario FROM comentarios c WHERE c.id_post='$id_post'";
                $query_id_comentario = mysqli_query($conexion,$id_comentario);
                $comentario_id=mysqli_fetch_row($query_id_comentario);
                echo($comentario_id[0]);

                if(isset($_POST['eliminar-comentario'])) {
                
                    $po=$_POST['eliminar-comentario'];
                    echo($po);

                    //Eliminar los comentarios del usuario
                    $eliminar_comentarios = "DELETE FROM comentarios c WHERE c.id_comentario='$comentario_id[0]'";
                    $query_eliminar=mysqli_query($conexion,$eliminar_comentarios);

                    mysqli_close($conexion);

                }else {
                    echo('holi');
                }
                ?>
            </a>
            </form>

          </div>
        </div>
        <?php  }
        
                
        ?>
        <!-- Fin cuadro de comentario. -->
      </div>

      <!-- Sidebar Widgets Columnnn -->
      <div class="col-md-4">

        <!-- Boton de Editar tu post -->
        <!-- <div class="card my-4">
          <h5 class="card-header">Editar</h5>
          <div class="card-body">
            <div class="input-group">
                <button type="submit" class="btn btn-primary" style="background-color: #0040FF;">EDITAR</button>
            </div>
          </div>
        </div> -->
        <!-- Fin boton editar -->
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
