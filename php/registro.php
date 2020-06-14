
<!-- Registro de usuario -->
<?php
     include 'conexion.php';
     session_start();

     $correo=$_POST['correo'];
     $_SESSION['correoValidacion']= $correo;
     $varsesion =$_SESSION['correoValidacion'];

     echo($varsesion);

     if (isset($_POST['correo'])){

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
        header("<Location: ./bloghome.php");
    }else {
        echo("No se ingresaron datos al servidor");
    }
?>

<!-- Registro de autores -->
<?php

    include 'conexion.php';

    if (isset($_POST['correo'])){
        
        $correo=$_POST['correo'];
  
        $consu = "SELECT correo FROM usuario WHERE correo='$correo'";
        $dale=mysqli_query($conexion,$consu);
        $resultado1 =mysqli_fetch_row($dale);

        if ($resultado1!=$correo){

            $ID_autor="SELECT usuario_id,nombre_usuario FROM usuario WHERE correo='$correo'";
            $consultaID =mysqli_query($conexion,$ID_autor);
            $datos_usuario = mysqli_fetch_row($consultaID);
            $agregarAutor = "INSERT INTO autores (nombre_autor,usuario_id)
                            VALUES('$datos_usuario[1]','$datos_usuario[0]')";
            $consultaAutor = mysqli_query($conexion,$agregarAutor);
            mysqli_close($conexion);
        }else { echo("No se ingresaron datos al servidor");}
        mysqli_close($conexion);
    }
  ?>

<!-- Registro de logeo el registro de usuario -->
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
 
        }else {
            echo("No se ingresaron datos al servidor");
        }
 ?>
 