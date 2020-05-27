<!-- Cookies para validar el correo del usuario -->
<?php
      include 'php/conexion.php';
      session_start();
      session_regenerate_id(true);
      
      //echo(session_get_cookie_params()); 
    
      if (isset($_POST['correo'])){
        $nombreC ="cookieC";
        $correo =$_POST['correo'];
        setcookie($nombreC,$correo,time()+60,"/");
        $_SESSION['usuario']=$correo;
        //echo($_SESSION['usuario']);
      }
     // if (isset($_POST['usuario'])) {
        //$cookieUsuario = "cookieUser";
        //$nombre_usuario=$_POST['usuario'];
        //setcookie("cookie","HolaMundo",time()+1800,"/");
      //}else{setcookie("cookie","HolaMundo",time()+1800);}
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

  <?php
    // Script para el registro de un Usuario
    // Falta validar si los datos como el correo, contraseña y usuario no se repitan.
    include 'php/conexion.php';

    if (isset($_POST['usuario']) && isset($_POST['correo']) &&
        isset($_POST['nombre']) && isset($_POST['apellido']) &&
        isset($_POST['contrasena'])){

        $usuario =$_POST['usuario'];
        $nombre =$_POST['nombre'];
        $apellido =$_POST['apellido'];
        $correo =$_POST['correo'];
        $contrasena =$_POST['contrasena'];
        $fecha =date('Y-n-d');
        $hora =date('G:i:s');

        $insertar= "INSERT INTO usuario(nombre_usuario,nombre,apellido,correo,contrasena,fecha_registro,hora_registro)
                    VALUES ('$usuario','$nombre','$apellido','$correo','$contrasena','$fecha','$hora')";
        $resultado = mysqli_query($conexion,$insertar);
        mysqli_close($conexion);
      }
  ?>

  <?php
    //Registro de Autores
    include 'php/conexion.php';

    if (isset($_POST['correo'])){
      $correo=$_POST['correo'];
      $ID_autor="SELECT usuario_id, nombre_usuario FROM usuario WHERE correo='$correo'";
      $consultaID =mysqli_query($conexion,$ID_autor);
      $datos_usuario = mysqli_fetch_row($consultaID);
      $agregarAutor = "INSERT INTO autores (nombre_autor,usuario_id)
                      VALUES('$datos_usuario[1]','$datos_usuario[0]')";
      $consultaAutor = mysqli_query($conexion,$agregarAutor);
      mysqli_close($conexion);

    }else{}
  ?>

  <?php
    //Registro de logeo del usuario
    include 'php/conexion.php';

    if (isset($_POST['correo']) OR isset($_POST['correo'])){

      if (isset($_POST['correo'])){


         $correo_usuario=$_POST['correo'];
         $fecha =date('Y-n-d');
         $hora =date('G:i:s');
         $sqlconsulta="SELECT usuario_id FROM usuario WHERE correo='$correo_usuario'";
         $consulta= mysqli_query($conexion,$sqlconsulta);
         $datos = mysqli_fetch_row($consulta);

         $sql= "INSERT INTO logeos(correo,hora,usuario_id,fecha)
              VALUES('$correo_usuario','$hora','$datos[0]','$fecha')";
         $consulta1 = mysqli_query($conexion,$sql);
         mysqli_close($conexion);

        }else if(isset($_POST['correo'])){

         $correo_usuario=$_POST['correo'];
         $fecha =date('Y-n-d');
         $hora =date('G:i:s');

         $sqlconsulta="SELECT usuario_id FROM usuario WHERE correo='$correo_usuario'";
         $consulta= mysqli_query($conexion,$sqlconsulta);
         $datos = mysqli_fetch_row($consulta);

         $sql= "INSERT INTO logeos(correo,hora,usuario_id,fecha)
              VALUES('$correo_usuario','$hora','$datos[0]','$fecha')";
         $consulta1 = mysqli_query($conexion,$sql);
         mysqli_close($conexion);
        }else {
          echo("No se pudo logear el usuario");
        }
    }
  ?>
  <?php
    //Validacion de usuario registrado
    include 'php/conexion.php';
    
    if (isset($_POST['correo']) && isset($_POST['password'])){

         $correo_ingreso=$_POST['correo'];
         $password=$_POST['password'];
         $sql="SELECT * FROM usuario WHERE correo ='$correo_ingreso' AND contrasena ='$password'";
         $consulta = mysqli_query($conexion,$sql);
         $prueba = mysqli_fetch_row($consulta);
         //Se valida si el correo o la contraseñas ingresadas son correctas.
         //En el caso de ser una incorrecta, se redirecciona a la pagina de inicio y se emite un Alert
         if ($prueba[4]==$correo_ingreso ){
           echo("<script> alert('Usuario encontrado');</script>");
         }else if($prueba[5]==$password){
             echo("<script> alert('Contraseña correcta');</script>");
             //$nombreC ="cookieC";
             //$correo =$_POST['correo'];
             //setcookie($nombreC,$correo,time()+1800,"/");

           }else{//redirecciona hacia atras si el usuario ingresado no es valido
           echo("<script> alert('Usuario o Contraseña incorrecta');</script>");
           echo("<script> window.location.href='inicio.php'</script> ");
           }
         mysqli_close($conexion);
   }
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
                  $usuarioC=$_SESSION['usuario'];
                  echo($usuarioC);
            ?>
            </a>
            <script>irausuario();</script>
          </li>
          <!-- Boton para salir de la pagina -->
          <!-- Al salir se redirecciona al login y se destruye la sesion actual -->
          <li class="nav-item">
           <a class="nav-link" id="volver" ">Salir
           <?php echo("<script>redireccionarLogin();</script>");session_destroy();?>
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
      <form class ="box" action="blog-post.html" method="POST">
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
      <form class ="box" action="blog-post.html" method="POST">
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
      <form class ="box" action="blog-post.html" method="POST">
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
             <a class="btn btn-primary" href="post.php" style="background-color: #0040FF" role="button"> Crear</a>
              </span>
          </div>
        </div>
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
