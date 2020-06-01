<?php 
    include 'php/conexion.php';
    session_start();

    $varsesion =$_SESSION['correoValidacion'];

    if ($varsesion=='' || $varsesion==NULL) {
      echo('No cuentas con los permisos necesarios');
    }

    if (isset($_POST['comentario'])){
        $comentario=$_POST['comentario'];
        $fecha= date('Y-n-d');

        //echo($comentario);
        $query_comentario = "INSERT INTO comentarios(texto,fecha,id_usuario,id_post) 
                            VALUES ('$comentario','$fecha','$fecha','$fecha')";
        $query_co = mysqli_query($conexion,$query_comentario);
        
        header('location:Postcomentado.php');
    }else {
        echo("holi");
    }

    mysqli_close($conexion);
?>