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
     //setcookie('contrasenaC',$contrasena,time()+3600,'/');

    }
?>

<!-- Sesion de usuario -->
<?php
    include 'conexion.php';
    session_start();

    $correo=$_POST['correo'];
    $_SESSION['correoValidacion']= $correo;
    $varsesion =$_SESSION['correoValidacion'];


    if (isset($_POST['correo']) && isset($_POST['password'])){

        $correo=$_POST['correo'];
        $contrasena=$_POST['password'];
       
        $consu = "SELECT correo,contrasena FROM usuario WHERE correo='$correo' AND contrasena='$contrasena'";
        $dale=mysqli_query($conexion,$consu);
        $resultado1 =mysqli_fetch_row($dale);
        
        if (($resultado1[0]==$correo) && ($resultado1[1]==$contrasena)){
            echo("<script> alert('Usuario encontrado');</script>");
            //echo($resultado1[0]);
            //echo($resultado1[1]);
            header("Location:bloghome.php");
        }else {
            echo("<script> alert('Usuario o Contraseña incorrecta');</script>");
            header("Location:index.php");
        }
       
    }
    mysqli_close($conexion);

?>


<!-- Registro de logeos en inicio-->
<?php
     
    include 'conexion.php';

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

       }
?>

 <!-- Validacion del usuario al ingresar -->
 
<!-- Sesion de invitado -->
<?php 



?>