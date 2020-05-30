<?php ?>

<!-- Cookies-->
<?php 

if (isset($_POST['usuario'])
    && isset($_POST['nombre'])
    && isset($_POST['apellido'])
    && isset($_POST['correo'])
    && isset($_POST['contrasena'])){

    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    //Consultar si el correo ya fue ingresado

     //Cookies del usuario registrado
     setcookie('usuarioC',$usuario,time()+3600,'/');
     setcookie('nombreC',$nombre,time()+3600,'/');
     setcookie('apellidoC',$apellido,time()+3600,'/');
     setcookie('correoC',$correo,time()+3600,'/');
     setcookie('contrasenaC',$contrasena,time()+3600,'/');

    }
?>

<!-- Sesion de usuario -->
<?php
    session_start();

    if (isset($_POST['correo'])){

        $correo=$_POST['correo'];
        $_SESSION['correoValidacion']=$correo;
        header("Location:../bloghome.php");
    }

?>

<!-- Registro de usuario -->
<?php
     include 'conexion.php';

     $varsesion =$_SESSION['correoValidacion'];

     if (isset($varsesion)){

        $usuario=$_POST['usuario'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];
        $fecha =date('Y-n-d');
        $hora =date('G:i:s');

        $insertar= "INSERT INTO usuario(nombre_usuario,nombre,apellido,correo,contrasena,fecha_registro,hora_registro)
                   VALUES ('$usuario','$nombre','$apellido','$correo','$contrasena','$fecha','$hora')";
        $resultado = mysqli_query($conexion,$insertar);
        mysqli_close($conexion);

     }
?>

<!-- Registro de autores -->
<?php
    //Registro de Autores
    include 'conexion.php';

    if (isset($varsesion)){

      $correo =$_POST['correo'];;
      $ID_autor="SELECT usuario_id,nombre_usuario FROM usuario WHERE correo='$correo'";
      $consultaID =mysqli_query($conexion,$ID_autor);
      $datos_usuario = mysqli_fetch_row($consultaID);
      $agregarAutor = "INSERT INTO autores (nombre_autor,usuario_id)
                      VALUES('$datos_usuario[1]','$datos_usuario[0]')";
      $consultaAutor = mysqli_query($conexion,$agregarAutor);
      mysqli_close($conexion);
    }
  ?>

<!-- Registro de logeos -->
<?php
     
    include 'conexion.php';

    if (isset($varsesion)){

       $correo_usuario=$varsesion;
       $fecha =date('Y-n-d');
       $hora =date('G:i:s');

       $sqlconsulta="SELECT usuario_id FROM usuario WHERE correo='$correo_usuario'";
       $consulta= mysqli_query($conexion,$sqlconsulta);
       $datos = mysqli_fetch_row($consulta);

       $sql= "INSERT INTO logeos(correo,hora,usuario_id,fecha)
               VALUES('$correo_usuario','$hora','$datos[0]','$fecha')";
       $consulta1 = mysqli_query($conexion,$sql);
       mysqli_close($conexion);

       }
?>

 <!-- Validacion del usuario al ingresar -->
 <?php
    include 'php/conexion.php';

    if (isset($varsesion) && isset($_POST['contrasena'])){

         $correo_ingreso=$varsesion;
         $password=$_POST['contrasena'];

         $sql="SELECT * FROM usuario WHERE correo ='$correo_ingreso' AND contrasena ='$password'";
         $consulta = mysqli_query($conexion,$sql);
         $prueba = mysqli_fetch_row($consulta);
         //Se valida si el correo o la contraseñas ingresadas son correctas.
         //En el caso de ser una incorrecta, se redirecciona a la pagina de inicio y se emite un Alert
         if ($prueba[4]==$correo_ingreso ){
           echo("<script> alert('Usuario encontrado');</script>");
         }else if($prueba[5]==$password){
             echo("<script> alert('Contraseña correcta');</script>");

           }else{//redirecciona hacia atras si el usuario ingresado no es valido
           echo("<script> alert('Usuario o Contraseña incorrecta');</script>");
           echo("<script> window.location.href='inicio.php'</script> ");
           }
         mysqli_close($conexion);
   }
  ?>