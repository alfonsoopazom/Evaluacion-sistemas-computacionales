<?php
    $host="localhost";
    $password="password";
    $userName="root";
    $db = "blog";
            //Crear conexion
    $conexion = mysqli_connect($host,$userName,"",$db); 
    $usuario = $_POST['nusuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena1 = $_POST['contrasena1'];
            
    echo $usuario."<br>";
            //verificar conexion
            if ($conexion->connect_error) {
                die("Connection failed: " . $conexion->mysqli_connect_error());
            } 
            echo "Conexion correcta";
            
    $insertar= "INSERT INTO usuario(nombre_usuario,correo,contrasena,contrasena2) 
                VALUES ('$usuario','$correo','$contrasena','$contrasena1')";
    $resultado = mysqli_query($conexion,$insertar);
    if($resultado){
        echo "Funciono" ;
    }else{
        echo "no funciono";
    }

?>